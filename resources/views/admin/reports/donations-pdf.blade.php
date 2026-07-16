<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        h2 {
            margin-bottom: 4px;
        }

        .muted {
            color: #888;
            font-size: 11px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 6px 8px;
            text-align: left;
        }

        th {
            background: #f5f5f5;
        }

        .summary {
            display: table;
            width: 100%;
            margin-bottom: 15px;
        }

        .summary-box {
            display: table-cell;
            width: 33%;
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .summary-box .label {
            font-size: 10px;
            text-transform: uppercase;
            color: #888;
        }

        .summary-box .value {
            font-size: 16px;
            font-weight: bold;
            margin-top: 4px;
        }
    </style>
</head>

<body>
    <h2>Donation Report</h2>
    <p class="muted">Generated on {{ now()->format('d M Y, h:i A') }}</p>

    <div class="summary">
        <div class="summary-box">
            <div class="label">Total Raised</div>
            <div class="value">৳{{ number_format($totalDonationAmount, 2) }}</div>
        </div>
        <div class="summary-box">
            <div class="label">Total Donors</div>
            <div class="value">{{ $totalDonors }}</div>
        </div>
        <div class="summary-box">
            <div class="label">Transactions</div>
            <div class="value">{{ $totalTransactions }}</div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Donor Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Donations</th>
                <th>Total Donated</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($donors as $index => $donor)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $donor->name }}</td>
                    <td>{{ $donor->email }}</td>
                    <td>{{ $donor->phone }}</td>
                    <td>{{ $donor->donations_count }}</td>
                    <td>৳{{ number_format($donor->donations_sum_amount ?? 0, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No donor data found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
