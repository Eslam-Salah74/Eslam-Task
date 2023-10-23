<!-- Modal effects -->
<div class="modal" id="modaldemo8">
	<div  class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">{{trans('main.New Price Shipping')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
			<!-- id="selectForm" -->
				<form action="{{route('shipingrate.store')}}" id="selectForm" data-parsley-validate="" method="POST">
					@csrf
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<input id="country" type="text" class="form-control" name="country" required>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<input id="tax" type="numper" class="form-control" name="rate" value="1" required>
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