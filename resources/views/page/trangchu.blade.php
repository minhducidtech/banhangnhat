@extends('master')
@section('content')

	<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
									<!-- THE FIRST SLIDE -->
								@foreach($slide as $sl)
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sl->image}}" data-src="source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
												</div>

						       		 </li>
						       		@endforeach
								
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($newproduct)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($newproduct_page as $new)
									<div class="col-sm-3">
										<div class="single-item">
											@if($new->promotion_price != 0)
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif

											<div class="single-item-header">
												<a href="{{route('chi-tiet-san-pham',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$new->name}}</p>
												<p class="single-item-price" style="font-size: 18px">
													@if($new->promotion_price != 0)
														<span class="flash-del">${{number_format($new->unit_price)}} VNĐ</span>
														<span class="flash-sale">${{number_format($new->promotion_price)}} VNĐ</span>
													@else
														<span class="flash-sale">${{number_format($new->unit_price)}} VNĐ</span>
													@endif
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{route('add-to-cart',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{route('chi-tiet-san-pham',$new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach

								<div class="row" align="center" >{{$newproduct_page->links()}}	


								</div>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khuyến mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($saleproduct)}}</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($saleproduct_page as $sale)
									<div class="col-sm-3">
										<div class="single-item">
											@if($sale->promotion_price != 0)
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
											<div class="single-item-header">
												<a href="{{route('chi-tiet-san-pham',$sale->id)}}"><img src="source/image/product/{{$sale->image}}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$sale->name}}</p>
												<p class="single-item-price" style="font-size: 18px">
													@if($sale->promotion_price != 0)
														<span class="flash-del">${{number_format($sale->unit_price)}} VNĐ</span>
														<span class="flash-sale">${{number_format($sale->promotion_price)}} VNĐ</span>
													@else
														<span class="flash-sale">${{number_format($sale->unit_price)}} VNĐ</span>
													@endif
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{route('add-to-cart',$sale->id)}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{route('chi-tiet-san-pham',$sale->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
								<div class="row" align="center" >{{$saleproduct_page->links()}}	
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection