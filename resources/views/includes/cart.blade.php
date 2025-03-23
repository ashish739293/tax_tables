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
/* Card Design */
.card1 {
background: white;
border-radius: 10px;
overflow: hidden;
box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
text-align: left;
height: 480px;
transition: all 0.3s ease-in-out;
}

/* Image Container */
.image-container {
position: relative;
width: 100%;
height: 200px; /* Increased Height */
overflow: hidden;
}

.card-img-top {
width: 100%;
height: 100%;
object-fit: cover;
}

/* Overlay for Blur Effect */
.overlay {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background: rgba(241, 234, 234, 0.21);
display: flex;
flex-direction: column;
align-items: center;
justify-content: center;
color: white;
text-align: left;
backdrop-filter: blur(1px); /* Blur Effect */
}

.overlay:hover {
background: rgba(75, 71, 71, 0.57);
backdrop-filter: blur(3px);
}

/* Price Text */
.price {
font-size: 1.5rem;
font-weight: bold;
padding: 5px 10px;
border-radius: 5px;
}

/* Button */
.overlay-btn {
margin-top: 10px;
background: #05d69f;
border: none;
padding: 8px 16px;
border-radius: 15px;
font-size: 12px;
font-weight: bold;
color: white;
text-transform: uppercase;
text-decoration: none;
}

.overlay-btn:hover {
background: #ff8800;
}

/* Card Body */
.card-body {
padding: 20px;
}

.card-title1 {
font-size: 1rem;
font-weight: bold;
color: rgb(21, 68, 221);
}

.key-points {
list-style: none;
padding: 0;
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
<div class="card1" data-aos="fade-up">
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
<button onclick="OpenModal()" type="button" class="btn overlay-btn" >
APPLY NOW →
</button>
</div>
</div>
</div>
`;
cardContainer.innerHTML += cardHTML;
});
})
.catch(error => console.error('Error fetching income sources:', error));
}

// Call the function when needed
document.addEventListener("DOMContentLoaded", loadIncomeSources);

</script>

