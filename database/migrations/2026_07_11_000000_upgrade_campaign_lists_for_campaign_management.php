<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1) Add the new structural columns needed by the Campaign Management module.
        Schema::table('campaign_lists', function (Blueprint $table) {
            $table->foreignId('created_by')
                ->nullable()
                ->after('id')
                ->constrained('users')
                ->nullOnDelete();

            $table->date('start_date')->nullable()->after('description');
            $table->date('end_date')->nullable()->after('start_date');

            $table->softDeletes();
        });

        // 2) goal_amount was stored as a free-text string. Convert it to a proper
        //    decimal column so it can be sorted/summed correctly.
        Schema::table('campaign_lists', function (Blueprint $table) {
            $table->decimal('goal_amount_new', 14, 2)->default(0)->after('goal_amount');
        });

        DB::table('campaign_lists')->orderBy('id')->chunkById(200, function ($rows) {
            foreach ($rows as $row) {
                $numeric = (float) preg_replace('/[^0-9.]/', '', (string) $row->goal_amount);

                DB::table('campaign_lists')
                    ->where('id', $row->id)
                    ->update(['goal_amount_new' => $numeric]);
            }
        });

        Schema::table('campaign_lists', function (Blueprint $table) {
            $table->dropColumn('goal_amount');
        });

        Schema::table('campaign_lists', function (Blueprint $table) {
            $table->renameColumn('goal_amount_new', 'goal_amount');
        });

        // 3) status used to be a boolean (0 = Active, 1 = Deactive). Replace it with
        //    the Draft / Active / Completed / Closed flow described in the spec.
        Schema::table('campaign_lists', function (Blueprint $table) {
            $table->string('status_new', 20)->default('Draft')->after('status');
        });

        DB::table('campaign_lists')->orderBy('id')->chunkById(200, function ($rows) {
            foreach ($rows as $row) {
                $mapped = match ((string) $row->status) {
                    '0' => 'Active',
                    '1' => 'Closed',
                    default => 'Draft',
                };

                DB::table('campaign_lists')
                    ->where('id', $row->id)
                    ->update(['status_new' => $mapped]);
            }
        });

        Schema::table('campaign_lists', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('campaign_lists', function (Blueprint $table) {
            $table->renameColumn('status_new', 'status');
        });

        // 4) Give the short description a little more breathing room.
        Schema::table('campaign_lists', function (Blueprint $table) {
            $table->string('description', 500)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campaign_lists', function (Blueprint $table) {
            $table->boolean('status_old')->nullable()->after('status');
        });

        DB::table('campaign_lists')->orderBy('id')->chunkById(200, function ($rows) {
            foreach ($rows as $row) {
                $mapped = match ($row->status) {
                    'Active' => 0,
                    'Closed' => 1,
                    default => null,
                };

                DB::table('campaign_lists')
                    ->where('id', $row->id)
                    ->update(['status_old' => $mapped]);
            }
        });

        Schema::table('campaign_lists', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('campaign_lists', function (Blueprint $table) {
            $table->renameColumn('status_old', 'status');
        });

        Schema::table('campaign_lists', function (Blueprint $table) {
            $table->string('goal_amount_old', 50)->nullable()->after('goal_amount');
        });

        DB::table('campaign_lists')->orderBy('id')->chunkById(200, function ($rows) {
            foreach ($rows as $row) {
                DB::table('campaign_lists')
                    ->where('id', $row->id)
                    ->update(['goal_amount_old' => (string) $row->goal_amount]);
            }
        });

        Schema::table('campaign_lists', function (Blueprint $table) {
            $table->dropColumn('goal_amount');
        });

        Schema::table('campaign_lists', function (Blueprint $table) {
            $table->renameColumn('goal_amount_old', 'goal_amount');
        });

        Schema::table('campaign_lists', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropColumn(['start_date', 'end_date']);
            $table->dropConstrainedForeignId('created_by');
        });
    }
};
