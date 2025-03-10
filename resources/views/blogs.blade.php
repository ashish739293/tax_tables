@include('includes.head', ['title' => '| Blogs'])
@include('includes.navbar_index')

<!-- Success Message -->
@if(session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<!-- Blogs List -->
@include('includes.blogs', ['blogs' => $blogs])

@include('includes.footer')
