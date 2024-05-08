@extends('master');
@section('contant')
    <section class="product-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="product-details-wrapper">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="product-images-slider-outer">
                                    <div class="slider slider-content">
                                        @foreach ($product->gallaryimage as $image)
                                        <div>
                                            <img src="{{ asset('backend/image/gallaryimage/'.$image->gallary_image) }}" alt="slider images">
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="slider slider-thumb">
                                        @foreach ( $product->gallaryimage as $image )
                                        <div>
                                            <img src="{{ asset('backend/image/gallaryimage/'.$image->gallary_image) }}" alt="slider images">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <div class="product-details-content">
                                    <h3 class="product-name">
                                        {{ $product->name }}
                                    </h3>
                                    <div class="product-price">
                                        <span>{{ $product->discount_price }} Tk.</span>
                                        <span class="" style="color: #f74b81;">
                                            <del>{{ $product->regular_price }} Tk.</del>
                                        </span>
                                    </div>
                                    {{-- <div class="product-details-select-items-wrap">
                                        
                                    </div>
                                    <div class="product-details-select-items-wrap">
                                       
                                    </div> --}}
                                    <form action="{{url('/product-addtocat/'.$product->id)}}" method="POST">
                                        @csrf
                                        @foreach ($product->size as $size)
                                        <div class="product-details-select-item-outer">
                                            <input type="radio" name="size" value="{{ $size->name }}"
                                                class="category-item-radio">
                                            <label for="size"
                                                class="category-item-label">{{ $size->name }}</label>
                                        </div>
                                    @endforeach
                                        @foreach ($product->color as $color)
                                            <div class="product-details-select-item-outer">
                                                <input type="radio" name="color" id="color"
                                                    value="{{ $color->color }}" class="category-item-radio">
                                                <label for="color" class="category-item-label">
                                                    {{ $color->color }}
                                                </label>
                                            </div>
                                        @endforeach
                                        <div class="purchase-info-outer">
                                            <div class="product-incremnt-decrement-outer" style="display: block">
                                                <a title="Decrement" class="decrement-btn" style="margin-top: -10px;">
                                                    <i class="fas fa-minus" ></i>
                                                </a>
                                                <input type="number" readonly name="qty" placeholder="Qty"
                                                    value="1" min="1" id="qty" style="height: 35px">
                                                <a title="Increment"  class="increment-btn" style="margin-top: -10px;">
                                                    <i class="fas fa-plus" ></i>
                                                </a>
                                            </div>
                                            <div>
                                                <button type="submit" name="action" value="addToCart" id="addToCart"
                                                    class="cart-btn-inner">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    Add to Cart
                                                </button>
                                                <button type="submit" name="action" value="buyNow" id="buyNow"
                                                    class="cart-btn-inner">
                                                    <i class="fas fa-truck"></i>
                                                    Quick Order
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <button type="button" class="product-details-hot-line">
                                        <i class="fas fa-phone-alt"></i>
                                        For Call : 0123456854
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="product-details-info">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-description-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-description" type="button" role="tab"
                                        aria-controls="pills-description" aria-selected="true">
                                        Description
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-review-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-review" type="button" role="tab"
                                        aria-controls="pills-review" aria-selected="true">
                                        Review
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-policy-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-policy" type="button" role="tab"
                                        aria-controls="pills-policy" aria-selected="true">
                                        Product Policy
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                                    aria-labelledby="pills-description-tab">
                                   {{!!$product->long_desc!!}}
                                </div>
                                <div class="tab-pane fade" id="pills-review" role="tabpanel"
                                    aria-labelledby="pills-review-tab">
                                    <div class="review-item-wrapper">
                                        <div class="review-item-left">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="review-item-right">
                                            <h4 class="review-author-name">
                                                Saidul Islam
                                                <span class=" d-inline bg-danger badge-sm badge text-white">Verified</span>
                                            </h4>
                                            <p class="review-item-message">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis minus, ut
                                                unde laudantium accusamus odio nam officia aperiam excepturi quis nesciunt
                                                eveniet eligendi.
                                            </p>
                                            <span class="review-item-rating-stars">
                                                <i class="fa-star fas"></i>
                                                <i class="fa-star fas"></i>
                                                <i class="fa-star fas"></i>
                                                <i class="fa-star fas"></i>
                                                <i class="fa-star fas"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-policy" role="tabpanel"
                                    aria-labelledby="pills-policy-tab">
                                    {{$product->product_policy}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="product-details-sidebar">
                        <div class="product-details-categoris">
                            <h3 class="product-details-title">
                                Category
                            </h3>
                            <a href="#" class="category-item-outer">
                                <img src="{{ asset('frontend/assets/images/product.png') }}" alt="category image">
                                test category
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Boostarap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <!-- Slick Slider CDN -->
    <script src="./assets/plugins/slick-slider/slick.min.js"></script>
    <!-- owl carosal js -->
    <script src="./assets/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- Wow js -->
    <script src="./assets/js/wow.min.js"></script>
    <!-- Main JS -->
    <script src="./assets/js/main.js"></script>

    <script type="text/javascript">
        new WOW().init();
    </script>
    <script>
        var inputfield = document.getElementById('qty');
        var plusbtn = document.querySelector('.increment-btn');
        var minusbutton = document.querySelector('.decrement-btn');
        plusbtn.addEventListener("click", function(){
            if(inputfield.value<5){
                inputfield.value++;


            }
        });
        minusbutton.addEventListener("click", function(){
            if(inputfield.value>1){
                inputfield.value--;


            }
        });

        
           
    </script>
@endpush
