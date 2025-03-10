@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row ">
        <div class="col-lg-11 col-md-12">
            <h2 class="mb-3 text-center">Income Data</h2>

            <div class="card shadow-lg p-4">
                <div class="row mb-3 justify-content-end">
                    <div class="col-md-4 col-sm-6">
                        <input type="text" id="customSearch" class="form-control" placeholder="Search...">
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="incomeTable" class="table table-bordered table-hover text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>KYC Docs</th>
                                <th>Income Proof</th>
                                <th>Other Files</th>
                                <th>Plan</th>
                                <th>Payment Method</th>
                                <th>Account Number</th>
                                <th>IFSC Code</th>
                                <th>Account Holder</th>
                                <th>QR Receipt</th>
                                <th>Bank Receipt</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    let table = $('#incomeTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.incomes.data') }}",
        paging: true,
        fixedHeader: true,
        order: [[0, 'asc']],
        responsive: true,
        dom: 'rtip', // Removes "Show Entries"
        columns: [
            { data: 'id', orderable: true },
            { data: 'name', orderable: true, defaultContent: 'N/A' },
            { data: 'email', orderable: true, defaultContent: 'N/A' },
            { data: 'mobile', orderable: true, defaultContent: 'N/A' },
            { data: 'kyc_docs', orderable: false, render: function(data) { return data ? `<a href="/storage/${data}" target="_blank" class="btn btn-success btn-sm">View</a>` : 'N/A'; }},
            { data: 'income_proof', orderable: false, render: function(data) { return data ? `<a href="/storage/${data}" target="_blank" class="btn btn-success btn-sm">View</a>` : 'N/A'; }},
            { data: 'other_files', orderable: false, render: function(data) { return data ? `<a href="/storage/${data}" target="_blank" class="btn btn-success btn-sm">View</a>` : 'N/A'; }},
            { data: 'plan', orderable: true },
            { data: 'payment_method', orderable: true },
            { data: 'account_number', orderable: true },
            { data: 'ifsc_code', orderable: true },
            { data: 'account_holder', orderable: true },
            { data: 'qr_receipt', orderable: false, render: function(data) { return data ? `<a href="/storage/${data}" target="_blank" class="btn btn-info btn-sm">View</a>` : 'N/A'; }},
            { data: 'bank_receipt', orderable: false, render: function(data) { return data ? `<a href="/storage/${data}" target="_blank" class="btn btn-info btn-sm">View</a>` : 'N/A'; }},
            { data: 'status', orderable: true, render: function(data) {
                let badgeClass = data === 'pending' ? 'warning' : (data === 'verified' ? 'success' : 'primary');
                return `<span class="badge bg-${badgeClass}">${data}</span>`;
            }},
            { data: 'id', orderable: false, render: function(id) {
                return `
                    <div class="dropdown">
                        <button class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown">Update Status</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item update-status" href="#" data-id="${id}" data-status="pending">Pending</a></li>
                            <li><a class="dropdown-item update-status" href="#" data-id="${id}" data-status="verified">Verified</a></li>
                            <li><a class="dropdown-item update-status" href="#" data-id="${id}" data-status="processed">Processed</a></li>
                        </ul>
                    </div>`;
            }}
        ]
    });

    // Custom search box functionality
    $('#customSearch').on('keyup', function() {
        table.search($(this).val()).draw();
    });

    // Handle status update
    $(document).on('click', '.update-status', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let status = $(this).data('status');

        $.ajax({
            url: `/admin/income/update-status/${id}`,
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                status: status
            },
            success: function(response) {
                table.ajax.reload();
            },
            error: function(error) {
                alert("Failed to update status.");
            }
        });
    });
});
</script>
@endpush

<style>
  

/* Adjust card width */
.card {
    width: 100%;
}

/* Ensure table is fully responsive */
.table-responsive {
    overflow-x: auto;
    margin-right: 0 !important;
    padding-right: 0 !important;
}

/* Align search input properly */
#customSearch {
    width: 100%;
    max-width: 300px;
}
</style>
