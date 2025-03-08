<div class="modal fade" id="editCardModal" tabindex="-1" aria-labelledby="editCardModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCardModalLabel">Edit Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-service-form" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" id="edit-service-id">
                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Service Name</label>
                        <input type="text" name="name" id="edit_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_description" class="form-label">Description</label>
                        <textarea name="description" id="edit_description" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_price" class="form-label">Price</label>
                        <input type="number" name="price" id="edit_price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_image" class="form-label">Service Image</label>
                        <input type="file" name="image" id="edit_image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Update Service</button>
                </form>
            </div>
        </div>
    </div>
</div>
