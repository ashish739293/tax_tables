@include('includes.head', ['title' => 'Profile'])
@include('includes.navbar_index')

<style>
    body {
        background: linear-gradient(135deg, #1e3c72, #57697b00);
        color: #fff;
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        padding: 24px 10px;
    }

    .container {
        max-width: 1000px;
    }

    .card {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        border-radius: 12px;
        backdrop-filter: blur(15px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        padding: 20px;
    }

    .tab-buttons {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        justify-content: center;
    }

    .tab-button {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        padding: 12px 18px;
        font-size: 14px;
        font-weight: bold;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    .tab-button:hover, .tab-button.active {
        background: #ff7b00;
        color: white;
        transform: scale(1.05);
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .whatsapp-button {
        background: #05d69f;
        border: none;
        padding: 12px 18px;
        font-size: 14px;
        font-weight: bold;
        border-radius: 8px;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    .whatsapp-button:hover {
        background: #1ebe5d;
        transform: scale(1.05);
    }

    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: start;
        font-size: 30px;
    }
    .rating input {
        display: none;
    }
    .rating label {
        cursor: pointer;
        font-size: 40px;
        color: lightgray;
        transition: color 0.3s;
    }
    /* Full yellow star when selected */
    .rating input:checked ~ label,
    .rating label:hover,
    .rating label:hover ~ label {
        color: gold;
    }
</style>

<div class="container mt-5">
    <!-- Feature Buttons -->
    <div class="tab-buttons">
<button class="tab-button active" onclick="openTab('profile',event)">Profile</button>
<!-- <button class="tab-button" onclick="openTab('billing')">My Billing Invoices</button> -->
<button class="tab-button" onclick="openTab('payment',event)">Payment History</button>
<!-- <button class="tab-button" onclick="openTab('invoice')">Invoice</button> -->
<button class="tab-button" onclick="openTab('rate-us',event)">Rate US</button>
<a href="https://wa.me/YOUR_NUMBER" target="_blank" class="whatsapp-button">Chat in WhatsApp</a>
</div>






    <div class="row">
        <!-- Sidebar Menu -->
        <div class="col-md-3 bg-light p-3 rounded">
            <div class="text-center">
                <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($user->email))) }}?s=100" class="rounded-circle mb-2" alt="Avatar">
                <h5 style="color:#ff7b00">{{ $user->firstname }} {{ $user->lastname }}</h5>
                <p><a href="#" class="text-primary">View Profile</a></p>
            </div>
            <ul class="list-group">
                <li class="list-group-item active">Account</li>
                <li class="list-group-item"><a href="#" data-bs-toggle="modal" data-bs-target="#updatePasswordModal">Change Password</a></li>
                <li class="list-group-item"><a href="#">Privacy</a></li>
                <li class="list-group-item text-danger"><a href="#" onclick="confirmDelete(event)">Delete Account</a>
                    <form id="delete-account-form" action="{{ route('user.deleteAccount') }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </li>
                <li class="list-group-item text-danger"><a href="/logout">Logout</a></li>
            </ul>
        </div>

        <!-- Profile Content -->
        <div class="col-md-9">
            <div id="profile" class="tab-content active">
                <div class="card p-4">
                    <h4 class="text-warning">Account</h4>
                    <form method="POST" action="{{ route('user.updateProfile') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" value="{{ $user->username }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update Account</button>
                    </form>
                </div>
            </div>

            <!-- Billing Content -->
            <div id="billing" class="tab-content">
                <div class="card p-4">
                    <h4 class="text-warning">My Billing Invoices</h4>
                    <p>Coming Soon...</p>
                </div>
            </div>

            <!-- Payment History -->
<div id="payment" class="tab-content">
<div class="card p-4">
<h4 class="text-warning">Payment History</h4>
<div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
<table class="table table-striped" id="paymentTable">
<thead class="table-secondary text-light">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Amount</th>
<th>Status</th>
<th>Payment Method</th>
<th>Date</th>
<th>Invoice</th>
</tr>
</thead>
<tbody>
<!-- Data loads dynamically -->
</tbody>
</table>
</div>
</div>
</div>

