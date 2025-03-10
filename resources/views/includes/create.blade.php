<div class="container py-5 mt-5">
    <h2 class="text-left fw-bold mb-5">Create a New Blog</h2>

    <div class="row align-items-center">
        <!-- First Column: Image -->
        <div class="col-md-6 text-center">
            <img src="{{ asset('storage/blogs/yObN4sR17Y9aHdpnjjS7mXNKwP6ORzkU1r7gVCIk.png') }}" alt="Create Blog">
        </div>

        <!-- Second Column: Blog Form -->
        <div class="col-md-6">
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Blog Title -->
                <div class="mb-3">
                    <!-- <label class="form-label fw-bold">Title</label> -->
                    <input type="text" name="title" class="form-control form-control-lg border-primary" placeholder="Enter blog title" required>
                </div>

                <!-- Blog Content -->
                <div class="mb-3">
                    <!-- <label class="form-label fw-bold">Content</label> -->
                    <textarea name="content" class="form-control border-primary" rows="6" placeholder="Write your blog content..." required></textarea>
                </div>

                <!-- Image Upload -->
                <div class="mb-3">
                    <!-- <label class="form-label fw-bold">Upload Image</label> -->
                    <input type="file" name="image" class="form-control">
                </div>

                <!-- Submit Button -->
                <div class="text-left mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">Publish Blog</button>
                </div>
            </form>
        </div>
    </div>
</div>
