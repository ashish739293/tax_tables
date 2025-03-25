<style>
    /* Floating Animation */
    @keyframes floatImage {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-5px); }
        100% { transform: translateY(0px); }
    }
    
    /* Entrance Animations */
    @keyframes fadeInLeft {
        from { opacity: 0; transform: translateX(-50px); }
        to { opacity: 1; transform: translateX(0); }
    }
    
    @keyframes fadeInRight {
        from { opacity: 0; transform: translateX(50px); }
        to { opacity: 1; transform: translateX(0); }
    }

    /* Challenge Card Styling */
    .challenge-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #f9f9f9;
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        opacity: 0; /* Start hidden */
    }

    /* Reveal animation */
    .challenge-card.show {
        opacity: 1;
    }

    /* Left Animation */
    .challenge-card:nth-child(odd) {
        animation: fadeInLeft 1s ease-out forwards;
    }

    /* Right Animation */
    .challenge-card:nth-child(even) {
        animation: fadeInRight 1s ease-out forwards;
    }

    /* Hover Effect */
    .challenge-card:hover {
        transform: scale(1.03);
        box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.15);
    }

    /* Text Section */
    .challenge-content {
        flex: 1;
        padding: 1.5rem;
    }

    .challenge-content h2 {
        color: #2d2c83;
        font-size: 1.8rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .challenge-content p {
        color: #555;
        font-size: 1.1rem;
        line-height: 1.6;
    }

    /* Image Section */
    .challenge-image {
        flex: 1;
        text-align: center;
    }

    .challenge-image img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        animation: floatImage 3s ease-in-out infinite;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .challenge-card {
            flex-direction: column;
            text-align: center;
        }
        .challenge-image {
            margin-top: 1rem;
        }
    }
</style>

<section class="py-16 bg-white mt-5">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-indigo-900" style="color: #2d2c83; font-weight: bold;" >Challenges We Tackle for You</h1>
            <p class="text-gray-700 mt-3 text-lg mb-5">
                We make your accounting complexities easier to understand while providing financial clarity!
            </p>
        </div>

        @php
            $challenges = [
                [
                    'title' => 'Overcome Inaccuracy in Financial Management',
                    'description' => 'From daily transactions to complex reconciliations, we ensure financial data is accurate and transparent. Our meticulous approach minimizes errors and provides actionable insights for better business decisions.',
                    'image' => 'https://www.whizconsulting.net/in/wp-content/uploads/2025/01/account_pay.webp',
                    'alt' => 'Financial Reporting'
                ],
                [
                    'title' => 'Lead the Way with Best Accounting Practices',
                    'description' => 'Our virtual accountants stay updated with the latest industry trends to ensure your financial processes are accurate and efficient. We optimize your accounting operations for improved performance and accurate reporting.',
                    'image' => 'https://www.whizconsulting.net/in/wp-content/uploads/2025/01/account_reco.webp',
                    'alt' => 'Accounts Payable'
                ],
                [
                    'title' => 'Effortless Resource Allocation',
                    'description' => 'Managing financial records in-house can drain valuable time and resources. Outsourcing to our virtual accountants frees up your time and team to focus on strategic growth.',
                    'image' => 'https://www.whizconsulting.net/in/wp-content/uploads/2025/01/cash_forecasting.webp',
                    'alt' => 'Accounts Receivable'
                ]
            ];
        @endphp

        @foreach($challenges as $index => $challenge)
            <div class="challenge-card @if($index % 2 !== 0) flex-row-reverse @endif">
                <div class="challenge-content">
                    <h2>{{ $challenge['title'] }}</h2>
                    <p>{{ $challenge['description'] }}</p>
                </div>
                <div class="challenge-image">
                    <img src="{{ $challenge['image'] }}" alt="{{ $challenge['alt'] }}">
                </div>
            </div>
        @endforeach
    </div>
</section>

<script>
    // JavaScript to make elements appear on scroll
    document.addEventListener("DOMContentLoaded", function () {
        const challengeCards = document.querySelectorAll(".challenge-card");

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                }
            });
        }, { threshold: 0.8 });

        challengeCards.forEach(card => observer.observe(card));
    });
</script>