<!-- Invoice Section -->
<!-- Invoice Modal -->
<div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header bg-primary text-dark">
<h5 class="modal-title" id="invoiceModalLabel">Invoice Details</h5>
<button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body text-dark" id="invoiceContent">
<p class="text-center text-muted">Select an invoice to view details</p>
</div>
<div class="modal-footer">
<button id="downloadInvoice" class="btn btn-success" style="display: none;">Download Invoice</button>
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>


            <!-- Invoice Section -->
            <div id="rate-us" class="tab-content">
                <div class="card p-4">
                    <h4 class="text-warning">Rate Our Services</h4>
                    <!-- Rating Form -->
                    <form action="{{ route('ratings.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Select Rating</label>
                            <div class="rating">
                                <input type="radio" id="star5" name="rating" value="5">
                                <label for="star5">&#9733;</label>
                                <input type="radio" id="star4" name="rating" value="4">
                                <label for="star4">&#9733;</label>
                                <input type="radio" id="star3" name="rating" value="3">
                                <label for="star3">&#9733;</label>
                                <input type="radio" id="star2" name="rating" value="2">
                                <label for="star2">&#9733;</label>
                                <input type="radio" id="star1" name="rating" value="1">
                                <label for="star1">&#9733;</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Your Comments</label>
                            <textarea class="form-control" name="comment" rows="3" placeholder="Write your feedback here..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">Submit Rating</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1050;">
    <div id="toastContainer"></div>
</div>

<!-- Update Password Modal -->
<div class="modal fade" id="updatePasswordModal" tabindex="-1" aria-labelledby="updatePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatePasswordModalLabel" style="color:black">Update Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updatePasswordForm">
                        @csrf
                        <div class="mb-3">
                            <label for="currentPassword" class="form-label" style="color:black">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword" name="current_password" placeholder="Current Password" required>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label" style="color:black">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="new_password" placeholder="New Password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label" style="color:black">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="new_password_confirmation" placeholder="Confirm New Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    window.openTab = function (tabId, event = null) {
// Remove 'active' class from all tabs and buttons
document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
document.querySelectorAll('.tab-button').forEach(button => button.classList.remove('active'));

// Add 'active' class to the selected tab
let selectedTab = document.getElementById(tabId);
if (selectedTab) {
selectedTab.classList.add('active');
}

// Highlight the active button
let button = document.querySelector(`[onclick="openTab('${tabId}')"]`);
if (button) {
button.classList.add('active');
}

// Update the URL without reloading
const currentUrl = new URL(window.location);
currentUrl.searchParams.set("tabId", tabId);
window.history.pushState({}, "", currentUrl);

// Prevent default event behavior if triggered by a button click
if (event) event.preventDefault();
};

document.addEventListener("DOMContentLoaded", function () {
const urlParams = new URLSearchParams(window.location.search);
const tabId = urlParams.get("tabId");

if (tabId) {
window.openTab(tabId);
}

let selectedTab = document.getElementById(tabId);
if (selectedTab) {
selectedTab.classList.add('active');
}
});


    // update password
    document.getElementById('updatePasswordForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        let formData = new FormData(this);

        fetch("{{ route('update.password') }}", { 
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                showToast('success', data.message);
                location.reload(); // Reload page after success
            } else {
                showToast('error', data.error);
            }
        })
        .catch(error =>  showToast('error', "Something went wrong!"));
    });
</script>

<!-- Delete The Account -->
<script>
    function confirmDelete(event) {
        event.preventDefault();
        if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
            document.getElementById('delete-account-form').submit();
        }
    }
</script>

