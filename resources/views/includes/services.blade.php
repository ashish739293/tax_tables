<!-- Section Header for Services Page -->
<div class="container-fluid pt-5 text-center" data-aos="fade-up">
    <h2 class="services-title px-5"><span class="px-2">Select Your Service</span></h2>
    <p class="services-description text-dark fs-5">
        Explore a Range of Services: Unlock the Best Opportunities for Personal Growth and Success!
    </p>
</div>

<!-- Services Cards Container -->
<div class="services-cards-container">
    <div class="row m-5 justify-content-center" id="services-cards">
        <!-- Cards will be inserted dynamically -->
    </div>
</div>

@include('includes.modal_form')

<style>
    /* Scoped Service Card Styles */
    .services-card .service-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    /* Hover Effect for Service Card */
    .services-card .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    /* Image Container */
    .services-card .service-image-container {
        position: relative;
        width: 98%;
        height: 220px;
        overflow: hidden;
    }

    .services-card .service-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
    }

    /* Overlay for Blur Effect */
    .services-card .service-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        backdrop-filter: blur(5px);
        transition: background 0.3s ease, backdrop-filter 0.3s ease;
    }

    .services-card .service-card:hover .service-img-top {
        transform: scale(1.1);
    }

    .services-card .service-overlay:hover {
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(8px);
    }

    /* Service Price Text */
    .services-card .service-price {
        font-size: 1.5rem;
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 5px;
        background-color: #ff8800;
    }

    /* Service Card Body */
    .services-card .service-card-body {
        padding: 20px;
        flex-grow: 1;
    }

    .services-card .service-card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: rgb(21, 68, 221);
        margin-bottom: 15px;
    }

    /* Key Points List */
    .services-card .service-key-points {
        list-style: none;
        padding: 0;
        margin-bottom: 20px;
    }

    .services-card .service-key-points li {
        font-size: 1rem;
        color: #333;
        margin-bottom: 5px;
    }

    /* Button */
    .services-card .service-overlay-btn {
        background: #007bff;
        border: none;
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 14px;
        font-weight: bold;
        color: white;
        text-transform: uppercase;
        text-decoration: none;
        letter-spacing: 1px;
        transition: background-color 0.3s ease;
    }

    .services-card .service-overlay-btn:hover {
        background: #ff8800;
    }

    /* Responsive Layout */
    @media (max-width: 991px) {
        .services-card .col-lg-4 {
            flex: 0 0 48%;
            max-width: 48%;
        }
    }

    @media (max-width: 575px) {
        .services-card .col-lg-4 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

</style>

<script>
    window.onload = function () {
        let serviceCardContainer = document.getElementById("services-cards");

        if (!serviceCardContainer) {
            console.error("Error: Element with ID 'services-cards' not found!");
            return;
        }

        fetch('/api/income-sources')  // Changed API endpoint for services
            .then(response => response.json())
            .then(data => {
                serviceCardContainer.innerHTML = ""; 

                data.forEach((service) => {
                    let optionsArray = [];
                    try {
                        optionsArray = JSON.parse(service.options);
                    } catch (error) {
                        console.error("Error parsing options:", error);
                    }

                    let keyPointsHTML = Array.isArray(optionsArray) && optionsArray.length
                            ? `<ul class="service-key-points">${optionsArray.map(point => `<li><i class="fas fa-check-circle text-success me-2"></i> ${point}</li>`).join("")}</ul>` 
                            : "";

                    let cardHTML = `
                        <div class="services-card col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="service-card">
                                <div class="service-image-container">
                                    <img src="${service.image_url || 'https://taxtablet.in/wp-content/uploads/2024/05/2-1024x576.png'}" class="service-img-top" alt="Service Image">
                                    <div class="service-overlay">
                                        <p>Starts from @</p>
                                        <p class="service-price">₹ ${service.fees}/-</p>
                                    </div>
                                </div>
                                <div class="service-card-body">
                                    <p class="service-card-title">${service.title}</p>
                                    ${keyPointsHTML}
                                    <button onclick="OpenModal()" type="button" class="service-overlay-btn" >
                                        APPLY NOW →
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                    serviceCardContainer.innerHTML += cardHTML;
                });
            })
            .catch(error => console.error('Error fetching services:', error));
    };
</script>
