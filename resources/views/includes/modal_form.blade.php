<style>

.modal-header {
    border-bottom: 3px solid #007bff;
}

.progress {
    height: 13px;
    border-radius: 5px;
    overflow: hidden;
    margin:5px;
}

.progress-bar {
    background: #007bff;
    font-size: 12px;
    font-weight: bold;
    text-align: center;
    transition: width 0.4s ease-in-out;
}

.form-control {
    border-radius: 8px;
    box-shadow: none;
}

.btn-outline-secondary {
    border-radius: 8px;
    transition: 0.3s;
}

.btn-outline-secondary:hover {
    background-color: #007bff;
    color: white;
}

.payment-method-details {
    padding: 15px;
    border: 2px dashed #ccc;
    border-radius: 10px;
    background-color: #f8f9fa;
}

</style>

<!-- Modal -->
<div class="modal fade" id="incomeModal" tabindex="-1" aria-labelledby="incomeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold" id="incomeModalLabel">Income Source Form</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Progress Bar -->
            <div class="progress">
                <div class="progress-bar" id="progressBar" style="width: 50%">Step 1 of 2</div>
            </div>

            <div class="modal-body p-4">
                <!-- Step 1: Personal Information -->
                <div id="step1">
                    <form id="incomeFormStep1">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" required>
                            </div>
                            <div class="col-md-6">
                                <label for="kyc_docs" class="form-label">Upload KYC Documents</label>
                                <input type="file" class="form-control" id="kyc_docs" name="kyc_docs" accept="image/*,application/pdf" required>
                            </div>
                            <div class="col-md-6">
                                <label for="income_proof" class="form-label">Income Proof</label>
                                <input type="file" class="form-control" id="income_proof" name="income_proof" accept="image/*,application/pdf" required>
                            </div>
                            <div class="col-md-6">
                                <label for="other_files" class="form-label">Other Files</label>
                                <input type="file" class="form-control" id="other_files" name="other_files" accept="image/*,application/pdf">
                            </div>
                        </div>

                        <!-- Plan Selection -->
                        <div class="mt-3">
                            <label class="form-label">Select Your Plan</label><br>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="plan[]" value="Basic">
                                <label class="form-check-label">Basic Plan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="plan[]" value="Premium">
                                <label class="form-check-label">Premium Plan</label>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary w-100 mt-4" id="nextStepBtn">Next Step →</button>
                    </form>
                </div>

                <!-- Step 2: Payment Details -->
                <div id="step2" style="display: none;">
                    <form id="incomeFormStep2">
                        <h5 class="mb-3">Payment Method</h5>
                        <div class="d-flex justify-content-between">
                            <label class="btn btn-outline-secondary">
                                <input type="radio" name="payment_method" value="QR" id="paymentMethodQR"> QR Code
                            </label>
                            <label class="btn btn-outline-secondary">
                                <input type="radio" name="payment_method" value="Bank" id="paymentMethodBank"> Bank Transfer
                            </label>
                            <label class="btn btn-outline-secondary">
                                <input type="radio" name="payment_method" value="PayLater" id="paymentMethodPayLater"> Pay Later
                            </label>
                        </div>

                        <div id="paymentDetails" class="mt-3" style="display: none;">
                            <div id="qrDetails" class="payment-method-details" style="display: none;">
                                <p><strong>Scan QR Code & Upload Receipt</strong></p>
                                <img src="qr-placeholder.png" alt="QR Code" width="200">
                                <input type="file" class="form-control mt-2" id="qr_receipt" name="qr_receipt" required>
                            </div>

                            <div id="bankDetails" class="payment-method-details" style="display: none;">
                                <p><strong>Bank Transfer</strong></p>
                                <input type="text" class="form-control mb-2" id="account_number" placeholder="Account Number">
                                <input type="text" class="form-control mb-2" id="ifsc_code" placeholder="IFSC Code">
                                <input type="text" class="form-control mb-2" id="account_holder" placeholder="Account Holder Name">
                                <input type="file" class="form-control mt-2" id="bank_receipt" name="bank_receipt" required>
                            </div>

                            <div id="payLaterDetails" class="payment-method-details" style="display: none;">
                                <p><strong>Pay Later Option Selected</strong></p>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100 mt-3">Submit Form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>

