<div class="container py-5 mt-5">
    <h2 class="text-left fw-bold mb-5">Latest Blogs</h2>

    <div class="row justify-content-center">
        @foreach($blogs as $blog)
            <div class="col-md-{{ count($blogs) == 1 ? '12' : (count($blogs) == 2 ? '6' : '4') }} mb-4">
                <div class="card shadow-sm h-100">
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" 
                             alt="{{ $blog->title }}" 
                             class="card-img-top mt-4" 
                             style="height: 150px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $blog->title }}</h5>

                        <!-- Show limited content -->
                        <p class="card-text">{{ Str::limit($blog->content, 150) }}</p>

                        <!-- Read More Button (Triggers Modal) -->
                        <button class="btn btn-sm" 
                                style="background: #05d69f;"
                                data-bs-toggle="modal" 
                                data-bs-target="#blogModal{{ $blog->id }}">
                            Read More →
                        </button>
                    </div>
                    <div class="card-footer text-muted small">
                        Posted on {{ $blog->created_at->format('M d, Y') }}
                    </div>
                </div>
            </div>

            <!-- Bootstrap Modal for Each Blog -->
            <div class="modal fade" id="blogModal{{ $blog->id }}" tabindex="-1" aria-labelledby="blogModalLabel{{ $blog->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="blogModalLabel{{ $blog->id }}">{{ $blog->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" 
                                     alt="{{ $blog->title }}" 
                                     class="img-fluid rounded mb-3">
                            @endif
                            <p>{{ $blog->content }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
