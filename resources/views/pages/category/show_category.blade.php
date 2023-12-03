@extends('layout')

<!-- @section('attribute')
  @include('pages.include.attribute')
@endsection -->
<!-- @section('sidebar')
    @include('pages.include.sidebar')
@endsection -->
@section('content_category')
<!-- <section class="product-area shop-sidebar shop section"> -->

<!-- <div class="features_items"> -->
    <!--features_items-->
                       <!-- <div class="fb-share-button" data-href="http://localhost/tutorial_youtube/shopbanhanglaravel" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                       <div class="fb-like" data-href="{{$url_canonical}}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div> -->

                        @foreach($category_name as $key => $name)

                        <h2 class="title text-center" style="padding-top:30px">{{$name->category_name}}</h2>


                        @endforeach

                <div class="container">
                    <div class="row">
                    <!-- <div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">

                        </div>
                    </div> -->
                    @yield('sidebar')
                        <div class="col-lg-9 col-md-8 col-12">
						    <div class="row">
 <div class="col-lg-12 col-md-8 col-12">
    <div class="row">
        <div class="col-md-4">
            <div class="shop-shorter">
                <div class="single-shorter">
                    <label for="amount">Sắp xếp theo</label>
                    <form>
                        @csrf
                        <select name="sort" id="sort" class="form-control">
                            <option value="{{Request::url()}}?sort_by=none">--Lọc theo--</option>
                            <option value="{{Request::url()}}?sort_by=tang_dan">--Giá tăng dần--</option>
                            <option value="{{Request::url()}}?sort_by=giam_dan">--Giá giảm dần--</option>
                            <option value="{{Request::url()}}?sort_by=kytu_az">Lọc theo tên A đến Z</option>
                            <option value="{{Request::url()}}?sort_by=kytu_za">Lọc theo tên Z đến A</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="single-shorter">
            <div class="col-md-6">
                <label for="amount">Lọc giá theo</label>

                <form>
                    <div id="slider-range" ></div>
                    <style type="text/css">
                        .style-range p {
                            display: inline-block; /* Change from float: left to display: inline-block */
                            width: 35%; /* Adjust the width as needed */
                        }
                    </style>
                    <div class="style-range">
                        <p><input type="text" id="amount_start" readonly style="border:0; color:#f6931f; font-weight:bold;"></p>
                        <p><input type="text" id="amount_end" readonly style="border:0; color:#f6931f; font-weight:bold;"></p>
                    </div>
                    <input type="hidden" name="start_price" id="start_price">
                    <input type="hidden" name="end_price" id="end_price">
                    <div class="clearfix"></div>
                </div>
                    <div class="col-md-2">
                        <input id="fiter-price" type="submit" name="filter_price" value="Lọc giá" class="btn btn-sm btn-default">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

                            </div>
                        <!-- <div class="col-sm-3 padding-right"> -->


                            <div class="row">
                                @foreach($category_by_id as $key => $product)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-product">
                                        <form>
                                            @csrf
                                                     <!-- <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                                    <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                                    <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                                    <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                                                    <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                                    <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                                                    <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                                                    <input type="hidden" id="wishlist_productprice{{$product->product_id}}" value="{{ number_format($product->product_price, 0, ',', '.') }}VNĐ">
                                                    <a id="wishlist_producturl{{$product->product_id}}" href="{{ url('chi-tiet/'.$product->product_slug) }}"></a> -->


                                                <input type="hidden" value="{{ $product->product_id }}" class="cart_product_id_{{ $product->product_id }}">
                                                <input type="hidden" id="wishlist_productname{{ $product->product_id }}" value="{{ $product->product_name }}" class="cart_product_name_{{ $product->product_id }}">
                                                <input type="hidden" value="{{ $product->product_quantity }}" class="cart_product_quantity_{{ $product->product_id }}">
                                                <input type="hidden" value="{{ $product->product_image }}" class="cart_product_image_{{ $product->product_id }}">
                                                <input type="hidden" id="wishlist_productprice{{ $product->product_id }}" value="{{ number_format($product->product_price, 0, ',', '.') }}VNĐ">
                                                <input type="hidden" value="{{ $product->product_price }}" class="cart_product_price_{{ $product->product_id }}">
                                                <input type="hidden" value="1" class="cart_product_qty_{{ $product->product_id }}">
                                                <a id="wishlist_producturl{{ $product->product_id }}" href="{{ url('chi-tiet/'.$product->product_slug) }}"></a>


                                            <div class="product-img">
                                                <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                                                    <img class="default-img" src="{{URL::to('public/uploads/product/'.$product->product_image)}}">
                                                    <img class="hover-img" ssrc="{{URL::to('public/uploads/product/'.$product->product_image)}}" >
                                                </a>
                                                <div class="button-head">
                                                    <div class="product-action">
                                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                        <a title="Wishlist" onclick="add_wistlist('{{$product->product_id}}')"><i class="ti-heart"></i><span>Add to Wishlist</span></a>
                                <a title="Compare" onclick="add_compare('{{$product->product_id}}')" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                    </div>
                                                    <div class="product-action-2">
                                                        <a  value="Thêm giỏ hàng" class="add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                            <div class="product-content">
                                                <h3><a href="product-details.html">{{$product->product_name}}</a></h3>
                                                <div class="product-price">
                                                    <span>{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</span>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                    @endforeach

						</div>
					</div>
                    </div>

                    </div><!--features_items-->
                  {{--  <ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$category_by_id->links()!!}
                    </ul> --}}
               </div>
<!-- </section> -->
        <!--/recommended_items-->


@endsection
