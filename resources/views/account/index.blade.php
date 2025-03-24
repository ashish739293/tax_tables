
<style>
/* Banner Section Styles */
/* Banner Section Styles */
.top_banner {
    background: #1223f0;
    padding: 100px 40px; /* Increased padding for better spacing */
}

.top_banner .container {
    max-width: 1200px;
    padding: 0 20px; /* Added some padding for better responsiveness */
}

.banner_txt {
    text-align: left;
    padding-right: 20px; /* Added spacing between text and image */
}

.banner_txt h1 {
    font-size: 40px; /* Slightly larger for impact */
    font-weight: bold;
    color: #fff;
    margin-bottom: 20px; /* Increased spacing for readability */
}

.banner_txt h1 span {
    color: #05d69f;
}

.banner_txt p {
    font-size: 20px; /* Slightly increased for readability */
    color: #ddd; /* Softer color for better contrast */
    margin-bottom: 25px;
    line-height: 1.6;
}

.cta_link {
    margin-top: 25px; 
}

/* Enhanced Button Styles */
.mainbtn {
    display: inline-flex;
    align-items: center;
    padding: 14px 24px; /* More padding for better appearance */
    font-size: 18px;
    font-weight: 700;
    color: #fff;
    background: linear-gradient(135deg, #05d69f, #039a75); /* Gradient effect */
    border-radius: 8px; /* More rounded corners for a modern look */
    text-decoration: none;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 4px 10px rgba(5, 214, 159, 0.3);
}

.mainbtn:hover {
    background: linear-gradient(135deg, #039a75, #028b66);
    box-shadow: 0 6px 14px rgba(5, 214, 159, 0.4);
    transform: translateY(-2px); /* Slight lift effect */
}

.mainbtn svg {
    margin-left: 12px;
    fill: #fff;
    transition: transform 0.3s ease;
}

.mainbtn:hover svg {
    transform: translateX(4px); /* Slight arrow movement */
}

/* Image Styles */
figure img {
    max-width: 50%;
    height: auto;
    border-radius: 12px;
}

/* Responsive Adjustments */
@media (max-width: 992px) {
    .order_2 {
        order: 1 !important;
    }
    .order_1 {
        order: 2 !important;
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
        padding: 12px 20px; /* Adjusted for mobile */
        font-size: 16px;
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
