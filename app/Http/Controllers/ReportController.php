<?php

namespace App\Http\Controllers;

use App\Models\DonorList;
use App\Models\Donations;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // composer require barryvdh/laravel-dompdf

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filled('period')) {
            [$dateFrom, $dateTo] = $this->resolvePeriodDates($request->period);
        } else {
            $dateFrom = $request->filled('date_from') ? \Carbon\Carbon::parse($request->date_from)->startOfDay() : null;
            $dateTo   = $request->filled('date_to') ? \Carbon\Carbon::parse($request->date_to)->endOfDay() : null;
        }

        $totalDonationAmount = Donations::sum('amount');
        $totalTransactions = Donations::count();
        $totalDonors = DonorList::count();

        $donors = DonorList::withSum('donations', 'amount')
            ->withCount('donations')
            ->orderByDesc('donations_sum_amount')
            ->get();

        return view('admin.reports.donations', compact(
            'totalDonationAmount',
            'totalTransactions',
            'totalDonors',
            'donors'
        ));
    }

    public function export(Request $request, string $type)
    {
        if ($request->filled('period')) {
            [$dateFrom, $dateTo] = $this->resolvePeriodDates($request->period);
        } else {
            $dateFrom = $request->filled('date_from') ? \Carbon\Carbon::parse($request->date_from)->startOfDay() : null;
            $dateTo   = $request->filled('date_to') ? \Carbon\Carbon::parse($request->date_to)->endOfDay() : null;
        }
        // দুটো export-এই একই donor ডেটা লাগবে, তাই একবারই fetch করছি
        $donors = DonorList::withSum('donations', 'amount')
            ->withCount('donations')
            ->orderByDesc('donations_sum_amount')
            ->get();

        $totalDonationAmount = Donations::sum('amount');
        $totalDonors = DonorList::count();
        $totalTransactions = Donations::count();

        $filename = 'donation-report-' . now()->format('Y-m-d_His');

        // ---------------- PDF ----------------
        if ($type === 'pdf') {
            $pdf = Pdf::loadView('admin.reports.donations-pdf', compact(
                'donors',
                'totalDonationAmount',
                'totalDonors',
                'totalTransactions'
            ));

            return $pdf->download($filename . '.pdf');
        }

        // ---------------- CSV ----------------
        if ($type === 'csv') {
            return response()->streamDownload(function () use ($donors) {
                $out = fopen('php://output', 'w');

                // header row
                fputcsv($out, ['#', 'Name', 'Email', 'Phone', 'Donations', 'Total Donated']);

                // data rows
                foreach ($donors as $index => $donor) {
                    fputcsv($out, [
                        $index + 1,
                        $donor->name,
                        $donor->email,
                        $donor->phone,
                        $donor->donations_count,
                        number_format((float) ($donor->donations_sum_amount ?? 0), 2, '.', ''),
                    ]);
                }

                fclose($out);
            }, $filename . '.csv', ['Content-Type' => 'text/csv']);
        }

        // ---------------- JSON (fallback / optional) ----------------
        return response()->json($donors);
    }

    private function resolvePeriodDates(?string $period): array
    {
        return match ($period) {
            'today'   => [now()->startOfDay(), now()->endOfDay()],
            'weekly'  => [now()->startOfWeek(), now()->endOfDay()],
            'monthly' => [now()->startOfMonth(), now()->endOfDay()],
            default   => [null, null],
        };
    }
}
