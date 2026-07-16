<div class="d-flex gap-2">
    <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.reports.donations.export', ['type' => 'csv']) }}">
        <i class="fas fa-file-csv"></i> Export CSV
    </a>
    <a class="btn btn-sm btn-outline-danger" href="{{ route('admin.reports.donations.export', ['type' => 'pdf']) }}">
        <i class="fas fa-file-pdf"></i> Export PDF
    </a>
</div>