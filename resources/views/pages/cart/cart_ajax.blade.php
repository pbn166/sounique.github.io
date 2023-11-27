@extends('layout')
@section('content_cart')






    <!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a  href="{{URL::to('/')}}">Trang chủ<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Giỏ hàng</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {!! session()->get('message') !!}
                    </div>
                @elseif(session()->has('error'))
                     <div class="alert alert-danger">
                        {!! session()->get('error') !!}
                    </div>
                @endif
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
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th>
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
											Mã giảm : {{number_format($cou['coupon_number'],0,',','.')}} k
											<p>
												@php
												$total_coupon = $total - $cou['coupon_number'];

												@endphp
											</p>

											<!-- <p><li>Tổng đã giảm: <span>{{number_format($total_coupon,0,',','.')}}đ<span></li></p> -->

                                            <li class="last">You Pay<span>{{number_format($total-$total_coupon,0,',','.')}}.VND</span></li>
									</ul>
                                            @endif
									@endforeach



							</li>
							@endif

                                    @else
						<tr>
							<td colspan="5"><center>
							@php
							echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
							@endphp
							</center></td>
						</tr>
						@endif
                        @if(Session::get('cart'))
					<tr><td>

							<form method="POST" action="{{url('/check-coupon')}}">
								@csrf
									<input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá"><br>

	                          		<input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tính mã giảm giá">

                          		</form>



                            </td>
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


@endsection
