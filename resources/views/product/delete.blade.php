<x-delete-confirm :route="route('product.destroy',$product->id)">
    <h5 class="text-center">Are you sure you want to delete <span class="text-danger">{{$product->name}} </span> ?</h5>
</x-delete-confirm>