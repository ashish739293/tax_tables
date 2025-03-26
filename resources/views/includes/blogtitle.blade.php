<style>
    .blog-title-section {
        position: relative;
        background: url('/image/Blog-banner-1.png') no-repeat center center;
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

    .blog-title-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
    }

    .blog-title-content {
        position: relative;
        max-width: 800px;
        z-index: 2;
        text-align: center;
        padding: 20px;
    }

    .blog-title-content h1 {
        font-size: 42px;
        font-weight: bold;
        color: #05d69f; /* Golden title */
        margin-bottom: 10px;
    }

    .blog-title-content p {
        font-size: 20px;
        margin-bottom: 15px;
        line-height: 1.5;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .blog-title-section {
            padding: 40px 15px;
            min-height: 300px;
        }

        .blog-title-content h1 {
            font-size: 32px;
        }

        .blog-title-content p {
            font-size: 16px;
        }
    }

    @media (max-width: 480px) {
        .blog-title-section {
            padding: 30px 10px;
            min-height: 250px;
        }

        .blog-title-content h1 {
            font-size: 28px;
        }

        .blog-title-content p {
            font-size: 14px;
        }
    }
</style>

<div class="blog-title-section">
    <div class="blog-title-overlay"></div>
    <div class="blog-title-content">
        <h1>Welcome to Our Blog</h1>
        <p>Explore insights, tips, and stories from experts in the industry.</p>
    </div>
</div>
