<!-- Happy Clients Section -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Happy Clients</span></h2>
    </div>
</div>

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

<style>
    .clients-section {
        padding: 60px 20px;
        background: #f8f9fa;
        text-align: center;
    }
    .clients-section h2 {
        font-size: 36px;
        font-weight: bold;
        color: #333;
        margin-bottom: 30px;
    }
    .swiper-container {
        overflow: hidden;
    }
    .swiper-wrapper {
        display: flex;
    }
    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: stretch; /* Ensure equal height */
    }
    .client-card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        height: 100%;
    }
    .client-card h4 {
        font-size: 20px;
        font-weight: bold;
        color: #007bff;
        margin-bottom: 5px;
    }
    .client-card p {
        font-size: 16px;
        color: #555;
        flex-grow: 1;
    }
    .star-rating {
        color: #f8b400;
        font-size: 18px;
        margin-bottom: 10px;
    }
    .swiper-pagination {
        position: relative;
        margin-top: 20px;
    }
</style>

<div class="clients-section">
    <div class="container">
        <div class="swiper-container">
            <div class="swiper-wrapper" id="clients-container">
                <!-- JavaScript will dynamically insert cards here -->
            </div>
            <!-- Pagination & Navigation -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetch("{{ asset('data/clients.json') }}")
            .then(response => response.json())
            .then(clients => {
                let clientsContainer = document.getElementById("clients-container");

                clients.forEach(client => {
                    let stars = "★".repeat(client.rating) + "☆".repeat(5 - client.rating);
                    
                    let card = document.createElement("div");
                    card.classList.add("swiper-slide");
                    card.innerHTML = `
                        <div class="client-card">
                            <div class="star-rating">${stars}</div>
                            <h4>${client.name}</h4>
                            <p><strong>${client.company}</strong></p>
                            <p>${client.description}</p>
                        </div>
                    `;
                    clientsContainer.appendChild(card);
                });

                // Initialize Swiper for default 3 cards per view
                new Swiper(".swiper-container", {
                    slidesPerView: 3,
                    spaceBetween: 20,
                    loop: clients.length > 3, // Enable loop only if more than 3 clients
                    autoplay: clients.length > 3 ? {
                        delay: 3000,
                        disableOnInteraction: false,
                    } : false,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    breakpoints: {
                        1024: { slidesPerView: 3 },
                        768: { slidesPerView: 2 },
                        480: { slidesPerView: 1 }
                    }
                });
            })
            .catch(error => console.error("Error loading client data:", error));
    });
</script>
