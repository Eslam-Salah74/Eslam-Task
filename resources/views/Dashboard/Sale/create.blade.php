<?php $page="sales";?>

@extends('layouts.master')

@section('css')
    
    <link rel="stylesheet" href="{{ asset('assets_admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Print -->
    <style>
        @media print {
            .notPrint {
                display: none;
            }
        }

        @media print{
            #print_Button{
                display: none;
            }
            #sidebarnav{
                display: none;
            }
        }
    </style>
    
    @section('title')
    {{ trans('main.Add') }} {{ trans('main.Sale') }}
    @stop
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
            

            <!-- Page Wrapper -->
            <br><br>
            <div class="page-wrapper">
                <div class="content container-fluid">
                    <!-- Page Header -->
                    <div class="page-header notPrint">
                        <div class="row align-items-center">
                            <div class="col">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('main.Index') }}</a></li>
                                    <li class="breadcrumb-item active">{{ trans('main.Add') }} {{ trans('main.Sale') }}</li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('sales.index') }}" type="button" class="btn btn-outline-primary" id="filter_search">
                                    {{ trans('main.Back') }}
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
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
                                    <form  action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                        @csrf

                                        <div class="row">

                                            <!--sale_details-->
                                            <div class="col-12 notPrint mt-5 mb-3" style="border: 1px solid grey; padding:10px;">
                                                <div id="purchase_details" name="purchase_details">
                                                    <div class="row mt-3">
                                                        <div class="col-5">
                                                            <h4>{{ trans('main.Details') }}</h4>
                                                        </div>
                                                        <div class="col-5"></div>
                                                        <div class="col-2">
                                                            <button id="storeBtn" type="button" class="btn btn-outline-primary storeBtn">
                                                                <i class="fas fa-plus">&nbsp</i>
                                                                {{ trans('main.Add') }} {{ trans('main.Item') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <table id="myTable" class="col-12 mt-3">
                                                        <tr>   
                                                            <td style="width:0%;">
                                                                <label for="product_id" class="mr-sm-2">{{ trans('main.Product') }}</label>
                                                                <br>
                                                                <select class="form-control select2 product_id" name="product_id" required onchange="productChange()">
                                                                    @foreach($products as $product)
                                                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            {{-- <td style="width:2%;"></td> --}}
                                                            <td style="width:0%;">
                                                                <label for="price" class="mr-sm-2">{{ trans('main.Unit Price') }}($)</label>
                                                                <input id="price" type="text" class="form-control text-center price" name="price" value="{{$products[0]->price}}" readOnly>
                                                            </td>
                                                            <td style="width:0%;">
                                                                <label for="vat" class="mr-sm-2">{{ trans('main.VAT') }}($)</label>
                                                                <input id="vat" type="text" class="form-control text-center vat" name="vat" value="{{$products[0]->vat}}" readOnly>
                                                            </td>
                                                            <td style="width:0%;">
                                                                    <label for="sale_price" class="mr-sm-2">{{ trans('main.Sale Price') }}($)</label>
                                                                    <input id="sale_price" type="text" class="form-control text-center sale_price" name="sale_price" value="{{$products[0]->sale_price}}" readOnly>
                                                            </td>
                                                            {{-- <td style="width:2%;"></td> --}}
                                                            <td style="width:0%;">
                                                                <label for="shipping_rate" class="mr-sm-2">{{ trans('main.Shipping Price') }}($)</label>
                                                                <input id="shipping_rate" type="text" class="form-control text-center shipping_rate" name="shipping_rate" value="{{$products[0]->shipping_rate}}" readOnly>
                                                            </td>
                                                            <td style="width:0%;">
                                                                <label for="discount" class="mr-sm-2">{{ trans('main.Discount') }}($)</label>
                                                                <input id="discount" type="text" class="form-control text-center discount" name="discount" value="{{$products[0]->discount}}" readOnly>
                                                            </td><td style="width:0%;">
                                                                <label for="total" class="mr-sm-2">{{ trans('main.Total') }}($)</label>
                                                                <input id="total" type="text" class="form-control text-center total" name="total" value="{{$products[0]->total}}" readOnly>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <!--details-->
                                            <div class="col-12 mb-3" style="border: 1px solid grey; padding:10px;">
                                                <div id="details" name="details">
                                                    <div class="col-9">
                                                        <button class="btn btn-danger mt-3 mr-2" id="print_Button" onclick="printDiv()">
                                                            <i class="mdi mdi-printer ml-1"></i>Print
                                                        </button>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <h4 class="text-center" style="text-decoration:underline">{{ trans('main.Items') }} {{ trans('main.Sale') }}</h4>
                                                        </div>
                                                    </div>
                                                    <table id="detailsTable" class="col-12 mt-3">
                                                        <thead id="print">
                                                            <tr>
                                                                <th class="text-center">
                                                                    {{ trans('main.Product') }}
                                                                </th>
                                                                <th class="text-center">
                                                                    {{ trans('main.Unit Price') }}
                                                                </th>
                                                                <th class="text-center">
                                                                    {{ trans('main.Shipping Price') }}
                                                                </th>
                                                                <th class="text-center">
                                                                    {{ trans('main.VAT') }}
                                                                </th>
                                                                <th class="text-center">
                                                                    {{ trans('main.Discount') }}
                                                                </th>
                                                                <th class="text-center">
                                                                    {{ trans('main.Actions') }}
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="detailsBody" class="detailsBody">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- tax -->
                                            <div class="col-4">
                                                <label for="vat_total" class="mr-sm-2">{{ trans('main.All VAT') }}</label>
                                                <input id="vat_total" type="text" class="form-control" name="vat_total" value="{{$products[0]->vat_total}}" readOnly>
                                            </div>
                                            <!-- discount -->
                                            <div class="col-4">
                                                <label for="discount_total" class="mr-sm-2">{{ trans('main.Total Discount') }}</label>
                                                <input id="discount_total" type="text" class="form-control" name="discount_total" value="{{$products[0]->discount_total}}" readOnly>
                                            </div>
                                            <!-- grand_total -->
                                            <div class="col-4">
                                                <label for="grand_total" class="mr-sm-2">{{ trans('main.Grand Total') }} :</label>
                                                <input id="grand_total" type="text" class="form-control" name="grand_total" value="{{$products[0]->grand_total}}" readOnly>
                                            </div>
                                            
                                        </div>
                                        <br><br>
                                        <hr>
                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-primary notPrint btn-block">{{ trans('main.Confirm') }}</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            @include('Dashboard.Sale.deleteItemModal')	
                        </div>	
                    </div>
                </div>			
            </div>
            <!-- /Page Wrapper -->
		</div>
    </div>
	<!-- /Main Wrapper -->
	
@endsection



@section('js')
    <script  src="{{ asset('assets_admin/plugins/select2/js/select2.full.min.js') }}"> </script>
    <script>
    //Initialize Select2 Elements
    $('.select2').select2({
        theme: 'bootstrap4'
    });
    </script>

{{-- Start productChange --}}

    <script type="text/javascript">
        function productChange() {
            $(document).ready(function(){
                $('select[name="product_id"]').on('change',function(){
                    var product_id =$(this).val();
                    if (product_id) {
                        $.ajax({
                            url:"{{URL::to('productDetails')}}/" + product_id,
                            type:"GET",
                            dataType:"json",
                            success:function(data){  
                                $('input[name="productPrice"]').empty();
                                $.each(data,function(key,value) {

                                    price = parseFloat(value["price"]).toFixed(2);
                                    document.getElementById("price").value = price;

                                    sale_price = parseFloat(value["sale_price"]).toFixed(2);
                                    document.getElementById("sale_price").value = sale_price;

                                    shipping_rate = parseFloat(value["shipping_rate"]).toFixed(2);
                                    document.getElementById("shipping_rate").value = shipping_rate;

                                    vat = parseFloat(value["vat"]).toFixed(2);
                                    document.getElementById("vat").value = vat;

                                    discount = parseFloat(value["discount"]).toFixed(2);
                                    document.getElementById("discount").value = discount;

                                    shipping_rate = parseFloat(value["shipping_rate"]).toFixed(2);
                                    document.getElementById("shipping_rate").value = shipping_rate;
                                  
                                    var sale_price      = parseFloat(document.getElementById('sale_price').value);
                                    var shipping_rate   = parseFloat(document.getElementById('shipping_rate').value);
                                    var vat   = parseFloat(document.getElementById('vat').value);

                                    total   = sale_price + shipping_rate;                                
                                    document.getElementById('total').value   = total;
                                    
                                });
                            }
                        });
                    } else {
                        console.log('not work')
                    }
                });
            });
        }
    </script>

{{-- End productChange --}}

<script>
        $(document).ready(function () {
            //fetch
            fetchDetails();
            function fetchDetails()
            {
                $.ajax({
                    type: "GET",
                    url: "{{ route('details.fetch') }}",
                    dataType: "json",
                    success:function(response) {

                        // console.log(response.sale_details);

                        $('tbody[id="detailsBody"]').html("");
                        
                        $.each(response.sale_details, function(key, item)
                        {
                            $('tbody[id="detailsBody"]').append('<tr>\
                                <td class="text-center">'+item.product+'</td>\
                                <td class="text-center">'+item.price+'</td>\
                                <td class="text-center">'+item.shipping_rate+'</td>\
                                <td class="text-center">'+item.vat+'</td>\
                                <td class="text-center">'+item.discount+'</td>\
                                <td class="text-center"><button type="button" value="'+item.id+'" class="delete_item notPrint btn btn-danger btn-sm">{{ trans('main.Delete') }}</button></td>\
                            </tr>');
                        });
                        
                        document.getElementById('grand_total').value = response.grand_total;
                        document.getElementById('discount_total').value = response.discount_total;
                        document.getElementById('vat_total').value = response.vat_total;
                        
                    },
                    error:function(reject){},
                });
            }

            // function fetchLastDetails()
            // {
            //     $.ajax({
            //         type: "get",
            //         url: "{{ route('details.fetchLast') }}",
            //         dataType: "json",
            //         success:function(response) {
            //             // $.each(response.sale_details, function(key, item)
            //             // {
            //                 $('table[id="detailsTable"]').append('<tbody>\
            //                     <tr>\
            //                         <td class="text-center">'+response.sale_details.quantity+'</td>\
            //                         <td class="text-center">'+response.sale_details.product+'</td>\
            //                         <td class="text-center">'+response.sale_details.sale_price+'</td>\
            //                         <td class="text-center">'+response.sale_details.sub_total+'</td>\
            //                         <td class="text-center"><button type="button" value="'+response.sale_details.id+'" class="delete_item btn btn-danger btn-sm">{{ trans('main.Delete') }}</button></td>\
            //                     </tr>\
            //                 </tbody>');
            //             // });
                        
            //             document.getElementById('grand_total').value = response.grand_total;
            //         },
            //         error:function(reject){},
            //     });
            // }


            //store
            $(document).ready(function(){
                $(document).on('click','.storeBtn',function(e){
                    e.preventDefault();
                    // console.log('eslam');
                    $(this).text('إضافة عنصر');
                    var storeData = {
                        'product_id'     : $('.product_id').val(),
                        'sale_price'     : $('.sale_price').val(),
                        'vat'            : $('.vat').val(),
                        'discount'        : $('.discount').val(),
                        'shipping_rate'  : $('.shipping_rate').val(),     
                        'sub_total'      : $('.price').val(),  
                    }
                    // console.log(storeData);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "{{ route('details.store') }}",
                        data: storeData,
                        dataType: "json",
                        success:function(response) {
                            if(response.status == true) {
                                fetchDetails();
                                notif({
                                    msg: "تمت العملية بنجاح",
                                    type: "success"
                                })
                            }
                        },
                        error:function(reject){},
                    });
                });
            });
            //delete
            $(document).on('click','.delete_item',function(e){
                e.preventDefault();
                var item_id = $(this).val();
                $('#item_id').val(item_id);
                $('#delete_error_list').html("");
                $('#deleteItemModal').modal('show');
            });
            $(document).on('click','.delete_item_btn',function(e){
                e.preventDefault();
                $(this).text('جارى الحذف');
                var item_id = $('#item_id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "delete",
                    url: "/admin/details/destroy/"+item_id,
                    success:function(response) {
                        if(response.status == true) {
                            $('#deleteItemModal').modal('hide');
                            $('.delete_item_btn').text('حذف');
                            fetchDetails();
                            notif({
                                msg: "تمت العملية بنجاح",
                                type: "success"
                            })
                        }
                    },
                    error:function(reject){},
                });
            });
        });
    </script>


<script>
    function printDiv()
    {
        var printContent        = document.getElementById('print').innerHtml;
        var originalContent     = document.body.innerHtml;
        document.body.innerHtml = printContent;
        window.print();
        document.body.innerHtml = originalContent;
        location.reload();
    }
</script>
@endsection