function OpenModal(){

    var myModal = new bootstrap.Modal(document.getElementById('incomeModal'));
    myModal.show();  // This will display the modal automatically

}


    // Switch to Step 2 when the next button is clicked
    document.getElementById('nextStepBtn').addEventListener('click', function () {
        document.getElementById('step1').style.display = 'none';
        document.getElementById('step2').style.display = 'block';
    });

    document.querySelectorAll('input[name="payment_method"]').forEach(function (radio) {
    radio.addEventListener('change', function () {
        let method = this.value;

        document.getElementById('paymentDetails').style.display = 'block';
        document.querySelectorAll('.payment-method-details').forEach(div => div.style.display = 'none');
        document.getElementById(this.value + 'Details').style.display = 'block';

        if (method === 'QR') {
                document.getElementById('qrDetails').style.display = 'block';
            } else if (method === 'Bank') {
                document.getElementById('bankDetails').style.display = 'block';
            } else if (method === 'PayLater') {
                document.getElementById('payLaterDetails').style.display = 'block';
            }
    });
});

    // Toggle Payment Method Details based on selection
    document.querySelectorAll('input[name="payment_method"]').forEach(function (radio) {
        radio.addEventListener('change', function () {
            let method = this.value;
            document.getElementById('paymentDetails').style.display = 'block';
            document.getElementById('qrDetails').style.display = 'none';
            document.getElementById('bankDetails').style.display = 'none';
            document.getElementById('payLaterDetails').style.display = 'none';

            if (method === 'QR') {
                document.getElementById('qrDetails').style.display = 'block';
            } else if (method === 'Bank') {
                document.getElementById('bankDetails').style.display = 'block';
            } else if (method === 'PayLater') {
                document.getElementById('payLaterDetails').style.display = 'block';
            }
        });
    });

    $(document).ready(function () {
    $('input[name="payment_method"]').change(function () {
        let selectedMethod = $('input[name="payment_method"]:checked').val();

        // Reset required attributes
        $('#bank_receipt, #qr_receipt, #account_number, #ifsc_code, #account_holder').prop('required', false);

        if (selectedMethod === 'Bank') {
            $('#bank_receipt, #account_number, #ifsc_code, #account_holder').prop('required', true);
        } else if (selectedMethod === 'QR') {
            $('#qr_receipt').prop('required', true);
        }
    });
    $(document).ready(function () {
    $('input[name="payment_method"]').change(function () {
        let selectedMethod = $('input[name="payment_method"]:checked').val();

        // Reset required attributes
        $('#bank_receipt, #qr_receipt, #account_number, #ifsc_code, #account_holder').prop('required', false);

        if (selectedMethod === 'Bank') {
            $('#bank_receipt, #account_number, #ifsc_code, #account_holder').prop('required', true);
        } else if (selectedMethod === 'QR') {
            $('#qr_receipt').prop('required', true);
        }
    });

    // Remove validation error on submit
    $('#incomeFormStep2').submit(function (e) {
        let selectedMethod = $('input[name="payment_method"]:checked').val();

        // Prevent browser validation errors for hidden fields
        if (selectedMethod !== 'Bank') {
            $('#bank_receipt, #account_number, #ifsc_code, #account_holder').prop('required', false);
        }
        if (selectedMethod !== 'QR') {
            $('#qr_receipt').prop('required', false);
        }
    });
});$(document).ready(function () {
    $('input[name="payment_method"]').change(function () {
        let selectedMethod = $('input[name="payment_method"]:checked').val();

        // Reset required attributes
        $('#bank_receipt, #qr_receipt, #account_number, #ifsc_code, #account_holder').prop('required', false);

        if (selectedMethod === 'Bank') {
            $('#bank_receipt, #account_number, #ifsc_code, #account_holder').prop('required', true);
        } else if (selectedMethod === 'QR') {
            $('#qr_receipt').prop('required', true);
        }
    });

    // Remove validation error on submit
    $('#incomeFormStep2').submit(function (e) {
        let selectedMethod = $('input[name="payment_method"]:checked').val();

        // Prevent browser validation errors for hidden fields
        if (selectedMethod !== 'Bank') {
            $('#bank_receipt, #account_number, #ifsc_code, #account_holder').prop('required', false);
        }
        if (selectedMethod !== 'QR') {
            $('#qr_receipt').prop('required', false);
        }
    });
});$(document).ready(function () {
    $('input[name="payment_method"]').change(function () {
        let selectedMethod = $('input[name="payment_method"]:checked').val();

        // Reset required attributes
        $('#bank_receipt, #qr_receipt, #account_number, #ifsc_code, #account_holder').prop('required', false);

        if (selectedMethod === 'Bank') {
            $('#bank_receipt, #account_number, #ifsc_code, #account_holder').prop('required', true);
        } else if (selectedMethod === 'QR') {
            $('#qr_receipt').prop('required', true);
        }
    });

    // Remove validation error on submit
    $('#incomeFormStep2').submit(function (e) {
        let selectedMethod = $('input[name="payment_method"]:checked').val();

        // Prevent browser validation errors for hidden fields
        if (selectedMethod !== 'Bank') {
            $('#bank_receipt, #account_number, #ifsc_code, #account_holder').prop('required', false);
        }
        if (selectedMethod !== 'QR') {
            $('#qr_receipt').prop('required', false);
        }
    });
});$(document).ready(function () {
    $('input[name="payment_method"]').change(function () {
        let selectedMethod = $('input[name="payment_method"]:checked').val();

        // Reset required attributes
        $('#bank_receipt, #qr_receipt, #account_number, #ifsc_code, #account_holder').prop('required', false);

        if (selectedMethod === 'Bank') {
            $('#bank_receipt, #account_number, #ifsc_code, #account_holder').prop('required', true);
        } else if (selectedMethod === 'QR') {
            $('#qr_receipt').prop('required', true);
        }
    });

    // Remove validation error on submit
    $('#incomeFormStep2').submit(function (e) {
        let selectedMethod = $('input[name="payment_method"]:checked').val();

        // Prevent browser validation errors for hidden fields
        if (selectedMethod !== 'Bank') {
            $('#bank_receipt, #account_number, #ifsc_code, #account_holder').prop('required', false);
        }
        if (selectedMethod !== 'QR') {
            $('#qr_receipt').prop('required', false);
        }
    });
});$(document).ready(function () {
    $('input[name="payment_method"]').change(function () {
        let selectedMethod = $('input[name="payment_method"]:checked').val();

        // Reset required attributes
        $('#bank_receipt, #qr_receipt, #account_number, #ifsc_code, #account_holder').prop('required', false);

        if (selectedMethod === 'Bank') {
            $('#bank_receipt, #account_number, #ifsc_code, #account_holder').prop('required', true);
        } else if (selectedMethod === 'QR') {
            $('#qr_receipt').prop('required', true);
        }
    });

    // Remove validation error on submit
    $('#incomeFormStep2').submit(function (e) {
        let selectedMethod = $('input[name="payment_method"]:checked').val();

        // Prevent browser validation errors for hidden fields
        if (selectedMethod !== 'Bank') {
            $('#bank_receipt, #account_number, #ifsc_code, #account_holder').prop('required', false);
        }
        if (selectedMethod !== 'QR') {
            $('#qr_receipt').prop('required', false);
        }
    });
});





    // Remove validation error on submit
    $('#incomeFormStep2').submit(function (e) {
        let selectedMethod = $('input[name="payment_method"]:checked').val();

        // Prevent browser validation errors for hidden fields
        if (selectedMethod !== 'Bank') {
            $('#bank_receipt, #account_number, #ifsc_code, #account_holder').prop('required', false);
        }
        if (selectedMethod !== 'QR') {
            $('#qr_receipt').prop('required', false);
        }
    });
});


    $('#incomeFormStep2').submit(function (e) {
    e.preventDefault();
    
    let formData = new FormData();
    
    // Append Step 1 Data
    formData.append('name', $('#name').val());
    formData.append('email', $('#email').val());
    formData.append('mobile', $('#mobile').val());
    formData.append('kyc_docs', $('#kyc_docs')[0].files[0]);
    formData.append('income_proof', $('#income_proof')[0].files[0]);
    formData.append('other_files', $('#other_files')[0].files[0]);

    // Append Plan Selection
    $('input[name="plan[]"]:checked').each(function () {
        formData.append('plan[]', $(this).val());
    });

    // Append Step 2 Data
    formData.append('payment_method', $('input[name="payment_method"]:checked').val());
    
    let paymentMethod = $('input[name="payment_method"]:checked').val();
    
    if (paymentMethod === 'QR') {
        formData.append('qr_receipt', $('#qr_receipt')[0].files[0]);
    } else if (paymentMethod === 'Bank') {
        formData.append('account_number', $('#account_number').val());
        formData.append('ifsc_code', $('#ifsc_code').val());
        formData.append('account_holder', $('#account_holder').val());
        formData.append('bank_receipt', $('#bank_receipt')[0].files[0]);
    }

    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Set the CSRF token in the AJAX setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });


    // Send the data to Laravel Backend
    $.ajax({
        url: "/submit-income-form",  // Laravel route
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            showToast(response.message);
            $('#incomeFormStep2')[0].reset();
            $('#incomeFormStep1')[0].reset();
            // Hide/close the modal
            $('#incomeModal').modal('hide');
        },
        error: function (xhr) {
            showToast('An error occurred: ' + xhr.responseText,"error");
        }
    });
});

</script>