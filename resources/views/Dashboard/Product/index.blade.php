@extends('layouts.master')
@section('css')
@livewireStyles
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('main.Index')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('main.Products')}}</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

            <!-- success Notify -->
            @if (session()->has('success'))
                <script id="successNotify">
                    window.onload = function() {
                        notif({
                            msg: "تمت العملية بنجاح",
                            type: "success"
                        })
                    }
                </script>
            @endif

            <!-- error Notify -->
            @if (session()->has('error'))
                <script id="errorNotify">
                    window.onload = function() {
                        notif({
                            msg: "لقد حدث خطأ.. برجاء المحاولة مرة أخرى!",
                            type: "error"
                        })
                    }
                </script>
            @endif

            <!-- canNotDeleted Notify -->
            @if (session()->has('canNotDeleted'))
                <script id="canNotDeleted">
                    window.onload = function() {
                        notif({
                            msg: "لا يمكن الحذف لوجود بيانات أخرى مرتبطة بها..!",
                            type: "error"
                        })
                    }
                </script>
            @endif
				<!-- row -->
				<div class="row">
				<div class="col-lg-12 col-md-12">
				<div class="card custom-card">
					<div class="card-body">
						<div class="row row-sm">
							<div class="col-sm-6 col-md-4 col-xl-3">
								<a class="modal-effect btn btn-outline-primary" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">
								<i class="fas fa-plus">&nbsp</i>	
								{{trans('main.Add')}}
									
								</a>
							</div>
						</div>
						<br>
						<div class="card-body">
								<div class="table-responsive">
								@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
											<th class="wd-150p border-bottom-0">#</th>
												<th class="wd-150p border-bottom-0">{{trans('main.Product Name')}}</th>
												<th class="wd-150p border-bottom-0">{{trans('main.Product Weight')}}</th>
												<th class="wd-20p border-bottom-0">{{trans('main.Price')}}</th>
												<th class="wd-20p border-bottom-0">{{trans('main.Discount')}}</th>
												<th class="wd-20p border-bottom-0">{{trans('main.VAT')}} (14 %)</th>
												<th class="wd-15p border-bottom-0">{{trans('main.Sale Price')}}</th>
												<th class="wd-15p border-bottom-0">{{trans('main.Shipping From')}}</th>
												<th class="wd-15p border-bottom-0">{{trans('main.Shipping Rate')}}</th>
												<th class="wd-25p border-bottom-0">{{trans('main.Actions')}}</th>
											</tr>
										</thead>
										<tbody>
										<?php $i = 0; ?>
                               			 @foreach ($products as $item)
											<tr>
											<?php $i++; ?>
											<td>{{$i}}</td>
												<td>{{$item->name}}</td>
												<td>{{$item->weight}}</td>
												<td>{{$item->price}}</td>
												<td>{{$item->discount}}</td>
												<td>{{ $item->vat }}</td>
												<td>{{$item->sale_price}}</td>
												<td>{{$item->shipping->country}}</td>
												<td>{{$item->shipping_rate}}</td>
												<td>
													<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $item->id }}" title="{{ trans('main.Edit') }}"><i class="fa fa-edit"></i></button>
                                                	<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $item->id }}" title="{{ trans('main.Delete') }}"><i class="fa fa-trash"></i></button>
                                                </td>
											</tr>
											    @include('Dashboard.Product.editModal')
                                   			    @include('Dashboard.Product.deleteModal')
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
					</div>
				</div>
			</div>
    

			@include('Dashboard.Product.addModal')
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
 
@endsection