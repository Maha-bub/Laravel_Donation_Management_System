<?php
namespace App\Providers;
use App\Models\CampaignList;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('frontend.*', function ($view) {
            $view->with('siteSettings', Setting::current());
        });


        // Active campaigns show under the header's Projects dropdown submenu

        View::composer('frontend.layout.parts.header', function ($view) {
            $view->with(
                'navCampaigns',
                CampaignList::where('status', CampaignList::STATUS_ACTIVE)
                    ->latest()
                    ->take(6)
                    ->get()
            );
        });
    }
}
