@include('includes.head', ['title' => 'Login'])
@include('includes.navbar_index')

<div class="container d-flex flex-column align-items-center justify-content-center vh-100">
    <div class="card shadow-lg p-4 text-center" style="max-width: 400px; width: 100%;">
        <h2 class="fw-bold">Reset Password</h2>
        <p class="text-muted">Enter your email to receive a password reset link.</p>

        <form method="POST" action="">
            @csrf
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
        </form>

        <div class="mt-3">
            <a href="/login" class="text-decoration-none">Back to Login</a>
        </div>
    </div>
</div>

<style>
body {
    background: linear-gradient(135deg,rgb(68, 91, 226),rgb(59, 103, 224));
}
.card {
    border-radius: 12px;
}
button {
    background: linear-gradient(135deg,rgb(69, 91, 211),rgb(65, 139, 235));
    border: none;
    font-weight: bold;
}
button:hover {
    opacity: 0.9;
}
</style>
