@props(['product'])


<div class="col-sm-6 col-md-4 col-lg-4">
    <div class="box">
        <div class="option_container">
            <div class="options">
                <a href="" class="option1">
                    Add To Cart
                </a>
                <a href="" class="option2">
                    Buy Now
                </a>
            </div>
        </div>
        <div class="img-box">
            <img src="images/{{$product->image}}" alt="">
        </div>
        <div class="detail-box">
            <h5>
                {{$product->name}}
            </h5>
            <h6>
                {{$product->price}}
            </h6>
        </div>
    </div>
</div>
