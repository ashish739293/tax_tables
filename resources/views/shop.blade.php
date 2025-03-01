@include('includes.head', ['title' => '| Shop'])
<!-- Top Bar Start -->
@include('includes.navbar_index')
<!-- Top Bar End -->
<!-- Header Start -->
<!-- Header End -->
@include('includes.page', ['name' => 'shop'])
<!-- Shop  -->
@include('includes.shop')
<!-- Include file from include/footer.blade.php file -->
@include('includes.footer')
