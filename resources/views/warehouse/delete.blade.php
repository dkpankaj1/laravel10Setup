<x-delete-confirm :route="route('warehouse.destroy',$warehouse->id)">
    <h5 class="text-center">Are you sure you want to delete <span class="text-danger">{{$warehouse->name}} </span> ?</h5>
</x-delete-confirm>