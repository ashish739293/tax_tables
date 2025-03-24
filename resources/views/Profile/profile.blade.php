@include('includes.head', ['title' => 'Profile'])
@include('includes.navbar_index')

<style>
    body {
        background: linear-gradient(135deg, #1e3c72, #57697b00);
        color: #fff;
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        padding: 30px 10px;
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
        <button class="tab-button active" onclick="openTab('profile')">Profile</button>
        <button class="tab-button" onclick="openTab('billing')">My Billing Invoices</button>
        <button class="tab-button" onclick="openTab('payment')">Payment History</button>
        <!-- <button class="tab-button" onclick="openTab('invoice')">Invoice</button> -->
        <button class="tab-button" onclick="openTab('rate-us')">Rate US</button>
        <a href="https://wa.me/YOUR_NUMBER" target="_blank" class="whatsapp-button">Chat in WhatsApp</a>
    </div>

    <div class="row">
        <!-- Sidebar Menu -->
        <div class="col-md-3 bg-light p-3 rounded">
            <div class="text-center">
                <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($user->email))) }}?s=100" class="rounded-circle mb-2" alt="Avatar">
                <h5>{{ $user->firstname }} {{ $user->lastname }}</h5>
                <p><a href="#" class="text-primary">View Profile</a></p>
            </div>
            <ul class="list-group">
                <li class="list-group-item active">Account</li>
                <li class="list-group-item"><a href="#" data-bs-toggle="modal" data-bs-target="#updatePasswordModal">Change Password</a></li>
                <li class="list-group-item"><a href="#">Privacy</a></li>
                <li class="list-group-item text-danger"><a href="#">Delete Account</a></li>
            </ul>
        </div>

        <!-- Profile Content -->
        <div class="col-md-9">
            <div id="profile" class="tab-content active">
                <div class="card p-4">
                    <h4 class="text-warning">Account</h4>
                    <form method="POST" action="">
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
                    <p>Coming Soon...</p>
                </div>
            </div>

            <!-- Invoice Section -->
            <div id="invoice" class="tab-content">
                <div class="card p-4">
                    <h4 class="text-warning">Invoice</h4>
                    <p>Coming Soon...</p>
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
    function openTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.remove('active');
        });

        document.querySelectorAll('.tab-button').forEach(button => {
            button.classList.remove('active');
        });

        document.getElementById(tabId).classList.add('active');
        event.target.classList.add('active');
    }

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
                alert(data.message);
                location.reload(); // Reload page after success
            } else {
                alert(data.error);
            }
        })
        .catch(error => console.error("Error:", error));
    });
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
