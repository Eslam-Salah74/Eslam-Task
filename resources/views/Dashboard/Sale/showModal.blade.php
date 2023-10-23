<!-- Start Modal -->
<div class="modal fade custom-modal" id="show{{ $item->id }}">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">{{ trans('main.Show') }} {{ trans('main.Sale') }}</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <div class="row">
					<div class="col-12">
						<div class="card">
                            <div class="card-body">
                                <span>{{ trans('main.Products') }} : </span>
                                <br>
                                <br>
                                <span>{{ trans('main.Unit Price') }} : </span>
                                <br>
                                <br>
                                <span>{{ trans('main.Shipping Rate') }} : </span>
                                <br>
                                <br>
                                <span>{{ trans('main.VAT') }} : </span>
                                <br>
                                <br>
                                <span>{{ trans('main.Discount') }} : </span>
                                <br>
                                <br>
                                <span>{{ trans('main.Total') }} : </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
