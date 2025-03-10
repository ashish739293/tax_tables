<!-- Footer Start -->
<div class="amazing-footer container-fluid bg-dark text-light mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="footer-box col-lg-4 col-md-6 mb-5 text-lg-start text-center">
            <a href="" class="footer-brand text-decoration-none">
                <h1 class="footer-heading mb-4 display-5 fw-bold text-primary">Tax Tablet</h1>
            </a>
            <p class="footer-description">
                Stay ahead during tax season with our expert guidance. We simplify complex tax regulations and provide essential resources for stress-free filing.
            </p>
            <p class="footer-contact"><i class="fas fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
            <p class="footer-contact"><i class="fas fa-envelope text-primary me-2"></i>info@example.com</p>
            <p class="footer-contact"><i class="fas fa-phone-alt text-primary me-2"></i>+012 345 67890</p>
        </div>
        <div class="footer-box col-lg-4 col-md-6 mb-5 text-lg-start text-center">
            <h5 class="footer-heading text-light mb-4">Quick Links</h5>
            <div class="footer-links d-flex flex-column">
                <a class="footer-link text-light mb-2" href="/"><i class="fas fa-angle-right me-2"></i>Home</a>
                <a class="footer-link text-light mb-2" href="/contact"><i class="fas fa-angle-right me-2"></i>Contact</a>
                <a class="footer-link text-light mb-2" href="/blogs"><i class="fas fa-angle-right me-2"></i>Blogs</a>
                <a class="footer-link text-light" href="/login"><i class="fas fa-angle-right me-2"></i>Login</a>
            </div>
        </div>
        <div class="footer-box col-lg-4 col-md-12 mb-5 text-lg-start text-center">
            <h5 class="footer-heading text-light mb-4">Newsletter</h5>
            <form action="">
                <div class="footer-input-group mb-3">
                    <input type="text" class="footer-input form-control" placeholder="Your Name" required />
                </div>
                <div class="footer-input-group mb-3">
                    <input type="email" class="footer-input form-control" placeholder="Your Email" required />
                </div>
                <button class="footer-btn btn btn-primary w-100" type="submit">Subscribe Now</button>
            </form>
        </div>
    </div>
    <div class="row border-top border-light mx-xl-5 py-4">
        <div class="col-md-6 text-center text-md-start">
            <p class="footer-copyright mb-0">
                &copy; <a class="text-primary fw-bold" href="/">Tax Tablet</a>. All Rights Reserved.
            </p>
        </div>
        <!-- <div class="col-md-6 text-center text-md-end">
            <img class="footer-payment img-fluid" src="img/payments.png" alt="Payment Methods">
        </div> -->
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="footer-back-top btn btn-primary "><i class="fas fa-chevron-up"></i></a>

<!-- Custom Footer CSS -->
<style>
    .amazing-footer {
        background: linear-gradient(to right, #1c1c1c, #1c1c1c);
        color: #fff;
        
    }
    .footer-heading {
        font-size: 28px;
        font-weight: 700;
    }
    .footer-description {
        font-size: 16px;
        line-height: 1.6;
    }
    .footer-contact {
        font-size: 15px;
        margin-bottom: 8px;
    }
    .footer-links a {
        font-size: 18px;
        transition: color 0.3s ease-in-out;
        padding: 5px 0;
    }
    .footer-links a:hover {
        color: #ffc107;
    }
    .footer-input {
        border-radius: 10px;
        padding: 12px;
    }
    .footer-btn {
        font-size: 18px;
        padding: 14px;
        /* border-radius: 10px; */
    }
    .footer-back-top {
        position: fixed;
        bottom: 25px;
        right: 25px;
        display: none;
        width: 55px;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        background:rgb(7, 94, 255);
        color: #000;
    }
    .footer-back-top:hover {
        background:rgb(0, 60, 224);
    }
    .footer-payment {
        max-width: 180px;
    }
    
    @media (max-width: 992px) {
        .footer-box {
            text-align: center;
        }
    }
    @media (max-width: 768px) {
        .footer-links {
            text-align: center;
        }
        .footer-back-top {
            bottom: 15px;
            right: 15px;
        }
    }
    @media (max-width: 576px) {
        .amazing-footer {
            text-align: center;
        }
    }
</style>

<script>
    // Show back to top button on scroll
    window.addEventListener('scroll', function () {
        const backTop = document.querySelector('.footer-back-top');
        if (window.scrollY > 300) {
            backTop.style.display = 'flex';
        } else {
            backTop.style.display = 'none';
        }
    });
</script>