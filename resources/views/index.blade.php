<!--Head-->
@include('includes.head', ['title' => ''])

<!-- Novbar -->
@include('includes.navbar_index')

<!-- feature -->
@include('includes.cart')

<!-- Category start-->
@include('includes.category')
<!-- Category End-->

<!-- offer -->
@include('includes.offer')

<!-- Trendy products -->
@include('includes.trendy_product')

<!-- Subscribe Start -->
@include('includes.stay_updated')
<!-- Subscribe End -->

<!-- Include file from include/footer.blade.php file -->
@include('includes.footer')
