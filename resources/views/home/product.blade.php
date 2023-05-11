<!-- Product Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Our Products</h1>
                    <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor
                        duo.</p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    @foreach ($categories as $item)
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill"
                                href="#{{ str_replace(' ', '-', strtolower($item->name)) }}">{{ $item->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="tab-content">
            @foreach ($categories as $category)
                <div id="{{ str_replace(' ', '-', strtolower($category->name)) }}"
                    class="tab-pane fade show p-0 active">
                    @foreach ($category->fkProduct as $product)
                        <div class="row g-4">
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="{{ asset('storage/' . $product->photo) }}"
                                            alt="">
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="">{{ $product->name }}</a>
                                        <span class="text-primary me-1">Rp {{ number_format($product->price) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
            <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
        </div>
    </div>
</div>
<!-- Product End -->
