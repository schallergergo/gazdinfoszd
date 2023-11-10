 <div class="modal fade" id="deletelesson{{$lesson->id}}Modal" tabindex="-1" role="dialog" aria-labelledby="deletelesson{{$lesson->id}}"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletelesson{{$lesson->id}}">{{__("Delete this item?")}}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">{{__('Select "Delete" below if you are ready to delete this item.')}}</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">{{__("Cancel")}}</button>

                     <a class="btn btn-primary" href="{{ route('lesson.delete',$lesson) }}">
                                        {{ __('Delete') }}
                                    </a>

                </div>
            </div>
        </div>
    </div>