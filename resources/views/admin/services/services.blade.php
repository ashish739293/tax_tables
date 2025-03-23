@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-4">
    <h3>Manage Services</h3>
    <button class="btn " style="background: #05d69f;" data-bs-toggle="modal" data-bs-target="#createCardModal">
        <i class="fas fa-plus-circle"></i> Add New Service
    </button>
</div>

<div class="row" id="services-container">
    <!-- Services will be injected here via AJAX -->
</div>

@include('admin.services.create') <!-- Ensure this file exists and is correct -->
@include('admin.services.edit') <!-- Ensure this file exists and is correct -->

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* Card hover effect */
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        /* Additional card styling */
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        
        .card-text {
            font-size: 1rem;
        }

        .card-body {
            padding: 1.25rem;
        }

        .btn {
            font-size: 0.9rem;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .col-md-4 {
            margin-bottom: 1rem;
        }
    </style>
</head>

@endsection

@push('scripts')
<script>
$(document).ready(function() {

    // Set up CSRF token from meta tag for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'X-Requested-With': 'XMLHttpRequest'
        }
    });

    // Handle Create Service Form Submission
    $('#create-service-form').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            url: '/services_details',  // POST request URL
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#createCardModal').modal('hide');
                loadServices();  // Reload services list
            },
            error: function(err) {
                console.log(err);
                alert('Error creating service!');
            }
        });
    });

    // Handle Edit Service (Using Row Data)
    $(document).on('click', '.edit-service', function() {
        const serviceId = $(this).data('id');

        $.get('/services_details/' + serviceId + '/edit', function(response) {
            // Populate the edit modal with the data
            $('#edit-service-id').val(response.id);
            $('#edit_name').val(response.name);
            $('#edit_description').val(response.description);
            $('#edit_price').val(response.price);
            $('#editCardModal').modal('show');
        });
    });

    // Handle Edit Service Form Submission (Using Row Data)
    $('#edit-service-form').on('submit', function(e) {
        e.preventDefault();

        let serviceId = $('#edit-service-id').val();  // Get row data (service ID)
        let formData = new FormData(this);

        $.ajax({
            url: '/services_update/' + serviceId,  // PUT request URL
            type: 'POST',  // For Laravel, POST can be used with a _method override for PUT
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // CSRF token
            },
            success: function(response) {
                $('#editCardModal').modal('hide');
                loadServices();  // Reload services after update
            },
            error: function(err) {
                console.log(err);
                alert('Error updating service!');
            }
        });
    });

    // Handle Delete Service (Using Row Data)
    $(document).on('click', '.delete-service', function() {
        const serviceId = $(this).data('id');  // Get the row data (service ID)

        if (confirm("Are you sure you want to delete this service?")) {
            $.ajax({
                url: '/services_delete/' + serviceId,
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    loadServices();  // Reload services after deletion
                },
                error: function(err) {
                    console.log(err);
                    alert('Error deleting service!');
                }
            });
        }
    });

    // Function to Load Services
    function loadServices() {
        $.get('/services_details', function(data) {
            console.log(data);
            let servicesHTML = '';
            data.forEach(function(service) {
                let featuresHTML = '';

                // Check if features exist and are not null
                if (service.features && Array.isArray(service.features) && service.features.length > 0) {
                    featuresHTML = `
                        <ul class="list-unstyled mt-2">
                            ${service.features.map(feature => `<li>✅ ${feature}</li>`).join('')}
                        </ul>
                    `;
                }
                servicesHTML += `
                    <div class="col-md-4">
                        <div class="card shadow-sm border-light rounded">
                            <img src="/storage/${service.image}" class="card-img-top rounded-top" alt="${service.name}">
                            <div class="card-body">
                                <h5 class="card-title text-center text-primary">${service.name}</h5>
                                <p class="card-text text-muted">Price: <strong class="text-success">$${service.price}</strong></p>
                                ${featuresHTML} <!-- Features Section -->
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-warning edit-service" data-id="${service.id}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-danger delete-service" data-id="${service.id}">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
            $('#services-container').html(servicesHTML);
        }).fail(function() {
            alert("Error loading services!");
        });
    }

    // Load Services (GET Request)
    loadServices();
});
</script>
@endpush
