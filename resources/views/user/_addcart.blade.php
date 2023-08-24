<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="/"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="/viewall">view All</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Product Page v.1</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">{{$product->title}}</h1>
        </div>
    </div>
</div>
<div class="container">
    <!-- Gallery + details-->
    <div class="bg-light shadow-lg rounded-3 px-4 py-3 mb-5">
        <div class="px-lg-3">
            <div class="row">
                <!-- Product gallery-->
                <div class="col-lg-7 pe-lg-0 pt-lg-4">
                    <div class="product-gallery">
                        <div class="product-gallery-preview order-sm-2">
                            <div class="product-gallery-preview-item active" id="first"><img class="image-zoom" src="{{asset('user/img/shop/single/gallery/01.jpg')}}" data-zoom="img/shop/single/gallery/01.jpg" alt="Product image">
                                <div class="image-zoom-pane"></div>
                            </div>
                            <div class="product-gallery-preview-item" id="second"><img class="image-zoom" src="{{asset('user/img/shop/single/gallery/02.jpg')}}" data-zoom="img/shop/single/gallery/02.jpg" alt="Product image">
                                <div class="image-zoom-pane"></div>
                            </div>
                            <div class="product-gallery-preview-item" id="third"><img class="image-zoom" src="{{asset('user/img/shop/single/gallery/03.jpg')}}" data-zoom="img/shop/single/gallery/03.jpg" alt="Product image">
                                <div class="image-zoom-pane"></div>
                            </div>
                            <div class="product-gallery-preview-item" id="fourth"><img class="image-zoom" src="{{asset('user/img/shop/single/gallery/04.jpg')}}" data-zoom="img/shop/single/gallery/04.jpg" alt="Product image">
                                <div class="image-zoom-pane"></div>
                            </div>
                        </div>
                        <div class="product-gallery-thumblist order-sm-1"><a class="product-gallery-thumblist-item active" href="#first"><img src="{{asset('user/img/shop/single/gallery/th01.jpg')}}" alt="Product thumb"></a><a class="product-gallery-thumblist-item" href="#second"><img src="{{asset('user/img/shop/single/gallery/th02.jpg')}}" alt="Product thumb"></a><a class="product-gallery-thumblist-item" href="#third"><img src="{{asset('user/img/shop/single/gallery/th03.jpg')}}" alt="Product thumb"></a><a class="product-gallery-thumblist-item" href="#fourth"><img src="{{asset('user/img/shop/single/gallery/th04.jpg')}}" alt="Product thumb"></a><a class="product-gallery-thumblist-item video-item" href="https://www.youtube.com/watch?v=1vrXpMLLK14">
                                <div class="product-gallery-thumblist-item-text"><i class="ci-video"></i>Video</div></a></div>
                    </div>
                </div>
                <!-- Product details-->
                <div class="col-lg-5 pt-4 pt-lg-0">
                    <div class="product-details ms-auto pb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2"><a href="#reviews" data-scroll>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                                </div><span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">74 Reviews</span></a>
                            <button class="btn-wishlist me-0 me-lg-n3" type="button" data-bs-toggle="tooltip" title="Add to wishlist"><i class="ci-heart"></i></button>
                        </div>
                        @if($product->discount_price == null)
                            <div class="mb-3"><span class="h3 fw-normal text-accent me-1">{{$product->price}}</span>
                                <span class="badge bg-danger badge-shadow align-middle mt-n2">Sale</span>
                            </div>
                        @else
                            <div class="mb-3"><span class="h3 fw-normal text-accent me-1">{{$product->discount_price}}</span>
                                <del class="text-muted fs-lg me-3">{{$product->price}}</del><span class="badge bg-danger badge-shadow align-middle mt-n2">Sale</span>
                                <span>{{100-round($product->discount_price/$product->price * 100)}}% off</span></div>
                            @endif


                        <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Color:</span><span class="text-muted" id="colorOption">Red/Dark blue/White</span></div>
                        <div class="position-relative me-n4 mb-3">
                            <div class="form-check form-option form-check-inline mb-2">
                                <input class="form-check-input" type="radio" name="color" id="color1" data-bs-label="colorOption" value="Red/Dark blue/White" checked>
                                <label class="form-option-label rounded-circle" for="color1"><span class="form-option-color rounded-circle" style="background-image: url({{asset('user/img/shop/single/color-opt-1.png')}})"></span></label>
                            </div>
                            <div class="form-check form-option form-check-inline mb-2">
                                <input class="form-check-input" type="radio" name="color" id="color2" data-bs-label="colorOption" value="Beige/White/Dark grey">
                                <label class="form-option-label rounded-circle" for="color2"><span class="form-option-color rounded-circle" style="background-image: url({{asset('user/img/shop/single/color-opt-2.png')}})"></span></label>
                            </div>
                            <div class="form-check form-option form-check-inline mb-2">
                                <input class="form-check-input" type="radio" name="color" id="color3" data-bs-label="colorOption" value="Dark grey/White/Orange">
                                <label class="form-option-label rounded-circle" for="color3"><span class="form-option-color rounded-circle" style="background-image: url({{asset('user/img/shop/single/color-opt-3.png')}})"></span></label>
                            </div>
                            <div class="product-badge product-available mt-n1"><i class="ci-security-check"></i>Product available</div>
                        </div>
                        <form class="mb-grid-gutter" action="/product/{{$product->id}}/addtocart" method="post">
                            @csrf
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center pb-1">
                                    <label class="form-label" for="product-size">Size:</label><a class="nav-link-style fs-sm" href="#size-chart" data-bs-toggle="modal"><i class="ci-ruler lead align-middle me-1 mt-n1"></i>Size guide</a>
                                </div>
                                <select class="form-select" id="product-size">
                                    <option value="">Select size</option>
                                    <option value="xs">XS</option>
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                </select>
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                {{--<select class="form-select me-3" style="width: 5rem;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>--}}
                                <input  class="w-75 m-auto form-control-lg" name="quantity" style="border-radius: 5%; width: 5rem" min="1" step="1" type="number">
                                <button class="btn btn-primary btn-shadow d-block w-75" type="submit"><i class="ci-cart fs-lg me-2"></i>Add to Cart</button>
                            </div>
                        </form>
                        <!-- Product panels-->
                        <div class="accordion mb-4" id="productPanels">
                            <div class="accordion-item">
                                <h3 class="accordion-header"><a class="accordion-button" href="#productInfo" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="productInfo"><i class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product info</a></h3>
                                <div class="accordion-collapse collapse show" id="productInfo" data-bs-parent="#productPanels">
                                    <div class="accordion-body">
                                        <h6 class="fs-sm mb-2">Composition</h6>
                                        <ul class="fs-sm ps-4">
                                            <li>{{$product->description}}</li>

                                        </ul>
                                        <a href="store/{{$product->shop->id}}"> <h6 class="fs-sm mb-2">Store: {{$product->shop->shop_name}}</h6></a>

                                        <ul class="fs-sm ps-4 mb-0">
                                            <li>{{$product->shop->phone_no}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="accordion-item">
                                <h3 class="accordion-header"><a class="accordion-button collapsed" href="#shippingOptions" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="shippingOptions"><i class="ci-delivery text-muted lead align-middle mt-n1 me-2"></i>Shipping options</a></h3>
                                <div class="accordion-collapse collapse" id="shippingOptions" data-bs-parent="#productPanels">
                                    <div class="accordion-body fs-sm">
                                        <div class="d-flex justify-content-between border-bottom pb-2">
                                            <div>
                                                <div class="fw-semibold text-dark">Courier</div>
                                                <div class="fs-sm text-muted">2 - 4 days</div>
                                            </div>
                                            <div>$26.50</div>
                                        </div>
                                        <div class="d-flex justify-content-between border-bottom py-2">
                                            <div>
                                                <div class="fw-semibold text-dark">Local shipping</div>
                                                <div class="fs-sm text-muted">up to one week</div>
                                            </div>
                                            <div>$10.00</div>
                                        </div>
                                        <div class="d-flex justify-content-between border-bottom py-2">
                                            <div>
                                                <div class="fw-semibold text-dark">Flat rate</div>
                                                <div class="fs-sm text-muted">5 - 7 days</div>
                                            </div>
                                            <div>$33.85</div>
                                        </div>
                                        <div class="d-flex justify-content-between border-bottom py-2">
                                            <div>
                                                <div class="fw-semibold text-dark">UPS ground shipping</div>
                                                <div class="fs-sm text-muted">4 - 6 days</div>
                                            </div>
                                            <div>$18.00</div>
                                        </div>
                                        <div class="d-flex justify-content-between pt-2">
                                            <div>
                                                <div class="fw-semibold text-dark">Local pickup from store</div>
                                                <div class="fs-sm text-muted">&mdash;</div>
                                            </div>
                                            <div>$0.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header"><a class="accordion-button collapsed" href="#localStore" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="localStore"><i class="ci-location text-muted fs-lg align-middle mt-n1 me-2"></i>Find in local store</a></h3>
                                <div class="accordion-collapse collapse" id="localStore" data-bs-parent="#productPanels">
                                    <div class="accordion-body">
                                        <select class="form-select">
                                            <option value>Select your country</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="France">France</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Spain">Spain</option>
                                            <option value="UK">United Kingdom</option>
                                            <option value="USA">USA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>--}}
                        </div>
                        <!-- Sharing-->
                        <label class="form-label d-inline-block align-middle my-2 me-3">Share:</label><a class="btn-share btn-twitter me-2 my-2" href="#"><i class="ci-twitter"></i>Twitter</a><a class="btn-share btn-instagram me-2 my-2" href="#"><i class="ci-instagram"></i>Instagram</a><a class="btn-share btn-facebook my-2" href="#"><i class="ci-facebook"></i>Facebook</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
