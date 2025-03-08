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
    
    <div class="text-center mt-3" id="viewMoreButtonContainer">
        <button class="btn btn-primary" id="viewMoreButton" onclick="toggleViewMore()">View More</button>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetchAppointments(); // Load data on page load
    });

    let allAppointments = [];  // Store all fetched appointments
    let visibleAppointmentsCount = 10;  // Initially show 10 appointments

    function fetchAppointments() {
        fetch("{{ url('/appointments/fetch') }}")
            .then(response => response.json())
            .then(result => {
                if (!result.success) {
                    console.error("Error fetching appointments:", result.message);
                    return;
                }

                allAppointments = result.data;  // Store all appointments

                // Sort appointments in descending order based on the id (latest first)
                allAppointments.sort((a, b) => b.id - a.id);  // Sort by id in descending order

                // Update the UI with the latest 10 appointments
                displayAppointments();

            })
            .catch(error => console.error("Error fetching appointments:", error));
    }

    function displayAppointments() {
        let container = document.getElementById("appointmentsContainer");
        container.innerHTML = ""; // Clear existing content

        // Get the appointments to display based on the current visible count
        let appointmentsToShow = allAppointments.slice(0, visibleAppointmentsCount);

        if (appointmentsToShow.length === 0) {
            container.innerHTML = `<div class="col-12 text-center text-muted">No Appointments Found</div>`;
            return;
        }

        appointmentsToShow.forEach(appointment => {
            let statusBadge = `<span class="badge bg-${appointment.status === 'Approved' ? 'success' : (appointment.status === 'Rejected' ? 'danger' : 'secondary')}">${appointment.status}</span>`;

            let actionButtons = appointment.status === 'Pending' ? `
                <button class="btn btn-outline-success btn-sm" onclick="updateStatus(${appointment.id}, 'Approved')">Approve</button>
                <button class="btn btn-outline-danger btn-sm" onclick="updateStatus(${appointment.id}, 'Rejected')">Reject</button>
            ` : `<span class="text-muted">No Actions</span>`;

            // Add a 'Read More' button to the message if the message is too long
            let message = appointment.message ? appointment.message : 'No message provided';
            let messagePreview = message.length > 100 ? message.slice(0, 100) + '...' : message;
            let viewMoreButton = message.length > 100 ? `<button class="btn btn-link btn-sm" onclick="toggleMessage(${appointment.id})">Read More</button>` : '';

            let card = `
                <div class="col-md-4 mb-4">
                    <div class="card shadow border-0 rounded-3" style="min-height: 350px;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-dark fw-bold">${appointment.name}</h5>
                            <p class="card-text"><strong>Email:</strong> ${appointment.email}</p>
                            <p class="card-text"><strong>Phone:</strong> ${appointment.phone}</p>
                            <p class="card-text"><strong>Service:</strong> ${appointment.service}</p>
                            <p class="card-text"><strong>Time Slot:</strong> ${appointment.time_slot}</p>
                            <p class="card-text"><strong>Status:</strong> ${statusBadge}</p>
                            <p class="card-text"><strong>Message:</strong> <span id="messagePreview-${appointment.id}">${messagePreview}</span>${viewMoreButton}</p>
                            <div class="d-flex justify-content-between mt-3">${actionButtons}</div>
                        </div>
                    </div>
                </div>
            `;
            container.innerHTML += card;
        });

        // Show or hide "View More" based on the total number of appointments
        if (allAppointments.length > visibleAppointmentsCount) {
            document.getElementById("viewMoreButton").style.display = 'block';
        } else {
            document.getElementById("viewMoreButton").style.display = 'none';
        }
    }

    function toggleViewMore() {
        if (visibleAppointmentsCount === 10) {
            // Show all appointments
            visibleAppointmentsCount = allAppointments.length;
            document.getElementById("viewMoreButton").textContent = 'View Less';
        } else {
            // Show only 10 appointments
            visibleAppointmentsCount = 10;
            document.getElementById("viewMoreButton").textContent = 'View More';
        }
        displayAppointments();
    }

    function toggleMessage(id) {
        let messagePreview = document.getElementById(`messagePreview-${id}`);
        let appointment = allAppointments.find(a => a.id === id);
        if (messagePreview.innerText.length > 100) {
            messagePreview.innerText = appointment.message; // Show full message
        } else {
            messagePreview.innerText = appointment.message.slice(0, 100) + '...'; // Show preview
        }
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
