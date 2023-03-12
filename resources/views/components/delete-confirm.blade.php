@props(['route'])
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{$route}}" method="post">
        <div class="modal-body">
            @csrf
            @method('DELETE')
            {{$slot}}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Yes, Delete Project</button>
        </div>
    </form>
</div><!-- /.modal-content -->
