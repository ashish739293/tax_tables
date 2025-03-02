

<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Select Your Income Source</span></h2>
    </div>
    <p class="text-dark fs-5 text-center">
    Explore Your Earning Potential: Discover Diverse Income Sources for Financial Growth! 
    </p>
</div>

<div class="container text-center">
    

    <div class="row mt-4" id="income-cards">
        <!-- Cards will be inserted here dynamically -->
    </div>
</div>


<style>
   
    /* Card Container */
    .income-cards-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    /* Styling for all cards */
    .card {
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        color: white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        width: 320px; /* Fixed width */
        height: 450px; /* Fixed height */
        display: flex;
        flex-direction: column;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    /* Card image styling */
    .card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }

    /* Card Body */
    .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 20px;
        text-align: center;
    }

    /* Card title styling */
    .card-title {
        font-size: 1.4rem;
        font-weight: 600;
        color: #f8c146; /* Gold color for premium feel */
    }

    /* Fee text */
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

<!-- Container for the cards -->
<div class="container">
    <div id="income-cards" class="row income-cards-container">
        <!-- Cards will be inserted dynamically -->
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetch('/api/income-sources')
            .then(response => response.json())
            .then(data => {
                let cardContainer = document.getElementById("income-cards");
                cardContainer.innerHTML = ""; // Clear previous data
                
                data.forEach(source => {
                    cardContainer.innerHTML += `
                        <div class="col-md-4">
                            <div class="card">
                                <img src="https://taxtablet.in/wp-content/uploads/2024/05/2-1024x576.png" class="card-img-top" alt="Income Source">
                                <div class="card-body">
                                    <h5 class="card-title">${source.title}</h5>
                                    <p class="text-muted">Fees – Rs ${source.fees}/-</p>
                                    <a href="#" class="btn btn-primary w-100">FILE NOW →</a>
                                </div>
                            </div>
                        </div>
                    `;
                });
            })
            .catch(error => console.error('Error fetching income sources:', error));
    });
</script>
