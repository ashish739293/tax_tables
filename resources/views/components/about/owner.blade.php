<style>
    .row div h2{
        color:#2d2c83;
        font-weight:bold;
    }
</style>
<section class="category_area py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-4">
                <h2>Leadership</h2>
                <p>We are led by CPAs, Chartered Accountants, and industry experts.</p>
            </div>
            @foreach ([
                ['name' => 'Prateek Kapoor', 'role' => 'Chief of Operations', 'text' => 'A visionary who brings 14 years of expertise in outsourcing, business incorporation, and corporate law, while channeling his competitive spirit into sports and exploring the world.', 'image' => 'https://www.whizconsulting.net/in/wp-content/uploads/2025/01/prateek-1.png'],
                ['name' => 'Swati Kapoor', 'role' => 'Partner', 'text' => 'A passionate CA with 12+ years of expertise combines financial finesse with creative flair: transforming numbers into success stories while sketching ideas and exploring books.', 'image' => 'https://www.whizconsulting.net/in/wp-content/uploads/2025/02/swati.png'],
                ['name' => 'Kavish Singh', 'role' => 'Partner', 'text' => 'A dynamic co-founder with over a decade of expertise in sales and the accounting industry, blends sharp business acumen with a love for reading, music, movies, and cricket.', 'image' => 'https://www.whizconsulting.net/in/wp-content/uploads/2025/02/kavish.png']
            ] as $leader)
            <div class="col-md-4" >
                <div class="card bg-light shadow-sm text-center mb-4" style="min-height: 450px;">
                    <figure class="p-3">
                        <img src="{{ $leader['image'] }}" alt="{{ $leader['name'] }}" class="img-fluid rounded-circle" width="150">
                    </figure>
                    <div class="card-body">
                        <h3>{{ $leader['name'] }} <span class="d-block text-muted">({{ $leader['role'] }})</span></h3>
                        <p>{{ $leader['text'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
