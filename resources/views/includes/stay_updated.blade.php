<div class="hero-section1">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content11">
            <h1 class="hero-title">
                The Value of Tax Consultants:<br>
                <span>Simplifying Complexity, Maximizing Returns</span>
            </h1>
            <p class="hero-text">
                Tax season often invokes feelings of stress and confusion for individuals and businesses alike.
                With ever-changing tax laws and regulations, it’s easy to feel overwhelmed by the complexities of filing taxes.
                This is where tax consultants shine as indispensable partners in financial management.
            </p>
            <a href="#" class="btn-primary1">Read More</a>
        </div>
    </div>
</div>

<style>
/* Hero Section */
.hero-section1 {
    position: relative;
    width: 100%;
    min-height: 100vh;
    background: url("/image/tax.jpg") no-repeat center center/cover;
    display: flex;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;
    overflow: hidden;
    padding: 5%;
}

/* Dark Overlay */
.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6); /* Darker for better readability */
}

/* Content */
.hero-content11 {
    position: relative;
    max-width: 700px;
    color: white;
    padding: 30px;
    z-index: 2;
    text-align: center;
    background: rgba(255, 255, 255, 0.1); /* Glassmorphism effect */
    border-radius: 12px;
    backdrop-filter: blur(8px);
}

/* Title */
.hero-title {
    font-size: clamp(28px, 4vw, 42px);
    font-weight: bold;
    line-height: 1.3;
    margin-bottom: 15px;
    color: #f8f9fa; /* Slightly off-white for better readability */
}

.hero-title span {
    color: #4cb9ff;
}

/* Text */
.hero-text {
    font-size: clamp(16px, 2vw, 20px);
    line-height: 1.6;
    margin-bottom: 20px;
}

/* Button */
.btn-primary1 {
    display: inline-block;
    background: #25D366;
    color: white;
    padding: 14px 28px;
    border-radius: 30px;
    text-decoration: none;
    font-size: 18px;
    font-weight: bold;
    transition: all 0.3s ease-in-out;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
}

.btn-primary1:hover {
    background: #1EBE5C;
    transform: scale(1.05);
}

/* Responsive */
@media (max-width: 768px) {
    .hero-section1 {
        min-height: 80vh;
        padding: 10% 5%;
        text-align: center;
    }

    .hero-content11 {
        max-width: 100%;
        padding: 20px;
    }

    .hero-title {
        font-size: 26px;
    }

    .hero-text {
        font-size: 16px;
    }

    .btn-primary1 {
        font-size: 16px;
        padding: 12px 24px;
    }
}

@media (max-width: 480px) {
    .hero-section1 {
        min-height: 70vh;
        padding: 15% 5%;
    }

    .hero-title {
        font-size: 22px;
    }

    .hero-text {
        font-size: 14px;
    }

    .btn-primary1 {
        font-size: 14px;
        padding: 10px 20px;
    }
}

</style>
