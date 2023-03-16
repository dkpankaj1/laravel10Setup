<x-delete-confirm :route="route('supplier.destroy',$supplier->id)">
    <h5 class="text-center">Are you sure you want to delete <span class="text-danger">{{$supplier->name}} </span> ?</h5>
</x-delete-confirm>