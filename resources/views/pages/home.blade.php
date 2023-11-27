@extends('layout')

@section('slider')
  @include('pages.include.slider')
@endsection

@section('sidebar')
  @include('pages.include.sidebar')
@endsection

@section('content')
<div class="features_items"><!--features_items-->

                    <div class="category-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                @php
                                    $i = 0;
                                @endphp


                                @foreach($cate_pro_tabs as $key => $cat_tab)
                                    @php
                                    $i++;
                                    @endphp
                                <li class="tabs_pro {{$i==1 ? 'active' : ''}}" data-id="{{$cat_tab->category_id}}"><a href="#tshirt" data-toggle="tab">{{$cat_tab->category_name}}</a></li>

                                @endforeach

                            </ul>
                        </div>

                        <div id="tabs_product"></div>

                    </div>


                        <!-- <h2 class="title text-center">Sản phẩm mới nhất \n</h2> -->
                        <div class="section-title">
							<h2>Sản phẩm mới nhất</h2>
						</div>

                        <div id="all_product"></div>

                        <div id="cart_session"></div>


                    </div><!--features_items-->
                    <style type="text/css">
                      div#quick-cart {
                            margin-top: 60px;
                        }
                    </style>

                    <!-- Modal giỏ hàng -->
                      <div class="modal fade" id="quick-cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Giỏ hàng của bạn</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                                <div class="show_quick_cart_alert"></div>
                                <div id="show_quick_cart"></div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Modal so sanh -->

                      <div class="modal fade" id="sosanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">So sánh sản phẩm</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <table class="table table-striped" id="row_compare">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">View</th>
                                        <th scope="col">Management</th>
                                      </tr>
                                    </thead>
                                    <tbody>



                                    </tbody>
                                  </table>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                          </div>
                        </div>
                      </div>
                     <!-- Modal xem nhanh-->
                            <div class="modal fade" style="margin-top:50px" id="xemnhanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-lg"  role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div class="row no-gutters">
                                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                             <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
                                            <span id="product_quickview_image"></span>
                                            <!-- <span id="product_quickview_gallery"></span> -->
											</div>

										</div>
									</div>
								<!-- End Product slider -->
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2 id="product_quickview_title"></h2>
                                    <p>Mã ID: <span id="product_quickview_id"></span></p>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 khách hàng bình luận)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> Còn hàng</span>
                                        </div>
                                    </div>
                                    <h3 style="font-size:  18px; color: brown;font-weight: bold; "id="product_quickview_price"> .VND</h3>
                                    <label>Số lượng:</label>
                                    <input name="qty" type="number" min="1" class="cart_product_qty_"  value="1" />
                                    <!-- <div class="add-to-cart"> -->
                                        <!-- <a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a> -->
										<div href="#" id="product_quickview_button">Add to cart</div>
                                        <div id="beforesend_quickview"></div>

									<!-- </div> -->

                                    <div class="quickview-peragraph">

                                    <p id="product_quickview_desc" class="short-description"></p>

                                </div>

                                    </div>
									<!-- <div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Size</h5>
												<select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div> -->

										<!--/ End Input Order -->
									</div>
									<div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-dismiss="modal">Đóng</button>
                                                    <button type="button" class="btn">Đi tới giỏ hàng</button>
                                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Modal end -->
                     {{--  <ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$all_product->links()!!}
                      </ul> --}}
        <!--/recommended_items-->

@endsection
