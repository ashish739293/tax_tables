<!-- Section Header for Services Page -->
<div class="container-fluid pt-5 text-center">
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
.service-container{
    position: relative;
    background-size: cover;
    min-height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: left;
    padding: 50px;
    color: white;
}

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
background-color: #05D697;
}

/* Service Card Body */
.services-card .service-card-body {
padding: 20px;
flex-grow: 1;
}

.services-card .service-card-title {
font-size: 1.25rem;
font-weight: bold;
color: #3181f6;
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
background: #05d69f;
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
background:rgb(4, 221, 131);
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

/* Initial State (Hidden) */
.services-card {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

/* Visible State */
.services-card.show {
    opacity: 1;
    transform: translateY(0);
}

</style>

<script>
window.onload = function () {
    let serviceCardContainer = document.getElementById("services-cards");

    if (!serviceCardContainer) {
        console.error("Error: Element with ID 'services-cards' not found!");
        return;
    }

    fetch('/api/services') // Fetching services from backend
    .then(response => response.json())
    .then(data => { 
        serviceCardContainer.innerHTML = ""; 

        data.forEach((service) => {
            let featuresArray = [];
            try {
                featuresArray = service.features ? JSON.parse(service.features) : [];
            } catch (error) {
                console.error("Error parsing features:", error);
            }

            let keyPointsHTML = featuresArray.length
                ? `<ul class="service-key-points">${featuresArray.map(feature => `<li><i class="fas fa-check-circle text-success me-2"></i> ${feature}</li>`).join("")}</ul>` 
                : "";

            let cardHTML = `
            <div class="services-card col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="service-card">
                    <div class="service-image-container">
                        <img src="/storage/${service.image}" class="service-img-top" alt="${service.name}">
                        <div class="service-overlay">
                            <p>Starts from @</p>
                            <p class="service-price">₹ ${service.price}/-</p>
                        </div>
                    </div>
                    <div class="service-card-body">
                        <p class="service-card-title">${service.name}</p>
                        ${keyPointsHTML}
                        <button onclick="OpenModal(${service.price})" type="button" class="service-overlay-btn">
                            APPLY NOW →
                        </button>
                    </div>
                </div>
            </div>
            `;
            serviceCardContainer.innerHTML += cardHTML;
        });

        // After adding elements, trigger scroll animation
        animateOnScroll();
    })
    .catch(error => console.error('Error fetching services:', error));
};

// Function to add animation on scroll
function animateOnScroll() {
    const cards = document.querySelectorAll(".services-card");
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
                observer.unobserve(entry.target); // Stop observing once shown
            }
        });
    }, { threshold: 0.2 });

    cards.forEach(card => observer.observe(card));
}

</script>


