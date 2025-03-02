@include('includes.head', ['title' => 'Contact'])
@include('includes.navbar_index')

<div class="container-fluid pt-5" id="contactPage">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Contact For Any Queries</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            <div class="contact-form">
                <form id="contactForm">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                    </div>
                    <button class="btn btn-primary py-2 px-4 w-100" type="submit">Send Message</button>
                </form>
            </div>
        </div>
        <div class="col-lg-5 mb-5">
            <h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
            <p>Have any questions? Feel free to reach out to us.</p>
            <div>
                <h5 class="font-weight-semi-bold">Store</h5>
                <p><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
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
                    window.location.href = "/login";
                }
            },
            error: function() {
                window.location.href = "/login"; // Redirect to login if error occurs
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
