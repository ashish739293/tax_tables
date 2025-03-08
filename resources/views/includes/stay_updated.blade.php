<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                The Value of Tax Consultants:<br>
                <span>Simplifying Complexity, Maximizing Returns</span>
            </h1>
            <p class="hero-text">
                Tax season often invokes feelings of stress and confusion for individuals and businesses alike.
                With ever-changing tax laws and regulations, it’s easy to feel overwhelmed by the complexities of filing taxes.
                This is where tax consultants shine as indispensable partners in financial management.
            </p>
            <a href="#" class="btn-primary">Read More</a>
        </div>
    </div>
</div>

<style>
    /* Hero Section */
    .hero-section {
        position: relative;
        width: 100%;
        min-height: 90vh;
        background: url("https://taxtablet.in/wp-content/uploads/2024/05/INCOME-TAX-RETURNS-3.jpg") no-repeat center center/cover;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5%;
    }

    /* Dark Overlay */
    .hero-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
    }

    /* Content */
    .hero-content {
        position: relative;
        max-width: 650px;
        color: #fff;
        padding: 20px;
        z-index: 2;
        text-align: center;
    }

    /* Title */
    .hero-title {
        font-size: clamp(26px, 4vw, 42px);
        font-weight: bold;
        line-height: 1.3;
        margin-bottom: 15px;
        color: #ffffff;
    }

    .hero-title span {
        color: #4cb9ff;
    }

    /* Text */
    .hero-text {
        font-size: clamp(14px, 2vw, 18px);
        line-height: 1.6;
        margin-bottom: 20px;
    }

    /* Button */
    .btn-primary {
        display: inline-block;
        background: #007bff;
        color: #fff;
        padding: 12px 24px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
        transition: background 0.3s ease-in-out, transform 0.2s ease-in-out;
    }

    .btn-primary:hover {
        background: #0056b3;
        transform: scale(1.05);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .hero-section {
            min-height: 80vh;
            padding: 8%;
        }

        .hero-content {
            max-width: 85%;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            min-height: 70vh;
            padding: 10%;
        }

        .hero-content {
            max-width: 90%;
        }

        .hero-title {
            font-size: 26px;
        }

        .hero-text {
            font-size: 16px;
        }

        .btn-primary {
            font-size: 14px;
            padding: 10px 20px;
        }
    }

    @media (max-width: 480px) {
        .hero-section {
            padding: 15%;
            min-height: 60vh;
        }

        .hero-title {
            font-size: 22px;
        }

        .hero-text {
            font-size: 14px;
        }

        .btn-primary {
            font-size: 14px;
            padding: 8px 18px;
        }
    }
</style>
