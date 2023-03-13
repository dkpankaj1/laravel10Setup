<x-delete-confirm :route="route('roles.destroy',$role->id)">
    <h5 class="text-center">Are you sure you want to delete <span class="text-danger">{{$role->name}} </span> ?</h5>
</x-delete-confirm>