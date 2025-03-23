@include('includes.head', ['title' => '| Blogs'])
@include('includes.navbar_index')

<div class="mt-5">
    @include('components.about.offer')
    @include('components.about.cards')
    @include('components.about.owner')
</div>
@include('includes.footer')