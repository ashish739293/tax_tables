<section class="stats_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="stats">
                    <li>
                        <div class="stat_icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat_label"><span class="count">100</span>+</div>
                        <p>Clients Served</p>
                    </li>
                    <li>
                        <div class="stat_icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <div class="stat_label"><span class="count">5000</span>+</div>
                        <p>Invoices Processed Per Month</p>
                    </li>
                    <li>
                        <div class="stat_icon">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <div class="stat_label"><span class="count">200</span>+</div>
                        <p>Completed Projects</p>
                    </li>
                    <li>
                        <div class="stat_icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <div class="stat_label"><span class="count">15000</span>+</div>
                        <p>Reconciliation in a Month</p>
                    </li>
                    <li>
                        <div class="stat_icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat_label"><span class="count">250</span>+</div>
                        <p>Completed Projects</p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row align_center">
            <div class="col-lg-6 order_2">
                <div class="text_details">
                    <h1 style="color: #2d2c83; font-weight: bold;">Hire Expert Virtual Accountants for Your Business</h1>
                    <p>
                    Our virtual accounting services are more than just numbers; we provide financial clarity and confidence to help your business thrive. From managing day-to-day transactions to delivering real-time insights and accurate financial reports, we make sure your finances are always on track. Whether it’s optimizing cash flow, handling tax preparation, or strategic financial planning, we’ve got it all covered. Partner with us to take control of your finances and focus on growing your business further.
                    </p>
                    <div class="cta_link">
                        <a class="mainbtn" href="">
                            <span>Contact Us</span>
                            <svg height="24px" viewBox="0 -960 960 960" width="24px">
                                <path d="m256-240-56-56 384-384H240v-80h480v480h-80v-344L256-240Z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 order_1">
                <figure>
                    <video id="bg-video" autoplay loop muted playsinline preload="auto">
                        <source src="/video/about-video.mp4" height="300" width="400" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <button class="play-button" id="play-btn">
                        <i class="bi bi-play-fill"></i>
                    </button>
                </figure>
            </div>
        </div>
    </div>
</section>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var video = document.getElementById("bg-video");
        var playButton = document.getElementById("play-btn");
        var isPlaying = false;

        playButton.addEventListener("click", function () {
            video.loop = false;
            video.muted = false;
            video.controls = true;
            if (video.paused) {
                video.play();
            }
            isPlaying = true;
            playButton.style.display = "none";
        });

        let scrollTimeout;
        window.addEventListener("scroll", function () {
            if (isPlaying && !video.paused) {
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(() => {
                    video.pause();
                    isPlaying = false;
                    playButton.style.display = "block";
                }, 200);
            }
        });

        document.addEventListener("visibilitychange", function () {
            if (document.hidden && isPlaying) {
                video.pause();
                isPlaying = false;
                playButton.style.display = "block";
            }
        });
    });
</script>

<style>
    .stats_section {
    background: #fff;
    padding: 50px 15px;
}

.stats {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    text-align: center;
    padding: 20px;
}

.stats li {
    list-style: none;
    padding: 15px;
    font-size: 18px;
    color: #333;
    width: 200px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: 0.3s;
    margin-bottom: 20px;
}

.stats li:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
}

.stat_icon {
    margin-bottom: 10px;
}

.stat_icon i {
    font-size: 36px;
    color: #05d69f;
}

.stat_label {
    font-size: 24px;
    font-weight: bold;
    color: #05d69f;
    margin-top: 10px;
}

.stats_section figure {
    position: relative;
}

.play-button {
    position: absolute;
    text-align: center;
    z-index: 2;
    background: rgb(5 214 159 / 84%);
    color: #fff;
    border: none;
    width: 90px;
    height: 60px;
    padding: 0;
    font-size: 18px;
    left: 50%;
    margin-left: -45px;
    top: 50%;
    margin-top: -30px;
    cursor: pointer;
    border-radius: 5px;
    transition: 0.3s;
}

.play-button i {
    font-size: 36px;
    line-height: 60px;
}

.play-button:hover {
    background: #2e277bcf;
}

#bg-video {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 10px;
}

@media (max-width: 1024px) {
    .stats li {
        width: 45%;
    }
}

@media (max-width: 768px) {
    .stats {
        flex-direction: column;
        align-items: center;
    }

    .stats li {
        width: 100%;
        text-align: center;
    }

    .play-button {
        width: 60px;
        height: 40px;
        margin-left: -30px;
        margin-top: -20px;
    }

    .play-button i {
        font-size: 24px;
        line-height: 40px;
    }

    #bg-video {
        height: 200px;
    }
}

@media (max-width: 480px) {
    .play-button {
        width: 50px;
        height: 35px;
        margin-left: -25px;
        margin-top: -17px;
    }

    .play-button i {
        font-size: 20px;
        line-height: 35px;
    }

    #bg-video {
        height: 180px;
    }
}

</style>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    var video = document.getElementById("bg-video");
    var playButton = document.getElementById("play-btn");
    var isPlaying = false;

    playButton.addEventListener("click", function () {
        video.loop = false;
        video.muted = false;
        video.controls = true;
        if (video.paused) {
            video.play();
        }
        isPlaying = true;
        playButton.style.display = "none";
    });

    let scrollTimeout;
    window.addEventListener("scroll", function () {
        if (isPlaying && !video.paused) {
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(() => {
                video.pause();
                isPlaying = false;
                playButton.style.display = "block";
            }, 200);
        }
    });

    document.addEventListener("visibilitychange", function () {
        if (document.hidden && isPlaying) {
            video.pause();
            isPlaying = false;
            playButton.style.display = "block";
        }
    });

    // Counter Up effect
    $(document).ready(function () {
        $('.count').counterUp({
            delay: 10,
            time: 1000
        });
    });
});

</script>
