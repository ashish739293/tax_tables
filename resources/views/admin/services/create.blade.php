<div class="modal fade" id="createCardModal" tabindex="-1" aria-labelledby="createCardModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCardModalLabel">Create Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-service-form" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Service Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" id="price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Service Image</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Choose Features</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="features[]" value="Fast & Easy Tax Filing" id="feature1">
                            <label class="form-check-label" for="feature1">Fast & Easy Tax Filing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="features[]" value="Expert Consultation" id="feature2">
                            <label class="form-check-label" for="feature2">Expert Consultation</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="features[]" value="Maximize Tax Savings" id="feature3">
                            <label class="form-check-label" for="feature3">Maximize Tax Savings</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="features[]" value="Secure & Confidential" id="feature4">
                            <label class="form-check-label" for="feature4">Secure & Confidential</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="features[]" value="User-Friendly Interface" id="feature5">
                            <label class="form-check-label" for="feature5">User-Friendly Interface</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="features[]" value="GST & Business Tax Solutions" id="feature9">
                            <label class="form-check-label" for="feature9">GST & Business Tax Solutions</label>
                        </div> 
                    </div>
                    <button type="submit" class="btn btn-success">Create Service</button>
                </form>
            </div>
        </div>
    </div>
</div>
