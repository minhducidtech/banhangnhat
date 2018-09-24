@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng thành công</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Trang chủ</a> / <span>Đơn hàng của bạn</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="#"  class="beta-form-checkout">
				
				<div class="row">
					<div class="col-sm-6">
						<h4>Thông tin cá nhân</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên</label>
							{{$custom->name}}
						</div>
						<div class="form-block">
							<label for="email">Giới tính</label>
							{{$custom->gender}}
						</div>

						<div class="form-block">
							<label for="email">Email</label>
							{{$custom->email}}
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ</label>
							{{$custom->address}}
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							{{$custom->phone_number}}
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" name="notes">{{$custom->note}}</textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Thông tin đơn hàng</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
									
										@foreach($cart->items as $key=>$value)
											<div class="media">
												<img width="25%" src="source/image/product/{{$value['item']['image']}}" alt="" class="pull-left">
												<div class="media-body">
													<p class="font-large">{{$value['item']['name']}}</p>
													<span class="color-gray your-order-info">Số lượng: {{$value['qty']}}</span>
												</div>
												<div class="pull-right"><h5 class="color-black">{{$value['qty']}}*$<span>@if($value['item']['promotion_price']==0){{number_format($value['item']['unit_price'])}} @else {{number_format($value['item']['promotion_price'])}} @endif VNĐ
												</h5></div>
												<div class="clearfix"></div>
											</div>
										@endforeach
									
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">${{number_format($cart->totalPrice)}} VNĐ</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">

									@if($bill->payment=='COD')
										<li class="payment_method_bacs">
											
											<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
											<div class="payment_box payment_method_bacs" style="display: block;">
												Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
											</div>						
										</li>
									@elseif($bill->payment=='ATM')
										<li class="payment_method_cheque">
											
											<label for="payment_method_cheque">Chuyển khoản </label>
											<div class="payment_box payment_method_cheque" style="display: none;">
												Chuyển tiền đến tài khoản sau:
												<br>- Số tài khoản: 123 456 789
												<br>- Chủ TK: Nguyễn A
												<br>- Ngân hàng ACB, Chi nhánh TPHCM
											</div>						
										</li>
									@endif
								</ul>
							</div>

							<div class="text-center"></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection