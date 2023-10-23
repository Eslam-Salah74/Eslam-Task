@extends('layouts.master')
@section('css')
@livewireStyles
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('main.Index')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('main.Sales')}}</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<!-- validationNotify -->
@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

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
                        <a  class="btn btn-outline-primary" href="{{ route('sales.create') }}">
                            <i class="fas fa-plus">&nbsp</i>
                            {{trans('main.Add')}}</a>
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
                                    <th class="text-center">#</th>
                                    {{-- <th class="text-center">{{trans('main.Product')}}</th> --}}
                                    <th class="text-center">{{trans('main.Shipping Rate')}}</th>
                                    <th class="text-center">{{trans('main.VAT')}}</th>
                                    <th class="text-center">{{trans('main.Discount')}}</th>
                                    <th class="text-center">{{trans('main.Total')}}</th>
                                    <th class="text-center">{{trans('main.Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($sales as $item)
                                <tr>
                                    <?php $i++; ?>
                                    <td class="text-center">{{$i}}</td>
                                    {{-- <td class="text-center">{{$item->product_id}}</td> --}}
                                    <td class="text-center">{{$item->shipping}}</td>
                                    <td class="text-center">{{$item->vat}}</td>
                                    <td class="text-center">{{$item->discount}}</td>
                                    <td class="text-center">{{$item->total}}</td>
                                    <td class="text-center">
                                        {{-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#show{{ $item->id }}" title="{{ trans('main.Show') }}"><i class="fa  fa-eye"></i></button> --}}
                               
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $item->id }}" title="{{ trans('main.Delete') }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @include('Dashboard.Sale.showModal')
                                @include('Dashboard.Sale.deleteModal')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->


@endsection
@section('js')

 

@endsection