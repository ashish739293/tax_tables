<!-- Bootstrap & AOS for Animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>

<!-- Section Header -->
<div class="container pt-5 text-center" data-aos="fade-up">
    <h2 class="section-title px-5"><span class="px-2">Unlock Your Earning Potential</span></h2>
    <p class="text-dark fs-5 m-3">
        Explore Your Earning Potential: Discover Diverse Income Sources for Financial Growth! 
    </p>
</div>
@include('includes.modal_form')

<!-- Cards Container -->
<div class="container">
    <div class="row mt-4 mb-5 justify-content-center" id="income-cards">
        <!-- Cards will be inserted dynamically -->
    </div>
</div>

<style>
/* Enhanced Card Design */
.card1 {
    background: linear-gradient(135deg, #ffffff, #f8f9fa);
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    text-align: left;
    height: 500px;
    transition: transform 0.4s ease-in-out, box-shadow 0.3s;
    position: relative;
}

.card1:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
}

/* Image Container */
.image-container {
    position: relative;
    width: 100%;
    height: 220px;
    overflow: hidden;
}

.card-img-top {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease-in-out;
}

.card1:hover .card-img-top {
    transform: scale(1.1);
}

/* Overlay with Animation */
.overlay {
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
    backdrop-filter: blur(3px);
    opacity: 0;
    transform: scale(0.8);
    transition: all 0.4s ease-in-out;
}

.card1:hover .overlay {
    opacity: 1;
    transform: scale(1);
}

/* Price Text */
.price {
    font-size: 1.8rem;
    font-weight: bold;
    background: rgba(255, 255, 255, 0.2);
    padding: 8px 15px;
    border-radius: 10px;
    backdrop-filter: blur(2px);
}

/* Button with Animation */
.overlay-btn {
    margin-top: 10px;
    background: #05d69f;
    border: none;
    padding: 10px 18px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: bold;
    color: white;
    text-transform: uppercase;
    text-decoration: none;
    transition: background 0.3s, transform 0.3s;
}

.overlay-btn:hover {
    background: rgb(4, 221, 131);
    transform: scale(1.1);
}

/* Card Body */
.card-body {
    padding: 20px;
    text-align: center;
}

.card-title1 {
    font-size: 1.2rem;
    font-weight: bold;
    color: #3181f6;
}

.key-points {
    list-style: none;
    padding: 0px;
    text-align: left;
}

.key-points li {
    font-size: 1rem;
    color: #333;
    margin-bottom: 5px;
}
</style>

<!-- JavaScript to Fetch and Insert Cards Dynamically -->
<script>
// Initialize AOS animations
AOS.init();

function loadIncomeSources() {
    let cardContainer = document.getElementById("income-cards");
    if (!cardContainer) {
        console.error("Error: Element with ID 'income-cards' not found!");
        return;
    }
    
    fetch('/api/income-sources')
    .then(response => response.json())
    .then(data => {
        cardContainer.innerHTML = "";
        data.forEach((source) => {
            let optionsArray = [];
            try {
                optionsArray = JSON.parse(source.options);
            } catch (error) {
                console.error("Error parsing options:", error);
            }

            let keyPointsHTML = Array.isArray(optionsArray) && optionsArray.length
                ? `<ul class="key-points">${optionsArray.map(point => `<li><i class="fas fa-check-circle text-success me-2"></i> ${point}</li>`).join("")}</ul>`
                : "";

            let cardHTML = `
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card1" data-aos="fade-up" data-tilt>
                    <div class="image-container">
                        <img src="https://taxtablet.in/wp-content/uploads/2024/05/2-1024x576.png" class="card-img-top" alt="Income Source">
                        <div class="overlay">
                            <p>Starts from @</p>
                            <p class="price">₹ ${source.fees}/-</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-title1">${source.title}</p>
                        ${keyPointsHTML}
                        <button onclick="OpenModal(${source.fees})" type="button" class="btn overlay-btn">APPLY NOW →</button>
                    </div>
                </div>
            </div>`;
            cardContainer.innerHTML += cardHTML;
        });
        VanillaTilt.init(document.querySelectorAll(".card1"), { max: 10, speed: 400 });
    })
    .catch(error => console.error('Error fetching income sources:', error));
}

document.addEventListener("DOMContentLoaded", loadIncomeSources);
</script>
