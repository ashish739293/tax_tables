<style>
    #contact_title{
        color: #2d2c83;
        font-weight: bold;
        /* color:#05d69f */
    }
    .contact_text{
        font-size: 20px;
        /* font-weight: bold; */
        /* color:rgb(129, 13, 238) */
    }
</style>
<section class="category_area py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @foreach ([
                    ['title' => 'Mission Statement', 'text' => 'To empower businesses by providing reliable, high-quality, and technology-driven outsourcing services, enabling our clients to focus on growth and success while we deliver excellence, efficiency, and trust in every partnership.', 'image' => 'image/about/first.webp', 'reverse'=>TRUE],
                    ['title' => 'Vision Statement', 'text' => 'To be the most trusted and innovative outsourcing partner, transforming businesses through ethical practices, advanced solutions, and unwavering commitment to professionalism and results.', 'image' => 'image/about/second.webp', 'reverse'=>FALSE],
                    ['title' => 'Values That Guide Us', 'text' => 'At the heart of everything we do is a steadfast commitment to delivering value for our clients. We view technology not just as a tool but as a driver of innovation. By combining advanced solutions with ethical business practices, we empower our clients to achieve their financial goals more efficiently and effectively.', 'image' => 'image/about/third.webp', 'reverse'=>TRUE]
                ] as $item)
                <div class="card bg-light shadow-sm mb-5 p-3">
                    <div class="card-body"><div class="row align-items-center {{ $item['reverse'] ? 'flex-row-reverse' : '' }}">
                            <div class="col-md-7 order-md-2 text-md-star#05d69ft text-left">
                                <h1 id="contact_title">{{ $item['title'] }}</h1>
                                <p class="contact_text">{{ $item['text'] }}</p>
                            </div>
                            <div class="col-md-5 order-md-1 text-center">
                                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="img-fluid rounded">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
