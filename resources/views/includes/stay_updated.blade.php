<div class="hero-section1">
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
    .hero-section1 {
    /* position: relative; */
    width: 100%; /* Prevent overflow */
    max-width: 100%;
    height: 100vh;
    background: url("/image/tax.jpg") no-repeat center center/cover;
    background: rgba(182, 174, 174, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    box-sizing: border-box; /* Ensures padding doesn't add extra width */
    overflow-x: hidden;
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
        max-width: 600px;
        color: rgb(233, 248, 21);
        padding: 20px;
        z-index: 2;
        text-align: center;
    }

    /* Title */
    .hero-title {
        font-size: clamp(28px, 4vw, 40px);
        font-weight: bold;
        line-height: 1.3;
        margin-bottom: 15px;
        color:rgb(136, 123, 123);
    }

    .hero-title span {
        color: #4cb9ff;
    }

    /* Text */
    .hero-text {
        font-size: clamp(16px, 2vw, 18px);
        line-height: 1.6;
        margin-bottom: 20px;
    }

    /* Button */
    .btn-primary {
        display: inline-block;
        background: #007bff;
        color: #fff;
        padding: 12px 24px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
        transition: background 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background: #0056b3;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-section {
            height: auto;
            padding: 10% 5%;
            text-align: center;
        }

        .hero-content {
            max-width: 90%;
        }
    }

    @media (max-width: 480px) {
        .hero-title {
            font-size: 24px;
        }

        .hero-text {
            font-size: 14px;
        }

        .btn-primary {
            padding: 10px 20px;
            font-size: 14px;
        }
    }
</style>
