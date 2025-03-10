

<style>
    .icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #007bff;
        color: white;
        font-size: 20px;
        text-decoration: none;
        transition: background-color 0.3s, transform 0.3s;
    }
    .icon:hover {
        background-color: #0056b3;
        transform: scale(1.1);
        text-decoration: none;
    }

    @media (min-width: 620px) {
        .icon-container {
            justify-content: flex-start !important; /* Align left when width ≥ 620px */
        }
    }
</style>

<div class="container-fluid pt-5 mt-5" id="contactPage">
@include('includes.category')
    <div class="text-center mb-5 mt-5">
        <h2 class="section-title px-5"><span class="px-2">Contact For Any Queries</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-6 mb-5">
            <h3 class="font-weight-semi-bold mb-3 text text-primary">Get In Touch</h3>
            <p>Have Questions? Need Assistance? Contact Us Today for Expert Tax Advice and Hassle-Free Tax Filing! We’re Here to Help You Every Step of the Way.</p>
            <div class="mt-5">
                <h5 class="font-weight-semi-bold text text-primary">Store</h5>
                <p><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="mt-5">
                <h5 class="font-weight-semi-bold text text-primary">Follow Us</h5>
                <div class="d-flex justify-content-center justify-content-lg-start icon-container gap-2">
                    <a href="#" class="icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="card mx-auto mb-5 pt-3 pb-3" style="max-width: 450px; background-color:rgb(64, 209, 235); border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
            <div class="pt-3 pb-3 contact-form">

            <div>
                <p style="font-weight: 500; font-size: 18px; color: rgb(5, 2, 103) !important;" class="fw-bold ">Make an Enquiry</p>
            </div>
                <form id="contactForm">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                    </div>
                    <div class="mb-3">
                        <select class="form-control" required>
                            <option>ITR FILLING</option>
                            <option>Consultation</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold" style="color: rgb(5, 2, 103) !important;">Suitable Time Slot</label>
                        <input type="date" class="form-control" name="phone" placeholder="Phone" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                    </div>
                    <button class="btn btn-primary py-2 px-4 w-100" type="submit">Send Message</button>
                </form>
            </div>
        </div>
        
    </div>
</div>
<!-- Contact End -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Check if the user is logged in
        $.ajax({
            url: "/check-auth", // API to check authentication
            method: "GET",
            success: function(response) {
                if (!response.isAuthenticated) {
                    // window.location.href = "/login";
                }
            },
            error: function() {
                // window.location.href = "/login"; // Redirect to login if error occurs
            }
        });

        // Handle form submission
        $("#contactForm").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "/submit-contact-form", // API to handle form submission
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    alert("Message sent successfully!");
                    $("#contactForm")[0].reset();
                },
                error: function() {
                    alert("Something went wrong! Please try again.");
                }
            });
        });
    });
</script>
