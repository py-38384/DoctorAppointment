@props(['id','modalTitle','modalBody','formAction'])
<div class="modal fade" id="appointment_delete_modal_{{$id}}" tabindex="-1" aria-labelledby="appointment_delete_modal_{{$id}}_Label" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="appointment_delete_modal_{{$id}}_Label">{!!$modalTitle!!}</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {!!$modalBody!!}
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form style="display: inline" action="{{$formAction}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary">Delete</button>
        </form>
        </div>
    </div>
    </div>
</div>