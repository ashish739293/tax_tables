
<style>
/* Banner Section Styles */
/* Banner Section Styles */
/* Banner Section Styles */
.top_banner {
    background: #1223f0;
    padding: 80px 5%; /* Using percentage for better adaptability */
    text-align: center;
}

.top_banner .container {
    max-width: 1200px;
    padding: 0 20px;
}

/* Text Section */
.banner_txt {
    text-align: left;
    padding-right: 20px;
}

.banner_txt h1 {
    font-size: 40px;
    font-weight: bold;
    color: #fff;
    margin-bottom: 20px;
}

.banner_txt h1 span {
    color: #05d69f;
}

.banner_txt p {
    font-size: 20px;
    color: #ddd;
    margin-bottom: 25px;
    line-height: 1.6;
}

.cta_link {
    margin-top: 25px;
}

/* Button Styles */
.mainbtn {
    display: inline-flex;
    align-items: center;
    padding: 14px 24px;
    font-size: 18px;
    font-weight: 700;
    color: #fff;
    background: linear-gradient(135deg, #05d69f, #039a75);
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 4px 10px rgba(5, 214, 159, 0.3);
}

.mainbtn:hover {
    background: linear-gradient(135deg, #039a75, #028b66);
    box-shadow: 0 6px 14px rgba(5, 214, 159, 0.4);
    transform: translateY(-2px);
}

.mainbtn svg {
    margin-left: 12px;
    fill: #fff;
    transition: transform 0.3s ease;
}

.mainbtn:hover svg {
    transform: translateX(4px);
}

/* Image Styling */
figure img {
    max-width: 60%;
    height: auto;
    border-radius: 12px;
    display: block;
    margin: 0 auto;
}

/* Responsive Adjustments */
@media (max-width: 992px) {
    .row {
        display: flex;
        flex-direction: column-reverse; /* Ensures image is on top */
        align-items: center;
        text-align: center;
    }

    .banner_txt {
        text-align: center;
        padding: 0 15px;
    }

    .cta_link {
        display: flex;
        justify-content: center;
    }

    .mainbtn {
        padding: 12px 20px;
        font-size: 16px;
    }
}

/* Small Screens (Tablets & Phones) */
@media (max-width: 768px) {
    .top_banner {
        padding: 60px 5%;
    }

    .banner_txt h1 {
        font-size: 32px;
    }

    .banner_txt p {
        font-size: 18px;
    }

    .mainbtn {
        padding: 12px 18px;
        font-size: 16px;
    }

    figure img {
        max-width: 50%;
    }
}

/* Extra Small Screens (Phones) */
@media (max-width: 480px) {
    .top_banner {
        padding: 50px 5%;
    }

    .banner_txt h1 {
        font-size: 28px;
    }

    .banner_txt p {
        font-size: 16px;
    }

    .mainbtn {
        font-size: 14px;
        padding: 10px 16px;
    }

    figure img {
        max-width: 80%;
    }
}
</style>

<section class="top_banner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order_2">
                <div class="banner_txt srvc_bnr_txt">
                    <h1>Your Reliable <span>Accounting Partner</span></h1>
                    <p>Redefining Excellence in Outsourced Solutions</p>
                    <div class="cta_link">
                        <a class="mainbtn lt" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalLive">
                            <span>Get Help</span> 
                            <svg height="24px" viewBox="0 -960 960 960" width="24px">
                                <path d="m256-240-56-56 384-384H240v-80h480v480h-80v-344L256-240Z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order_1">
                <figure>
                    <img src="https://www.whizconsulting.net/in/wp-content/uploads/2025/02/About-Us-Banner-1.webp" alt="Accounting Illustration">
                </figure>
            </div>
        </div>
    </div>
</section>
