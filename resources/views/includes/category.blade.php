<style>
    .consultation-section {
        position: relative;
        background: url('/image/consultanct.jpg') no-repeat center center;
        background-size: cover;
        min-height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 50px 20px;
        color: white;
        flex-direction: column;
    }

    .consultation-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
    }

    .consultation-content {
        position: relative;
        max-width: 700px;
        z-index: 2;
        text-align: center;
        padding: 20px;
    }

    .consultation-content h2 {
        font-size: 36px;
        font-weight: bold;
        color: #05d69f; /* Blue heading */
        margin-bottom: 15px;
    }

    .consultation-content p {
        font-size: 18px;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .btn-whatsapp {
        background-color: #05d69f;
        color: white;
        font-size: 18px;
        padding: 14px 28px;
        border-radius: 30px;
        text-decoration: none;
        display: inline-block;
        font-weight: bold;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease-in-out;
    }

    .btn-whatsapp:hover {
        background-color: #1EBE5C;
        transform: scale(1.05);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .consultation-section {
            padding: 40px 15px;
            min-height: 350px;
        }

        .consultation-content h2 {
            font-size: 28px;
        }

        .consultation-content p {
            font-size: 16px;
        }

        .btn-whatsapp {
            font-size: 16px;
            padding: 12px 24px;
        }
    }

    @media (max-width: 480px) {
        .consultation-section {
            padding: 30px 10px;
            min-height: 300px;
        }

        .consultation-content h2 {
            font-size: 24px;
        }

        .consultation-content p {
            font-size: 14px;
        }

        .btn-whatsapp {
            font-size: 14px;
            padding: 10px 20px;
        }
    }
</style>

<div class="consultation-section">
    <div class="consultation-overlay"></div>
    <div class="consultation-content">
        <h2>Get Free Consultation</h2>
        <p>Tap into our tax expertise with a free consultation from our team of experts. 
           Let us guide you through your tax concerns and maximize your returns!</p>
        <a href="https://wa.link/z5h1qf" class="btn-whatsapp">
            WhatsApp Now
        </a>
    </div>
</div>
