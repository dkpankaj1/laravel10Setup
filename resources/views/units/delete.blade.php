<x-delete-confirm :route="route('units.destroy',$productUnit->id)">
    <h5 class="text-center">Are you sure you want to delete <span class="text-danger">{{$productUnit->name}} </span> ?</h5>
</x-delete-confirm>