<!-- JavaScript to Handle Star Click -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let selectedRating = 0;

        document.querySelectorAll(".star-rating i").forEach(star => {
            star.addEventListener("click", function() {
                selectedRating = this.getAttribute("data-value");
                document.getElementById("ratingValue").value = selectedRating;
                document.querySelectorAll(".star-rating i").forEach(s => s.classList.remove("text-warning"));
                for (let i = 0; i < selectedRating; i++) {
                    document.querySelectorAll(".star-rating i")[i].classList.add("text-warning");
                }
            });
        });
    });
</script>

<script>
    function showToast(type, message) {
        let toastId = 'toast-' + Math.random().toString(36).substr(2, 9);
        let bgColor = type === 'success' ? 'bg-success' : 'bg-danger';

        let toastHtml = `
            <div id="${toastId}" class="toast align-items-center text-white ${bgColor} border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>`;

        document.getElementById('toastContainer').innerHTML += toastHtml;

        setTimeout(() => {
            document.getElementById(toastId).remove();
        }, 4000);
    }

    // Show session messages
    document.addEventListener("DOMContentLoaded", function () {
        @if(session('success'))
            showToast('success', "{{ session('success') }}");
        @endif

        @if(session('error'))
            showToast('error', "{{ session('error') }}");
        @endif
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
$(document).ready(function () {
fetchPaymentHistory();

function fetchPaymentHistory() {
$.ajax({
url: "{{ route('payment.history') }}",
type: "GET",
beforeSend: function () {
$("#paymentTable tbody").html(`<tr><td colspan="8" class="text-center">Loading...</td></tr>`);
},
success: function (response) {
let tableBody = $("#paymentTable tbody");
tableBody.empty();

if (response.length === 0) {
tableBody.html(`<tr><td colspan="8" class="text-center">No payments found.</td></tr>`);
return;
}

response.forEach((payment, index) => {
tableBody.append(`
<tr>
<td>${index + 1}</td>
<td>${payment.name}</td>
<td>${payment.email}</td>
<td>₹${parseFloat(payment.amount).toFixed(2)}</td>
<td><span class="badge bg-${payment.status === 'processed' ? 'success' : 'danger'}">${payment.status}</span></td>
<td>${payment.payment_method}</td>
<td>${new Date(payment.created_at).toLocaleDateString()}</td>
<td>
<button class="btn btn-primary btn-sm view-invoice" data-id="${payment.id}">View</button>
</td>
</tr>
`);
});
},
error: function () {
$("#paymentTable tbody").html(`<tr><td colspan="8" class="text-center text-danger">Failed to load payments.</td></tr>`);
}
});
}

// Fetch Invoice Details & Show in Side Panel
$(document).on("click", ".view-invoice", function () {
let paymentId = $(this).data("id");

$.ajax({
url: `/invoice/${paymentId}`,
type: "GET",
beforeSend: function () {
$("#invoiceContent").html(`<p class="text-center">Loading...</p>`);
$("#downloadInvoice").hide();
},
success: function (data) {
let invoiceDetails = `
<div class="text-center mb-3">
<img src="/assets/logo.png" alt="Company Logo" width="100">
</div>
<p><strong>Name:</strong> ${data.name}</p>
<p><strong>Email:</strong> ${data.email}</p>
<p><strong>Mobile:</strong> ${data.mobile}</p>
<p><strong>Amount Paid:</strong> ₹${parseFloat(data.amount).toFixed(2)}</p>
<p><strong>Payment Method:</strong> ${data.payment_method}</p>
<p><strong>Status:</strong> <span class="badge bg-${data.status === 'Completed' ? 'success' : 'danger'}">${data.status}</span></p>
<p><strong>Date:</strong> ${new Date(data.created_at).toLocaleDateString()}</p>
`;

$("#invoiceContent").html(invoiceDetails);
$("#downloadInvoice").data("invoice", data).show();
},
error: function () {
$("#invoiceContent").html(`<p class="text-danger text-center">Failed to load invoice.</p>`);
$("#downloadInvoice").hide();
}
});
});

// Download Invoice as PDF with Styling
$("#downloadInvoice").on("click", function () {
let data = $(this).data("invoice");

if (!data) return;

const { jsPDF } = window.jspdf;
const doc = new jsPDF();

doc.setFont("helvetica", "bold");
doc.setTextColor(40, 116, 166);
doc.text("Invoice Details", 20, 20);

doc.setFont("helvetica", "normal");
doc.setTextColor(0, 0, 0);
doc.text(`Name: ${data.name}`, 20, 40);
doc.text(`Email: ${data.email}`, 20, 50);
doc.text(`Mobile: ${data.mobile}`, 20, 60);
doc.text(`Amount Paid: ₹${parseFloat(data.amount).toFixed(2)}`, 20, 70);
doc.text(`Payment Method: ${data.payment_method}`, 20, 80);
doc.text(`Status: ${data.status}`, 20, 90);
doc.text(`Date: ${new Date(data.created_at).toLocaleDateString()}`, 20, 100);

// Adding a footer
doc.setFontSize(10);
doc.setTextColor(100);
doc.text("Thank you for your payment!", 20, 120);

doc.save(`Invoice_${data.id}.pdf`);
});
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
$(document).ready(function () {
// Fetch Invoice Details & Show in Modal
$(document).on("click", ".view-invoice", function () {
let paymentId = $(this).data("id");

$.ajax({
url: `/invoice/${paymentId}`,
type: "GET",
beforeSend: function () {
$("#invoiceContent").html(`<p class="text-center text-muted">Loading...</p>`);
$("#downloadInvoice").hide();
},
success: function (data) {
let invoiceDetails = `
<div class="text-center mb-3">
<img src="/assets/logo.png" alt="Company Logo" width="100">
</div>
<p><strong>Name:</strong> ${data.name}</p>
<p><strong>Email:</strong> ${data.email}</p>
<p><strong>Mobile:</strong> ${data.mobile}</p>
<p><strong>Amount Paid:</strong> ₹${parseFloat(data.amount).toFixed(2)}</p>
<p><strong>Payment Method:</strong> ${data.payment_method}</p>
<p><strong>Status:</strong> <span class="badge bg-${data.status === 'Completed' ? 'success' : 'danger'}">${data.status}</span></p>
<p><strong>Date:</strong> ${new Date(data.created_at).toLocaleDateString()}</p>
`;

$("#invoiceContent").html(invoiceDetails);
$("#downloadInvoice").data("invoice", data).show();

// Show the modal
$("#invoiceModal").modal("show");
},
error: function () {
$("#invoiceContent").html(`<p class="text-danger text-center">Failed to load invoice.</p>`);
$("#downloadInvoice").hide();
}
});
});

// Download Invoice as PDF
$("#downloadInvoice").on("click", function () {
let data = $(this).data("invoice");

if (!data) return;

const { jsPDF } = window.jspdf;
const doc = new jsPDF();

doc.setFont("helvetica", "bold");
doc.setTextColor(40, 116, 166);
doc.text("Invoice Details", 20, 20);

doc.setFont("helvetica", "normal");
doc.setTextColor(0, 0, 0);
doc.text(`Name: ${data.name}`, 20, 40);
doc.text(`Email: ${data.email}`, 20, 50);
doc.text(`Mobile: ${data.mobile}`, 20, 60);
doc.text(`Amount Paid: ₹${parseFloat(data.amount).toFixed(2)}`, 20, 70);
doc.text(`Payment Method: ${data.payment_method}`, 20, 80);
doc.text(`Status: ${data.status}`, 20, 90);
doc.text(`Date: ${new Date(data.created_at).toLocaleDateString()}`, 20, 100);

// Adding a footer
doc.setFontSize(10);
doc.setTextColor(100);
doc.text("Thank you for your payment!", 20, 120);

doc.save(`Invoice_${data.id}.pdf`);
});
});
</script>



