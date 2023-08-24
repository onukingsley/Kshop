<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                 <span>Trending</span>
            </h2>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="/productdetail/{{$product->id}}" class="option1">
                               {{-- {{$product->category->category_name}}--}}
                                view more
                            </a>

                                <form action="/product/{{$product->id}}/addtocart" method="post">
                                    @csrf
                                <div class="d-flex align-content-center">
                                    <input  class="w-75 m-auto " name="quantity" style="border-radius: 5%" min="1" step="1" type="number">
                                    <button class="option2 p2 " type="submit">Add to cart</button>
                                </div>
                                </form>

                        </div>
                    </div>
                    <div class="img-box">
                        <img src="{{asset("storage/".$product->image)}}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{$product->title}}
                        </h5>
                        @if($product->discount_price != null)
                            <h6 style="text-decoration: line-through" class="text-danger">
                                ${{$product->price}}
                            </h6>
                            <h6>
                                ${{$product->discount_price}}
                            </h6>
                        @else
                            <h6>
                                ${{$product->price}}
                            </h6>
                        @endif


                    </div>
                </div>
            </div>
            @endforeach
        </div>
       {{-- <div> {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}</div>--}}
        <div> {{$products->links('pagination::bootstrap-5')}}</div>
        <div class="btn-box">
            <a href="/products/viewall">
                View All products
            </a>
        </div>
    </div>
</section>
<!-- end product section -->
