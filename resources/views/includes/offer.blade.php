
<style>
.about-section {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px 20px;
    background: #f8f9fa; /* Light background */
}

.about-container {
    max-width: 1200px;
    display: flex;
    align-items: center;
    gap: 40px;
}

/* Left Side - Text */
.about-text {
    flex: 1;
    max-width: 600px;
}

.about-text h2 {
    font-size: 36px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
    position: relative;
}

.about-text h2::after {
    content: "";
    width: 80px;
    height: 4px;
    background: #007bff;
    display: block;
    margin-top: 5px;
}

.about-text h5 {
    font-size: 20px;
    color: #444;
    margin-bottom: 10px;
}

.about-text p {
    font-size: 18px;
    color: #555;
    line-height: 1.6;
    margin-bottom: 20px;
}

.about-text .btn-learn {
    background-color: #007bff;
    color: white;
    font-size: 18px;
    padding: 12px 24px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    font-weight: bold;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
    transition: 0.3s ease;
}

.about-text .btn-learn:hover {
    background-color: #0056b3;
}

/* Right Side - Image */
.about-image {
    flex: 1;
    text-align: center;
}

.about-image img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
    animation: fadeIn 1s ease-in-out;
}

/* Responsive Adjustments */
@media (max-width: 1024px) {
    .about-container {
        flex-direction: column;
        text-align: center;
        gap: 30px;
    }

    .about-text {
        max-width: 90%;
    }

    .about-text h2 {
        font-size: 32px;
    }

    .about-text h5 {
        font-size: 18px;
    }

    .about-text h2::after {
        margin: 5px auto;
    }

    .about-text p {
        font-size: 16px;
    }

    .about-text .btn-learn {
        font-size: 16px;
        padding: 10px 20px;
    }

    .about-image img {
        max-width: 80%;
    }
}

@media (max-width: 768px) {
    .about-section {
        padding: 40px 15px;
    }

    .about-container {
        gap: 20px;
    }

    .about-text h2 {
        font-size: 28px;
    }

    .about-text h5 {
        font-size: 16px;
    }

    .about-text p {
        font-size: 14px;
    }

    .about-text .btn-learn {
        font-size: 14px;
        padding: 8px 16px;
    }

    .about-image img {
        max-width: 100%;
    }
}

/* Mobile View */
@media (max-width: 480px) {
    .about-section {
        padding: 30px 10px;
    }

    .about-text h2 {
        font-size: 24px;
    }

    .about-text h5 {
        font-size: 14px;
    }

    .about-text p {
        font-size: 13px;
    }

    .about-text .btn-learn {
        font-size: 13px;
        padding: 7px 14px;
    }

    .about-image img {
        max-width: 90%;
    }
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}


</style>

<div class="about-section">
    <div class="about-container">
        <!-- Left Side - Text -->
        <div class="about-text">
            <h2>About Us</h2>
            <h5>Simplify Your Tax Filing with Tax Tablet</h5>
            <p>Tax Tablet redefines the tax filing experience by offering a seamless and efficient platform that enables users to complete their income tax returns in just 30 minutes. With innovative features like real-time chat and expert consultation, users have access to personalized guidance and support every step of the way. Say goodbye to the frustration of navigating complex tax forms and hello to a stress-free filing process with Tax Tablet. Whether you’re a seasoned taxpayer or filing for the first time, our user-friendly interface and expert assistance ensure accuracy and peace of mind. Simplify your tax filing today with Tax Tablet.</p>
            <a href="" class="btn-learn">Learn More</a>
        </div>

        <!-- Right Side - Image -->
        <div class="about-image">
            <img src="/image/about.jpg" height="850" width="650" alt="About Us">
        </div>
    </div>
</div>
