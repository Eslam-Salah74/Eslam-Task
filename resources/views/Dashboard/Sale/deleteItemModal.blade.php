<!-- Start modal-->
<div class="modal custom-modal fade" id="deleteItemModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('main.Delete') }}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-header">
                    <p>{{ trans('main.Warning Deleting Message') }}</p>
                </div>
                <div class="modal-btn delete-action">
                    <!-- id -->
                    <input class="form-control" type="hidden" id="item_id">
                    <div class="modal-btn delete-action">
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('main.Close') }}</button>
                            <button type="submit" class="btn btn-danger continue-btn delete_item_btn">{{ trans('main.Delete') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End modal-->