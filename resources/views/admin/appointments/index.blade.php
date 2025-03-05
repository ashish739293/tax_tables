@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4 text-center fw-bold text-dark">Appointments Management</h3>

    <div class="d-flex justify-content-between mb-3">
        <button class="btn btn-secondary" onclick="fetchAppointments()">Refresh Appointments</button>
    </div>

    <div class="row" id="appointmentsContainer">
        <!-- Appointments will be dynamically loaded here -->
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetchAppointments(); // Load data on page load
    });

    function fetchAppointments() {
        fetch("{{ url('/appointments/fetch') }}")
            .then(response => response.json())
            .then(result => {
                if (!result.success) {
                    console.error("Error fetching appointments:", result.message);
                    return;
                }

                let appointments = result.data; // Correctly extract data array
                let container = document.getElementById("appointmentsContainer");
                container.innerHTML = ""; // Clear existing content

                if (appointments.length === 0) {
                    container.innerHTML = `<div class="col-12 text-center text-muted">No Appointments Found</div>`;
                    return;
                }

                appointments.forEach(appointment => {
                    let statusBadge = `<span class="badge bg-${appointment.status === 'Approved' ? 'success' : (appointment.status === 'Rejected' ? 'danger' : 'secondary')}">${appointment.status}</span>`;

                    let actionButtons = appointment.status === 'Pending' ? `
                        <button class="btn btn-outline-success btn-sm" onclick="updateStatus(${appointment.id}, 'Approved')">Approve</button>
                        <button class="btn btn-outline-danger btn-sm" onclick="updateStatus(${appointment.id}, 'Rejected')">Reject</button>
                    ` : `<span class="text-muted">No Actions</span>`;

                    let card = `
                        <div class="col-md-4 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <h5 class="card-title text-dark fw-bold">${appointment.name}</h5>
                                    <p class="card-text"><strong>Email:</strong> ${appointment.email}</p>
                                    <p class="card-text"><strong>Phone:</strong> ${appointment.phone}</p>
                                    <p class="card-text"><strong>Service:</strong> ${appointment.service}</p>
                                    <p class="card-text"><strong>Time Slot:</strong> ${appointment.time_slot}</p>
                                    <p class="card-text"><strong>Status:</strong> ${statusBadge}</p>
                                    <p class="card-text"><strong>Message:</strong> ${appointment.message ? appointment.message : 'No message provided'}</p>
                                    <div class="d-flex justify-content-between mt-3">${actionButtons}</div>
                                </div>
                            </div>
                        </div>
                    `;
                    container.innerHTML += card;
                });
            })
            .catch(error => console.error("Error fetching appointments:", error));
    }

    function updateStatus(id, status) {
        fetch("{{ url('/appointments/update-status') }}/" + id + "/" + status, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            }
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                fetchAppointments(); // Refresh UI on success
            } else {
                console.error("Error updating status:", result.message);
            }
        })
        .catch(error => console.error("Error updating status:", error));
    }
</script>
@endpush
