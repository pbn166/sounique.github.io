@extends('layout')
@section('content_cart')

<section id="cart_items">
	<div class="container">

    <!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a  href="{{URL::to('/')}}">Trang chủ<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Thanh toán giỏ hàng</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

		<!-- <div class="register-req">
			<p>Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
		</div> -->
        <!--/register-req-->

		<div class="shopper-informations">
			<div class="row">
				<style type="text/css">
				.col-md-6.form-style input[type=text] {
					margin: 5px 0;
				}
			</style>

				<div class="table-responsive cart_info">

					<form action="{{url('/update-cart')}}" method="POST">
						@csrf
						<table class="table table-condensed">
							<thead>
								<tr class="cart_menu">
									<td class="image">Hình ảnh</td>
									<td class="description">Tên sản phẩm</td>
									<td class="price">Giá sản phẩm</td>
									<td class="quantity">Số lượng</td>
									<td class="total">Thành tiền</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
								@if(Session::get('cart')==true)
								@php
								$total = 0;
								@endphp
								@foreach(Session::get('cart') as $key => $cart)
								@php
								$subtotal = $cart['product_price']*$cart['product_qty'];
								$total+=$subtotal;
								@endphp

								<tr>
									<td class="cart_product">
										<img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" width="90" alt="{{$cart['product_name']}}" />
									</td>
									<td class="cart_description">
										<h4><a href=""></a></h4>
										<p>{{$cart['product_name']}}</p>
									</td>
									<td class="cart_price">
										<p>{{number_format($cart['product_price'],0,',','.')}}đ</p>
									</td>
									<td class="cart_quantity">
										<div class="cart_quantity_button">


											<input class="cart_quantity" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}"  >


										</div>
									</td>
									<td class="cart_total">
										<p class="cart_total_price">
											{{number_format($subtotal,0,',','.')}}đ

										</p>
									</td>
									<td class="cart_delete">
										@if(!Session::get('success_paypal'))
										<a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
										@endif
									</td>
								</tr>

								@endforeach
								<tr>
									@if(!Session::get('success_paypal'))
									<td><input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="check_out btn btn-default btn-sm"></td>
									<td><a class="btn btn-default check_out" href="{{url('/del-all-product')}}">Xóa tất cả</a></td>
									<td>
										@if(Session::get('coupon'))
										<a class="btn btn-default check_out" href="{{url('/unset-coupon')}}">Xóa mã khuyến mãi</a>
										@endif
									</td>
									@endif


									<td colspan="2">
										<li>Tổng tiền :<span>{{number_format($total,0,',','.')}}đ</span></li>
										@if(Session::get('coupon'))
										<li>

											@foreach(Session::get('coupon') as $key => $cou)
											@if($cou['coupon_condition']==1)
											Mã giảm : {{$cou['coupon_number']}} %

											<p>
												@php
												$total_coupon = ($total*$cou['coupon_number'])/100;

												@endphp
											</p>
											<p>
												@php
												$total_after_coupon = $total-$total_coupon;
												@endphp
											</p>
											@elseif($cou['coupon_condition']==2)
											Mã giảm : {{number_format($cou['coupon_number'],0,',','.')}} k

											<p>
												@php
												$total_coupon = $total - $cou['coupon_number'];

												@endphp
											</p>
											@php
											$total_after_coupon = $total_coupon;
											@endphp
											@endif
											@endforeach



										</li>

										@endif

										@if(Session::get('fee'))
										<li>
											<a class="cart_quantity_delete" href="{{url('/del-fee')}}"><i class="fa fa-times"></i></a>

											Phí vận chuyển <span>{{number_format(Session::get('fee'),0,',','.')}}đ</span></li>
											<?php $total_after_fee = $total + Session::get('fee'); ?>
											@endif
											<li>Tổng còn:
												@php
												if(Session::get('fee') && !Session::get('coupon')){
													$total_after = $total_after_fee;
													echo number_format($total_after,0,',','.').'đ';

												}elseif(!Session::get('fee') && Session::get('coupon')){
													$total_after = $total_after_coupon;
													echo number_format($total_after,0,',','.').'đ';
												}elseif(Session::get('fee') && Session::get('coupon')){
													$total_after = $total_after_coupon;
													$total_after = $total_after + Session::get('fee');
													echo number_format($total_after,0,',','.').'đ';
												}elseif(!Session::get('fee') && !Session::get('coupon')){
													$total_after = $total;
													echo number_format($total_after,0,',','.').'đ';
												}

												@endphp

											</li>


										</td>

									</tr>
									@else
									<tr>
										<td colspan="5"><center>
											@php
											echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
											@endphp
										</center></td>
									</tr>
									@endif
								</tbody>



							</form>

							@if(Session::get('cart'))
							<tr><td>

								<form method="POST" action="{{url('/check-coupon')}}">
									@csrf
									<input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá"><br>
									<input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tính mã giảm giá">

								</form>
							</td>
							@if(Session::get('cart'))
							<tr><td>

								<form method="POST" action="{{url('/check-coupon')}}">
									@csrf
									<input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá"><br>
									<input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tính mã giảm giá">

								</form>
							</td>
                            <td>
                            <div class="col-md-12">
												@if(!Session::get('success_paypal'))
												@php

													$vnd_to_usd = $total_after/23083;
													$total_paypal = round($vnd_to_usd,2);
													\Session::put('total_payment',$total_paypal);
												@endphp
												{{-- <div id="paypal-button"></div> --}}
												<a class="btn btn-primary m-3" href="{{ route('processTransaction') }}">Thanh toán Paypal ${{round($vnd_to_usd,2)}}</a>
												@endif
												{{-- <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}"> --}}
											</div>
                            </td>
							<td>
								<form action="{{url('/vnpay_payment')}}" method="post">
									@csrf
									<input type="hidden" name="total_vnpay" value="{{$total_after}}">
									<button type="submit" class="btn btn-default check_out" name="redirect" >Thanh toán VNPAY</button>
								</form>
								<form action="{{url('/momo_payment')}}" method="post">
									@csrf
									<input type="hidden" name="total_momo" value="{{$total_after}}">
									<button type="submit" class="btn btn-default check_out" name="payUrl" >Thanh toán MOMO</button>
								</form>
								<form action="{{url('/onepay_payment')}}" method="post">
									@csrf
									<input type="hidden" name="total_onepay" value="{{$total_after}}">
									<button type="submit" class="btn btn-default check_out"  >Thanh toán ONEPAY</button>
								</form>
							</td>
						</tr>
						@endif
						</tr>
						@endif

					</table>


				</div>
			</div>

		</div>
        <!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
                    <form action="{{url('/update-cart')}}" method="POST">
					@csrf
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>Hình ảnh</th>
								<th>Tên sản phẩm</th>
								<th class="text-center">Giá</th>
								<th class="text-center">Số lượng</th>
								<th class="text-center">Thành tiền</th>
								<th class="text-center"><a href="{{url('/del-all-product')}}"><i class="ti-trash remove-icon"></i> </a></th>
							</tr>
						</thead>
						<tbody>
                        @if(Session::get('cart')==true)
						@php
								$total = 0;
						@endphp
						@foreach(Session::get('cart') as $key => $cart)
							@php
								$subtotal = $cart['product_price']*$cart['product_qty'];
								$total+=$subtotal;
							@endphp
							<tr>
								<td class="image" data-title="No"><img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" alt="{{$cart['product_name']}}"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="#">{{$cart['product_name']}}</a></p>
									<p class="product-des">{{$cart['product_quantity']}}</p>
								</td>
								<td class="price" data-title="Price"><span>{{number_format($cart['product_price'],0,',','.')}}đ </span></td>
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<!-- <div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="100" value="1">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div> -->
                                    <div class="cart_quantity_button">

                                        <input class="cart_quantity" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}"  >

                                    </div>
									<!--/ End Input Order -->
								</td>
								<td class="total-amount" data-title="Total"><span>{{number_format($subtotal,0,',','.')}}đ</span></td>
								<td class="action" data-title="Remove"><a href="{{url('/del-product/'.$cart['session_id'])}}"><i class="ti-trash remove-icon"></i></a></td>
							</tr>
                            @endforeach
                            <tr>
                                <td><input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class=" btn"></td>
                                <!-- <td><a class="btn" href="{{url('/del-all-product')}}">Xóa tất cả</a> -->

                                    @if(Session::get('coupon'))
                                    <a class="btn" href="{{url('/unset-coupon')}}">Xóa mã khuyến mãi</a>
                                    @endif
                            </tr>

						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->

					<div class="total-amount">
						<div class="row">
							<div class="col-lg-6 col-md-5 col-12">
								<div class="left">


								</div>

							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Tổng tiền<span> {{number_format($total,0,',','.')}}đ </span></li>
                                        @if(Session::get('coupon'))

                                        <li>
									@foreach(Session::get('coupon') as $key => $cou)
										@if($cou['coupon_condition']==1)
											Mã giảm : <span> {{$cou['coupon_number']}} % </span>
											<p>
												@php
												$total_coupon = ($total*$cou['coupon_number'])/100;
                                                echo '<li>Tiết kiệm<span>'.number_format($total_coupon,0,',','.').'đ</span></li>';
												@endphp
											</p>
											<p><li>Tổng thanh toán:<span> {{number_format($total-$total_coupon,0,',','.')}}đ<span></li></p>

										@elseif($cou['coupon_condition']==2)
											Mã giảm: <span> {{number_format($cou['coupon_number'],0,',','.')}} VND </span>
											<p>
												@php
												$total_coupon = $total - $cou['coupon_number'];

												@endphp
											</p>

											<!-- <p><li>Tổng đã giảm: <span>{{number_format($total_coupon,0,',','.')}}đ<span></li></p> -->

                                            <li class="last">Tổng thanh toán<span>
                                                @php
												if(Session::get('fee') && !Session::get('coupon')){
													$total_after = $total_after_fee;
													echo number_format($total_after,0,',','.').'VND';

												}elseif(!Session::get('fee') && Session::get('coupon')){
													$total_after = $total_after_coupon;
													echo number_format($total_after,0,',','.').'VND';
												}elseif(Session::get('fee') && Session::get('coupon')){
													$total_after = $total_after_coupon;
													$total_after = $total_after + Session::get('fee');
													echo number_format($total_after,0,',','.').'VND';
												}elseif(!Session::get('fee') && !Session::get('coupon')){
													$total_after = $total;
													echo number_format($total_after,0,',','.').'VND';
												}

												@endphp
