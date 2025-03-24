<!-- Head -->
@include('includes.head', ['title' => ''])

<!-- Navbar -->

@include('includes.navbar_index')

<!-- Feature -->

    @include('includes.cart')


<!-- Offer -->

    @include('components.about.offer')


<!-- Services -->

    @include('includes.services')

<!-- Virtual Accountant -->

    @include('includes.virtualAcount')

<!-- Category -->

    @include('includes.category')


<!-- Trendy Products -->
    @include('includes.trendy_product')


<!-- Subscribe -->
    @include('includes.stay_updated')

<!-- Footer -->
    @include('includes.footer')

<!-- Toast Container -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1050;">
    <div id="toastContainer"></div>
</div>
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