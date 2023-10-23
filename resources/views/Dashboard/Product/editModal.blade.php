<!-- start edit modal -->
<div class="modal" id="edit{{ $item->id }}">
    <div  class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('main.Edit') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                

                <form action="{{route('products.update','test')}}" id="selectForm" data-parsley-validate="" method="POST">
                    {{ method_field('patch') }}
                        @csrf
						
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label class="form-label">{{trans('main.Product Name')}}: <span class="tx-danger">*</span></label>
									<input class="form-control" name="name" required="" value="{{ $item->name}}" type="text">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label class="form-label">{{trans('main.Product Price')}}: <span class="tx-danger">*</span></label>
									<input class="form-control" name="price" required="" value="{{ $item->price}}" type="text">
								</div>
							</div>
	
							<div class="col-6">
								<div class="form-group">
									<label class="form-label">{{trans('main.Discount')}}( % ): <span class="tx-danger">*</span></label>
									<input class="form-control" name="discount" required="" value="{{ $item->discount}}" type="text">
								</div>
							</div>
	
							<div class="col-6">
								<div class="form-group">
									<label class="form-label">{{trans('main.Product Weight')}}( Kg ): <span class="tx-danger">*</span></label>
									<input class="form-control" name="weight" required="" value="{{ $item->weight}}" type="text">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label class="form-label">{{ trans('Shipping from') }}:</label>
									<select class="form-control" name="shipping_id" required>
										<option selected disabled>{{ trans('Shipping from') }}</option>
										@foreach ($shipingrates as $item)	
											<option value='{{ $item->id }}'>{{ $item->country }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<br><br><br>
						</div>
						
                        <div class="col-6">
                            <input id="id" type="hidden" name="id" class="form-control" value="{{ $item->id }}">
                        </div>
						</div>
					<div class="modal-footer">
						<button class="btn ripple btn-primary" type="submit">{{trans('main.Save')}}</button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">{{trans('main.Close')}}</button>
					</div>
					
				</form>
            </div>
        </div>
    </div>
</div>
<!-- end edit modal -->
