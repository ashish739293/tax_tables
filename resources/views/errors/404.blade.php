@include('includes.head', ['title' => '| Contact'])

@include('includes.navbar_index')
<div class="container text-center d-flex flex-column align-items-center justify-content-center vh-100">
    <h1 class="display-1 fw-bold text-danger">404</h1>
    <h2 class="fw-bold">Oops! Page Not Found</h2>
    <p class="text-muted">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
    
    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Go Back Home</a>

    <div class="mt-4">
        <img src="https://source.unsplash.com/500x300/?error,404" class="img-fluid rounded shadow" alt="Error Image">
    </div>
</div>

<style>
body {
    background:rgb(24, 27, 223);
}
h1 {
    font-size: 8rem;
    animation: fadeInDown 1s ease-in-out;
}
h2 {
    animation: fadeInUp 1s ease-in-out;
}
img {
    animation: bounceIn 1s ease-in-out;
}
@keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes bounceIn {
    from { opacity: 0; transform: scale(0.9); }
    to { opacity: 1; transform: scale(1); }
}
</style>