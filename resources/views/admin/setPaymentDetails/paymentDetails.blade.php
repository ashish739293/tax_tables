@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4 text-center fw-bold text-dark">Manage Payment Details</h3>

    <!-- Buttons for Adding and Deleting -->
    <div class="d-flex justify-content-between mb-3">
        <div>
            <button class="btn btn-primary me-2" id="openFormButton" data-bs-toggle="modal" data-bs-target="#addPaymentModal">
                <i class="fas fa-plus"></i> Add / Update
            </button>
            <!-- <button class="btn btn-danger" onclick="deletePaymentDetail()">
                <i class="fas fa-trash"></i> Delete
            </button> -->
        </div>
        <!-- <button class="btn btn-secondary" onclick="fetchPaymentDetails()">🔄 Refresh</button> -->
    </div>

    <!-- Payment Details Section -->
    <div class="row justify-content-center" id="paymentDetailsContainer">
        <!-- Dynamic Data Will Be Loaded Here -->
    </div>
</div>

<!-- Add/Update Payment Modal -->
<div class="modal fade" id="addPaymentModal" tabindex="-1" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="addPaymentModalLabel">Add / Update Payment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="paymentForm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Account Number</label>
                        <input type="text" class="form-control" name="account_number" id="account_number" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">IFSC Code</label>
                        <input type="text" class="form-control" name="ifsc_code" id="ifscCode" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Account Holder Name</label>
                        <input type="text" class="form-control" name="holder_name" id="holderName" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Upload QR Code</label>
                        <input type="file" class="form-control" name="qr_code" id="qrCode" accept="image/*">
                        <div class="mt-2" id="previewQR"></div>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Save Details</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Payment Card Styling */
    .payment-card {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 30px;
        padding: 30px;
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        border-radius: 15px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease;
        color: #fff;
    }
    .payment-card:hover {
        transform: scale(1.02);
    }

    /* Left Section - Account Details */
    .account-details {
        flex: 1;
        min-width: 300px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        color: #fff;
    }

    /* Right Section - QR Code */
    .qr-container {
        flex: 1;
        min-width: 280px;
        max-width: 350px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: center;
        position: relative;
    }

    /* QR Code Styling */
    .qr-code {
        width: 240px;
        height: 240px;
        border: 6px solid #fff;
        padding: 15px;
        border-radius: 20px;
        background: #fff;
        transition: all 0.3s ease;
        animation: pulseQR 1.5s infinite alternate;
    }

    .qr-container:hover .qr-code {
        border-color: #ffcc00;
        transform: scale(1.05);
    }

    /* QR Code Glow Effect */
    @keyframes pulseQR {
        0% { box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.3); }
        100% { box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.6); }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .payment-card {
            flex-direction: column;
            text-align: center;
        }
        .qr-code {
            width: 200px;
            height: 200px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function () {
        fetchPaymentDetails();
    });

    function fetchPaymentDetails() {
        $.get("{{ route('payment.details.fetch') }}", function (response) {
            let container = $("#paymentDetailsContainer");
            container.html("");

            if (!response.data) {
                container.html('<div class="col-12 text-center text-muted">No Payment Details Found</div>');
                return;
            }

            let content = `
                <div class="col-md-10">
                    <div class="payment-card d-flex flex-md-row flex-column align-items-center">
                        <!-- Left Section: Account Details -->
                        <div class="col-md-6 account-details p-4">
                            <h5 class="fw-bold text-warning text-center">💳 Account Details</h5>
                            <hr>
                            <p><strong>📌 Account Number:</strong> ${response.data.account_number}</p>
                            <p><strong>🏦 IFSC Code:</strong> ${response.data.ifsc_code}</p>
                            <p><strong>👤 Holder Name:</strong> ${response.data.holder_name}</p>
                        </div>

                        <!-- Right Section: QR Code -->
                        <div class="col-md-5 qr-container p-4 ml-5">
                            <h5 class="fw-semibold text-secondary">📷 Scan to Pay</h5>
                            <img src="${response.data.qr_code}" alt="QR Code" class="qr-code" height="200" width="200">
                        </div>
                    </div>
                </div>
            `;

            container.append(content);
            
            // Prefill form data
            $("#account_number").val(response.data.account_number);
            $("#ifscCode").val(response.data.ifsc_code);
            $("#holderName").val(response.data.holder_name);
        });
    }
</script>
@endpush
