@extends('layout')
@section('content_category')
<div class="features_items"><!--features_items-->
<h2 class="title text-center">Kết quả tìm kiếm</h2>

                       @foreach($search_product as $key => $product)
<!--
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                             <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                                            <h2>{{number_format($product->product_price).' '.'VNĐ'}}</h2>
                                            <p>{{$product->product_name}}</p>
                                            <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">
                                        </div>

                                </div>
                            </a>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->

                                            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
                                                    <form>
                                                @csrf
                                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

														<a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
															<img class="default-img"src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="#">
															<img class="hover-img" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
															</div>
															<div class="product-action-2">
																<a class="add-to-cart" title="Thêm giỏ hàng" data-id_product="{{$product->product_id}}" name="add-to-cart" href="#">Add to cart</a>
															</div>
                                                            </form>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-details.html">{{$product->product_name}}</a></h3>
														<div class="product-price">
															<span>{{number_format($product->product_price).' '.'VNĐ'}}</span>
														</div>
													</div>
												</div>
											</div>
                        @endforeach
                    </div><!--features_items-->
        <!--/recommended_items-->
@endsection
