@extends('front.parent')
@section('content')
    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            @foreach ($data as $item)
                <div class="slider-item js-fullheight">
                    <div class="overlay"></div>
                    <div class="container-fluid p-0">
                        <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end"
                            data-scrollax-parent="true">
                            <img class="one-third order-md-last img-fluid" src="{{ asset('storage/' . $item->image) }}"
                                alt="">
                            <div class="one-forth d-flex align-items-center ftco-animate"
                                data-scrollax=" properties: { translateY: '70%' }">
                                <div class="text">
                                    <span class="subheading">#New Arrival</span>
                                    <div class="horizontal">
                                        <h1 class="mb-4 mt-3">{{ $item->name }}</h1>
                                        <p class="mb-4">{{ $item->description }}.</p>

                                        <p><a href="{{ route('shop') }}" class="btn-custom">Discover Now</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <span class="flaticon-bag"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Free Shipping</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Support Customer</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <span class="flaticon-payment-security"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Secure Payments</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">New Shoes Arrival</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
                        <div class="product d-flex flex-column">
                            <a href="{{ route('single_product', $product->id) }}"><img class="img-fluid"
                                    style="width: 255px;height: 300px;" src="{{ asset('storage/' . $product->image) }}"
                                    alt="Colorlib Template">
                                @if ($product->sale_percent)
                                    <span class="status">-{{ $product->sale_percent }}%</span>
                                    <div class="overlay"></div>
                                @endif
                            </a>
                            <div class="text py-3 pb-4 px-3">
                                <div class="d-flex">
                                    <div class="cat">
                                        <span>Lifestyle</span>
                                    </div>
                                    <div class="rating">
                                        <p class="text-right mb-0">
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        </p>
                                    </div>
                                </div>
                                <h3><a href="{{ route('single_product', $product->id) }}">{{ $product->name }}</a></h3>
                                <div class="pricing">
                                    <p class="price"><span class="mr-2 price-dc">${{ $product->compare_price }}</span><span
                                            class="price-sale">${{ $product->price }}</span></p>
                                </div>
                                <p class="bottom-area d-flex px-3">
                                    <a href="{{route('add-to-cart', $product->id)}}}" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                                    <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div style="margin-left: 492px">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>

    <br><br>
    <div class="col-md-12 heading-section text-center ftco-animate">
        <h2 class="mb-4" style="font-family: 'Dancing Script' ; font-weight: bolder;">Minishop Store</h2>
    </div>
    <br><br>
    <section class="ftco-section ftco-deal bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="cms/images/prod-1.png" class="img-fluid" alt="">
                </div>
                <div class="col-md-6">
                    <div class="heading-section heading-section-white">
                        <span class="subheading">Deal of the month</span>
                        <h2 class="mb-3">Deal of the month</h2>
                    </div>
                    <div id="timer" class="d-flex mb-4">
                        <div class="time" id="days"></div>
                        <div class="time pl-4" id="hours"></div>
                        <div class="time pl-4" id="minutes"></div>
                        <div class="time pl-4" id="seconds"></div>
                    </div>
                    <div class="text-deal">
                        <h2><a href="#">Nike Free RN 2019 iD</a></h2>
                        <p class="price"><span class="mr-2 price-dc">$120.00</span><span
                                class="price-sale">$80.00</span></p>
                        <ul class="thumb-deal d-flex mt-4">
                            <li class="img" style="background-image: url(images/product-6.png);"></li>
                            <li class="img" style="background-image: url(images/product-2.png);"></li>
                            <li class="img" style="background-image: url(images/product-4.png);"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="services-flow">
                        <div class="services-2 p-4 d-flex ftco-animate">
                            <div class="icon">
                                <span class="flaticon-bag"></span>
                            </div>
                            <div class="text">
                                <h3>Free Shipping</h3>
                                <p class="mb-0">Separated they live in. A small river named Duden flows</p>
                            </div>
                        </div>
                        <div class="services-2 p-4 d-flex ftco-animate">
                            <div class="icon">
                                <span class="flaticon-heart-box"></span>
                            </div>
                            <div class="text">
                                <h3>Valuable Gifts</h3>
                                <p class="mb-0">Separated they live in. A small river named Duden flows</p>
                            </div>
                        </div>
                        <div class="services-2 p-4 d-flex ftco-animate">
                            <div class="icon">
                                <span class="flaticon-payment-security"></span>
                            </div>
                            <div class="text">
                                <h3>All Day Support</h3>
                                <p class="mb-0">Separated they live in. A small river named Duden flows</p>
                            </div>
                        </div>
                        <div class="services-2 p-4 d-flex ftco-animate">
                            <div class="icon">
                                <span class="flaticon-customer-service"></span>
                            </div>
                            <div class="text">
                                <h3>All Day Support</h3>
                                <p class="mb-0">Separated they live in. A small river named Duden flows</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="heading-section ftco-animate mb-5">
                        <h2 class="mb-4">Our satisfied customer says</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                            live the blind texts. Separated they live in</p>
                    </div>
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Marketing Manager</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="user-img mb-4" style="background-image: url(images/person_2.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Interface Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="user-img mb-4" style="background-image: url(images/person_3.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">UI Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Web Developer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">System Analyst</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
