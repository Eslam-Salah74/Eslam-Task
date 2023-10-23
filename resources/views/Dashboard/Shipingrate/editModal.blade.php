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
                <form action="{{route('shipingrate.update','test')}}" id="selectForm" data-parsley-validate="" method="POST">
                    {{ method_field('patch') }}
                        @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input id="country" type="text" class="form-control" name="country" value="{{$item->country}}" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input id="tax" type="numper" class="form-control" name="rate" value="{{$item->rate}}" required>
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
