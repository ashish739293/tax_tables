
<!-- Section Header -->
<div class="container-fluid pt-5 text-center" data-aos="fade-up">
    <h2 class="section-title px-5"><span class="px-2">Our Services</span></h2>
    <p class="text-dark fs-5">
        Explore Your Earning Potential: Discover Diverse Income Sources for Financial Growth! 
    </p>
</div>

<!-- Cards Container -->
<div class="container">
    <div class="row mt-4 mb-5 justify-content-center" id="income-service">
        <!-- Cards will be inserted dynamically -->
    </div>
</div>

<style>
    /* Card Design */
    .card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(15px);
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        color: white;
        width: 100%;
        max-width: 350px;
        height: 480px;
        display: flex;
        flex-direction: column;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
    }

    /* Animated Gradient Hover */
    .card::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(0, 123, 255, 0.2), rgba(255, 255, 255, 0.1));
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .card:hover::before {
        opacity: 1;
    }

    /* Card Image */
    .card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
    }

    .card:hover img {
        transform: scale(1.1);
    }

    /* Card Body */
    .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 20px;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #f8c146;
    }

    .text-muted {
        font-size: 1rem;
        color: #d3d3d3;
        font-weight: 500;
    }

    /* Button Styling */
    .btn-primary {
        background: linear-gradient(135deg, #007BFF, #0056b3);
        border: none;
        padding: 12px;
        border-radius: 25px;
        font-size: 1rem;
        font-weight: bold;
        color: white;
        transition: all 0.3s ease-in-out;
        text-transform: uppercase;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #0056b3, #007BFF);
        transform: scale(1.05);
    }
</style>

<!-- JavaScript to Fetch and Insert Cards Dynamically -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetch('/api/income-sources')
            .then(response => response.json())
            .then(data => {
                let cardContainer = document.getElementById("income-service");
                cardContainer.innerHTML = ""; 

                data.forEach((source, index) => {
                    let delay = index * 150; 
                    let cardHTML = `
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4" data-aos="zoom-in" data-aos-delay="${delay}">
                            <div class="card" data-tilt>
                                <img src="https://taxtablet.in/wp-content/uploads/2024/05/2-1024x576.png" class="card-img-top" alt="Income Source">
                                <div class="card-body">
                                    <h5 class="card-title">${source.title}</h5>
                                    <p class="text-muted">Fees – Rs ${source.fees}/-</p>
                                    <a href="#" class="btn btn-primary w-100">FILE NOW →</a>
                                </div>
                            </div>
                        </div>
                    `;
                    cardContainer.innerHTML += cardHTML;
                });

                AOS.init();
                VanillaTilt.init(document.querySelectorAll(".card"), {
                    max: 10,
                    speed: 400,
                    glare: true,
                    "max-glare": 0.3
                });
            })
            .catch(error => console.error('Error fetching income sources:', error));
    });
</script>
