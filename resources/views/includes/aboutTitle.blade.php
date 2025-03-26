<style>
    .about-title-section {
        position: relative;
        background: url('/image/about-banner-1.jpg') no-repeat center center;
        background-size: cover;
        min-height: 350px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 50px 20px;
        color: white;
        flex-direction: column;
        margin-bottom: 60px;
    }

    .about-title-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
    }

    .about-title-content {
        position: relative;
        max-width: 800px;
        z-index: 2;
        text-align: center;
        padding: 20px;
    }

    .about-title-content h1 {
        font-size: 42px;
        font-weight: bold;
        color: #05d69f; /* Green title */
        margin-bottom: 10px;
    }

    .about-title-content p {
        font-size: 20px;
        margin-bottom: 15px;
        line-height: 1.5;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .about-title-section {
            padding: 40px 15px;
            min-height: 300px;
        }

        .about-title-content h1 {
            font-size: 32px;
        }

        .about-title-content p {
            font-size: 16px;
        }
    }

    @media (max-width: 480px) {
        .about-title-section {
            padding: 30px 10px;
            min-height: 250px;
        }

        .about-title-content h1 {
            font-size: 28px;
        }

        .about-title-content p {
            font-size: 14px;
        }
    }
</style>

<div class="about-title-section">
    <div class="about-title-overlay"></div>
    <div class="about-title-content">
        <h1>About Us</h1>
        <p>Discover our journey, mission, and values that drive us forward.</p>
    </div>
</div>
