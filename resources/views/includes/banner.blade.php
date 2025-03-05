<style>


 .home-container {
    position: relative;
    min-height: 120vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(55, 55, 61, 0.3); /* Secondary color overlay */
    padding: 40px;
}

.home-container::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* background: url('https://taxtablet.in/wp-content/uploads/2024/05/Navy-Modern-Business-Blog-Banner-1.png') no-repeat center center/cover; */
    opacity: 0.5; /* Adjust transparency */
    z-index: -1;
}

.background-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1;
    opacity: 0.5; /* Adjust transparency */
}


    /* Left Section Styling */
    .left-section {
        max-width: 600px;
        text-align: left;
    }

    /* Enlarged & Styled Heading */
    .left-section h1 {
        font-size: 48px;
        font-weight: 900;
        color: #f8f9fa;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    }

    .left-section h4 {
        font-size: 22px;
        font-weight: bold;
        color: #ffcc00;
    }

    .left-section p {
        font-size: 20px;
        font-weight: bold;
        color: #f8f9fa;
    }

    /* Typing Animation */
    .typing-text {
        font-size: 48px;
        font-weight: bold;
        color: #ff6b6b;
        overflow: hidden;
        white-space: nowrap;
        border-right: 3px solid #ff6b6b;
        animation: typing 3s steps(30, end) infinite alternate, blink 0.8s step-end infinite;
    }

    @keyframes typing {
        from { width: 0; }
        to { width: 100%; }
    }

    @keyframes blink {
        50% { border-color: transparent; }
    }

    /* Form Styling */
    .form-container {
        position: absolute;
        bottom: 30px;
        right: 40px;
        background: linear-gradient(135deg, rgba(173, 216, 230, 0.95), rgba(240, 248, 255, 0.95));
        padding: 35px;
        width: 90%;
        max-width: 420px;
        border-radius: 12px;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
        color: #003366;
        font-weight: bold;
    }

    .form-container h4 {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        color: #002855;
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        padding: 6px;
        margin-bottom: 15px;
        border-radius: 6px;
        border: 1px solid #002855;
        font-size: 16px;
    }

    /* Buttons */
    .btn-custom {
        display: inline-block;
        padding: 14px 20px;
        font-size: 18px;
        font-weight: bold;
        text-decoration: none;
        border-radius: 30px;
        transition: all 0.3s ease;
    }

    .btn-transparent {
        background: rgba(255, 255, 255, 0.2);
        color: #fff;
        border: 2px solid #fff;
    }

    .btn-transparent:hover {
        background: #fff;
        color: #000;
    }

    .btn-whatsapp1 {
        background: rgba(39, 228, 14, 0.57);
        color: #fff;
        border: 2px solid #fff;
    }

    .btn-whatsapp1:hover {
        background:rgb(12, 136, 32);
        color: #fff;
    }

    /* Contact Number */
    .contact-section {
        font-size: 20px;
        font-weight: bold;
        color: #002855;
        background:rgb(190, 206, 216);
        padding: 23px 6px;;
        border-radius: 8px;
        text-align: center;
        margin-bottom: 15px;
    }

    /* Responsive Design */
@media (max-width: 992px) {
    .home-container {
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 20px;
    }

    .left-section {
        max-width: 100%;
        text-align: center;
    }

    .left-section h1 {
        font-size: 36px;
    }

    .left-section p {
        font-size: 18px;
    }

    .form-container {
        position: static;
        width: 100%;
        margin-top: 20px;
        max-width: 90%;
    }
}

/* Mobile View Adjustments */
@media (max-width: 768px) {
    .home-container {
        padding-top: 100px; /* Space for navbar */
    }

    .form-container {
        padding: 20px;
        max-width: 100%;
        box-shadow: none;
    }

    .left-section h1 {
        font-size: 28px;
    }

    .typing-text {
        font-size: 30px;
    }

    .left-section h4 {
        font-size: 18px;
    }

    .left-section p {
        font-size: 16px;
    }
     
    .contact-section {
        font-size: 18px;
        padding: 15px;
    }

    .btn-whatsapp1 {

        margin-top:8px;
    }
}
</style>

<div class="home-container">

    <video autoplay muted loop class="background-video">
        <source src="/video/home.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Side Content -->
            <div class="col-md-6 left-section">
                <h4>📢 Hurry up! Last date is 31st July</h4>
                <h1>File Your ITR, <span class="typing-text">TODAY</span></h1>
                <p>🔥 JUST START FROM ₹400 ONLY 🔥</p>

                <div class="mt-4">
                    <a class="btn btn-custom btn-transparent me-2" href="https://taxtablet.in/account/">
                        <i class="fas fa-user"></i> Account Login
                    </a>
                    <a class="btn btn-custom btn-whatsapp1" href="https://wa.link/z5h1qf">
                        <i class="fab fa-whatsapp"></i> Chat with Tax Expert
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side Form -->
    <div class="form-container">
        <!-- Contact Number Section -->
        <div class="contact-section">
            📞 Toll Free Call : <strong>+91 94629-29135</strong>
        </div>

        <h4>Book Appointment</h4>

        <form id="appointmentForm" >
            @csrf
            <input type="text" name="name" class="form-control" placeholder="Name" required>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <input type="text" name="phone" class="form-control" placeholder="Phone" required>
            <select name="service" class="form-control" required>
                <option value="">Select Required Service</option>
                <option value="company register" >Company Register</option>
                <option value="ITR Filling">ITR Filling</option>
                <option value="Consultation">Consultation</option>
            </select>
            <input type="text" name="time_slot" class="form-control" placeholder="Suitable Time Slot" required>
            <textarea type="text" name="message" class="form-control" placeholder="Message"></textarea>
            <!-- <button type="submit" class="btn btn-primary form-control">Send Message</button> -->
            <button type="submit" class="btn btn-primary w-100">Send Message</button>

        </form>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Add this if jQuery is missing -->
<script>
   $(document).ready(function() {
    $('#appointmentForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        let formData = $(this).serialize() + '&_token=' + $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: "POST",
            url: "/appointment",
            data: formData,
            success: function(response) {
                console.log("Success Response: ", response);
                showToast("✅  Appointment booked successfully!", "success");
                $('#appointmentForm')[0].reset(); // Reset form
            },
            error: function(xhr, status, error) {
                console.log("Error Response: ", xhr.responseText);
                showToast("❌  Failed to book appointment. Try again!", "error");
            }
        });
    });
});

</script>