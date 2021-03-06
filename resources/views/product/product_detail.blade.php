@extends('layouts.app')
@section('title','Product Details')
@section('content')

    <!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container mt-5">
            @include('admin.layout.noti')
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                @foreach(unserialize($product->product_img) as $img)
                                    <div class="item-slick3" data-thumb="{{'/uploads/product/'.$img}}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{'/uploads/product/'.$img}}" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                               href="{{'/uploads/product/'.$img}}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{$product->name}}
                        </h4>
                        <h6 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{$product->title}}
                        </h6>

                        <span class="mtext-106 cl2">
							{{number_format($product->price)}}/-Ks
						</span>
                        <p>
                            @if($product->product_type ==0)
                            <span class="small text-primary">Product Price Type &nbsp;&nbsp;<i class="fa fa-arrow-circle-right text-danger"></i> &nbsp; Retail</span>
                                @else
                                <span class="small text-primary">Product Price Type &nbsp;&nbsp;<i class="fa fa-arrow-circle-right text-danger"></i> &nbsp; Whole Sale</span>
                            @endif
                        </p>
                        <p>
                            @if($product->order_type ==0)
                                <span class="small text-primary">Order Type &nbsp;&nbsp;<i class="fa fa-arrow-circle-right text-danger"></i> &nbsp; Instock </span>
                            @else
                                <span class="small text-primary">Order Type &nbsp;&nbsp;<i class="fa fa-arrow-circle-right text-danger"></i> &nbsp; Pre Order</span>
                            @endif
                        </p>

                        <p class="stext-102 cl3 p-t-23">
                            {{substr($product->description,0,100)}}
                        </p>

                        <!--  -->
                        <div class="p-t-33">
                            <form action="{{route('cart.add')}}" method="post">
                                {{csrf_field()}}
                                @if($product->options != null)
                                    @foreach(unserialize($product->options) as $key=>$value)
                                        @if($value!=null)
                                            <div class="flex-w flex-r-m p-b-10">
                                                <div class="size-203 flex-c-m respon6">
                                                    {{$key}}
                                                </div>

                                                <div class="size-204 respon6-next">
                                                    <div class="rs1-select2 bor8 bg0">
                                                        <select class="js-select2" name="{{$key}}">
                                                            @foreach($value as $item)
                                                                <option value="{{$item}}">{{$item}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="dropDownSelect2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    @endforeach
                                @endif

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                   name="qty" value="1">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>

                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="name" value="{{$product->name}}">
                                        <input type="hidden" name="price" value="{{$product->price}}">

                                        <button type="submit"
                                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                            Add to cart
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!--  -->
                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            <div class="flex-m bor9 p-r-10 m-r-11">
                                <a href="#"
                                   class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                   data-tooltip="Add to Wishlist">
                                    <i class="zmdi zmdi-favorite fa-lg"></i>
                                </a>
                            </div>

                            <a href="{{env('FBPAGE')}}" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                               data-tooltip="Facebook">
                                <i class="fa fa-facebook fa-3x"></i>
                            </a>

                            <a href="{{env('MESSENGER')}}" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                               data-tooltip="Messenger">
                                <i class="fab fa-facebook-messenger fa-3x"></i>
                            </a>

                        </div>
                    </div>
                    </form>
                </div>
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                        </li>

                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional
                                information</a>
                        </li>

                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6">
                                    {{$product->description}}
                                </p>
                            </div>
                        </div>

                        <!-- - -->
                        <div class="tab-pane fade" id="information" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">

                                    <ul class="p-lr-28 p-lr-15-sm">
                                        @if($product->options != null)
                                            @foreach(unserialize($product->options) as $key=>$value)
                                                @if($value!=null)
                                                    <li class="flex-w flex-t p-b-7">
                                                        <span class="h3 text-primary">
                                                            {{$key}}
                                                        </span>
                                                    </li>
                                                    @foreach($value as $item)
                                                        <span class="stext-102 cl6 size-206">
												            {{$item }} ,
											            </span>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif

                                    </ul>


                                </div>
                            </div>
                        </div>

                        <!-- - -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <div class="p-b-30 m-lr-15-sm">
                                        {{--Review Comment By Disqus--}}
                                        @include('layouts.comment_disqus')
                                        {{--Review Comment By Disqus--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
            <span class="stext-107 cl6 p-lr-25">
				<strong class="h5">Product Code =></strong><strong
                        class="text-primary h2"> {{$product->product_id}}</strong>
			</span>

            <span class="stext-107 cl6 p-lr-25">
				<strong class="h5">Categories => </strong> <strong
                        class="text-primary h2"> {{$product->category->name}} </strong>
			</span>
        </div>
    </section>

    <!-- Related Products -->
    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Related Products
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    @foreach($related_products as $product)

                        <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="{{'/uploads/product/'.unserialize($product->product_img)[0]}}"
                                         alt="IMG-PRODUCT">

                                    <a href="{{route('product.details',['id'=>$product->id])}}"
                                       class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="{{route('product.details',['id'=>$product->id])}}"
                                           class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{$product->name}}
                                        </a>

                                        <span class="stext-105 cl3">
										{{number_format($product->price)}}/-Ks
									</span>
                                    </div>

                                    <div class="block2-txt-child2 flex-r p-t-3">
                                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                            <img class="icon-heart1 dis-block trans-04"
                                                 src="{{asset('images/icons/icon-heart-01.png')}}"
                                                 alt="ICON">
                                            <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                 src="{{asset('images/icons/icon-heart-02.png')}}" alt="ICON">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection