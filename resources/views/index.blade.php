<!-- Head -->
@include('includes.head', ['title' => ''])

<!-- Navbar -->
<div data-aos="fade-down">
    @include('includes.navbar_index')
</div>

<!-- Feature -->
<div data-aos="fade-up">
    @include('includes.cart')
</div>

<!-- Category -->
<div data-aos="fade-down">
    @include('includes.category')
</div>

<!-- Services -->
<div data-aos="fade-right">
    @include('includes.services')
</div>

<!-- Offer -->
<div data-aos="fade-left">
    @include('includes.offer')
</div>

<!-- Trendy Products -->
<div data-aos="zoom-in">
    @include('includes.trendy_product')
</div>

<!-- Subscribe -->
<div data-aos="flip-up">
    @include('includes.stay_updated')
</div>

<!-- Footer -->
<div data-aos="fade-up">
    @include('includes.footer')
</div>