</span></li>
									</ul>
                                            @endif
									@endforeach



							</li>
							@endif

                            <!-- Phí mua hàng -->
                            @if(Session::get('fee'))
										<li class="last" href="{{url('/del-fee')}}">

											Phí vận chuyển: <span>{{number_format(Session::get('fee'),0,',','.')}} VND</span><i class="fa fa-times"></i></li>
											<?php $total_after_fee = $total + Session::get('fee'); ?>
											@endif
                            <!-- End phí -->

                                    @else
						<tr>
							<td colspan="5"><center>
							@php
							echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
							@endphp
							</center></td>
						</tr>
						@endif
                        </form>
                        @if(Session::get('cart'))
					<tr>

							@if(Session::get('cart'))
							<tr><td>

								<form method="POST" action="{{url('/check-coupon')}}">
									@csrf
									<input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá"><br>
									<input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tính mã giảm giá">

								</form>
							</td>
                            <td>
                            <div class="col-md-12">
												@if(!Session::get('success_paypal'))
												@php

													$vnd_to_usd = $total_after/23083;
													$total_paypal = round($vnd_to_usd,2);
													\Session::put('total_payment',$total_paypal);
												@endphp
												{{-- <div id="paypal-button"></div> --}}
												<a class="btn btn-primary m-3" href="{{ route('processTransaction') }}">Thanh toán Paypal ${{round($vnd_to_usd,2)}}</a>
												@endif
												{{-- <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}"> --}}
											</div>
                            </td>
							<td>
								<form action="{{url('/vnpay_payment')}}" method="post">
									@csrf
									<input type="hidden" name="total_vnpay" value="{{$total_after}}">
									<button type="submit" class="btn btn-default check_out" name="redirect" >Thanh toán VNPAY</button>
								</form>
								<form action="{{url('/momo_payment')}}" method="post">
									@csrf
									<input type="hidden" name="total_momo" value="{{$total_after}}">
									<button type="submit" class="btn btn-default check_out" name="payUrl" >Thanh toán MOMO</button>
								</form>
								<form action="{{url('/onepay_payment')}}" method="post">
									@csrf
									<input type="hidden" name="total_onepay" value="{{$total_after}}">
									<button type="submit" class="btn btn-default check_out"  >Thanh toán ONEPAY</button>
								</form>
							</td>
						</tr>

						</tr>
						@endif

					</tr>
					@endif
									<div class="button5">

                                        @if(Session::get('coupon'))
                                            <a class="btn" href="{{url('/unset-coupon')}}">Xóa mã khuyến mãi</a>
                                            @endif
                                        @if(Session::get('customer_id'))
                                        <a class="btn" href="{{url('/checkout')}}">Đặt hàng</a>
                                        @else
                                        <a class="btn" href="{{url('/dang-nhap')}}">Đặt hàng</a>
                                        @endif


                                        <a href="#" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>

						</div>
					</div>

					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->
        <div class="col-md-12 clearfix">
				<div class="bill-to">
					<p>Điền thông tin gửi hàng</p>
					 @if(\Session::has('error'))
				        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
				        {{ \Session::forget('error') }}
				    @endif
				    @if(\Session::has('success'))
				        <div class="alert alert-success">{{ \Session::get('success') }}</div>
				        {{ \Session::forget('success') }}
				    @endif
					<div class="col-md-6 form-style">
						<form method="POST">
							@csrf
							<input type="text"  name="shipping_email" class="shipping_email form-control" placeholder="Điền email">
							<input type="text" name="shipping_name" class="shipping_name form-control" placeholder="Họ và tên người gửi">
							<input type="text" name="shipping_address" class="shipping_address form-control" placeholder="Địa chỉ gửi hàng">
							<input type="text" name="shipping_phone" class="shipping_phone form-control" placeholder="Số điện thoại">
							<textarea name="shipping_notes" class="shipping_notes form-control" placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>

							@if(Session::get('fee'))
							<input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
							@else
							<input type="hidden" name="order_fee" class="order_fee" value="10000">
							@endif

							@if(Session::get('coupon'))
							@foreach(Session::get('coupon') as $key => $cou)
							<input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
							@endforeach
							@else
							<input type="hidden" name="order_coupon" class="order_coupon" value="no">
							@endif



							<div class="">
								<div class="form-group">
									<label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
									<select name="payment_select"  class="form-control input-sm m-bot15 payment_select">
										@if(!Session::get('success_paypal'))
										<option value="0">Qua chuyển khoản</option>
										<option value="1">Tiền mặt</option>
										@else
										<option value="2">Đã thanh toán paypal,vui lòng cập nhật giao hàng</option>

										@endif
									</select>
								</div>
							</div>
							<input type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-primary btn-sm send_order">
						</form>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
						<form>
							@csrf

							<div class="form-group">
								<label for="exampleInputPassword1">Chọn thành phố</label>
								<select name="city" id="city" class="form-control input-sm m-bot15 choose city">

									<option value="">--Chọn tỉnh thành phố--</option>
									@foreach($city as $key => $ci)
									<option value="{{$ci->matp}}">{{$ci->name_city}}</option>
									@endforeach

								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Chọn quận huyện</label>
								<select name="province" id="province" class="form-control input-sm m-bot15 province choose">
									<option value="">--Chọn quận huyện--</option>

								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Chọn xã phường</label>
								<select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
									<option value="">--Chọn xã phường--</option>
								</select>
							</div>


							<input type="button" value="Tính phí vận chuyển" name="calculate_order" class="btn btn-primary btn-sm calculate_delivery">


						</form>
					</div>
                </div>



				</div>
			</div>
			<div class="col-sm-12 clearfix">
				@if(session()->has('message'))
				<div class="alert alert-success">
					{!! session()->get('message') !!}
				</div>
				@elseif(session()->has('error'))
				<div class="alert alert-danger">
					{!! session()->get('error') !!}
				</div>
				@endif
	</div>



</div>


</section> <!--/#cart_items-->
<section class="shop checkout section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-12 clearfix">
						<div class="checkout-form">
							<h2>Make Your Checkout Here</h2>
							<p>Please register in order to checkout more quickly</p>
							<!-- Form -->
                            @if(\Session::has('error'))
                                    <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                                    {{ \Session::forget('error') }}
                             @endif
                                    @if(\Session::has('success'))
                                        <div class="alert alert-success">{{ \Session::get('success') }}</div>
                                        {{ \Session::forget('success') }}
                                    @endif
							<form class="form" method="POST" action="#">
                                @csrf
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Họ và tên người nhận<span>*</span></label>
											<input type="text" name="shipping_name" class="shipping_name form-control" placeholder="Phan Bap Cai" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Địa chỉ người nhận<span>*</span></label>
											<input type="text" name="shipping_address" class="shipping_address form-control" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Email<span>*</span></label>
											<input ttype="text"  name="shipping_email" class="shipping_email form-control" placeholder="abc@gmail.com" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Số điện thoại<span>*</span></label>
											<input  type="text" name="shipping_phone" class="shipping_phone form-control" placeholder="0123456789" required="required">
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Quận/Huyện<span>*</span></label>
											<select name="province" id="province" >
												<option value="" selected="selected"></option>

											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Address Line 1<span>*</span></label>
											<input type="text" name="address" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Address Line 2<span>*</span></label>
											<input type="text" name="address" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Postal Code<span>*</span></label>
											<textarea name="shipping_notes" class="shipping_notes form-control" placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Xã/Phường<span>*</span></label>
											<select name="company_name" id="company">
												<option value="company" selected="selected"></option>

											</select>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group create-account">
											<input id="cbox" type="checkbox">
											<label>Create an account?</label>
										</div>
									</div>
								</div>
							</form>
							<!--/ End Form -->

						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>CART  TOTALS</h2>
								<div class="content">
									<ul>
										<li>Sub Total<span>$330.00</span></li>
										<li>(+) Shipping<span>$10.00</span></li>
										<li class="last">Total<span>$340.00</span></li>
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>Payments</h2>
								<div class="content">
									<div class="checkbox">
										<label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label>
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Cash On Delivery</label>
										<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox"> PayPal</label>
									</div>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Payment Method Widget -->
							<div class="single-widget payement">
								<div class="content">
									<img src="images/payment-method.png" alt="#">
								</div>
							</div>
							<!--/ End Payment Method Widget -->
							<!-- Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
										<a href="#" class="btn">proceed to checkout</a>
									</div>
								</div>
							</div>
							<!--/ End Button Widget -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Checkout -->

		<!-- Start Shop Services Area  -->
		<section class="shop-services section home">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-rocket"></i>
							<h4>Free shiping</h4>
							<p>Orders over $100</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-reload"></i>
							<h4>Free Return</h4>
							<p>Within 30 days returns</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-lock"></i>
							<h4>Sucure Payment</h4>
							<p>100% secure payment</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-tag"></i>
							<h4>Best Peice</h4>
							<p>Guaranteed price</p>
						</div>
						<!-- End Single Service -->
					</div>
				</div>
			</div>
		</section>
		<!-- End Shop Services -->

		<!-- Start Shop Newsletter  -->
		<section class="shop-newsletter section">
			<div class="container">
				<div class="inner-top">
					<div class="row">
						<div class="col-lg-8 offset-lg-2 col-12">
							<!-- Start Newsletter Inner -->
							<div class="inner">
								<h4>Newsletter</h4>
								<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
								<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
									<input name="EMAIL" placeholder="Your email address" required="" type="email">
									<button class="btn">Subscribe</button>
								</form>
							</div>
							<!-- End Newsletter Inner -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Shop Newsletter -->

@endsection
