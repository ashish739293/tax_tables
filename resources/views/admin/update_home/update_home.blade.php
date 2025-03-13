@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Upload Slider Images</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Error Handling -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.upload-banner') }}" method="POST" enctype="multipart/form-data">
    @csrf

        <!-- Title -->
        <div class="mb-3">
            <label class="form-label">Title (H4 Tag)</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <!-- Main Text -->
        <div class="mb-3">
            <label class="form-label">Main Text (H1 Tag)</label>
            <input type="text" name="main_text" class="form-control" required>
        </div>

        <!-- Footer Text -->
        <div class="mb-3">
            <label class="form-label">Footer Text (P Tag)</label>
            <textarea name="footer_text" class="form-control" rows="3" required></textarea>
        </div>

        <!-- Image Upload -->
        <div class="mb-3">
            <label class="form-label">Upload 3 Slider Images</label>
            <input type="file" name="images[]" class="form-control" accept="image/*" multiple required>
            <small class="text-muted">Upload exactly 3 images (JPEG, PNG, JPG, GIF, max size: 2MB each).</small>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
