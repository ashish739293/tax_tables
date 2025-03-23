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
</style>

<div class="container mt-5">
    <!-- Feature Buttons -->
    <div class="tab-buttons">
        <button class="tab-button active" onclick="openTab('profile')">Profile</button>
        <button class="tab-button" onclick="openTab('billing')">My Billing Invoices</button>
        <button class="tab-button" onclick="openTab('payment')">Payment History</button>
        <button class="tab-button" onclick="openTab('invoice')">Invoice</button>
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
                <li class="list-group-item"><a href="#">Change Password</a></li>
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
</script>
