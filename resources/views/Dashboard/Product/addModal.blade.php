<!-- Modal effects -->
<div class="modal" id="modaldemo8">
	<div  class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">{{trans('main.New Product')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
			<!-- id="selectForm" -->
				<form action="{{route('products.store')}}" id="selectForm" data-parsley-validate="" method="POST">
					@csrf
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label class="form-label">{{trans('main.Product Name')}}: <span class="tx-danger">*</span></label>
								<input class="form-control" name="name" required="" type="text">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label class="form-label">{{trans('main.Product Price')}}: <span class="tx-danger">*</span></label>
								<input class="form-control" name="price" required="" type="text">
							</div>
						</div>

						<div class="col-6">
							<div class="form-group">
								<label class="form-label">{{trans('main.Discount')}}( % ): <span class="tx-danger">*</span></label>
								<input class="form-control" name="discount" required="" type="number" value="0">
							</div>
						</div>

						<div class="col-6">
							<div class="form-group">
								<label class="form-label">{{trans('main.Product Weight')}}( Kg ): <span class="tx-danger">*</span></label>
								<input class="form-control" name="weight" required="" type="text">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label class="form-label">{{ trans('Shipping from') }}:</label>
								<select class="form-control" name="shipping_id" required>
									@foreach ($shipingrates as $item)	
										<option value='{{ $item->id }}'>{{ $item->country }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<br><br><br>
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
		<!-- End Modal effects-->