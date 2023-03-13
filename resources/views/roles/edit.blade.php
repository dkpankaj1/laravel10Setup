<x-app-layout>

    <x-slot name="header">
        <x-page-header title="Edit Permissions">
            {{Breadcrumbs::render('roles_edit',$role)}}
        </x-page-header>
    </x-slot>

    {{-- :: Begin Section :: --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('roles.edit',$role)}}" method="POST">
                @csrf
                @method('put')
                {{-- begin role description --}}
                {{-- begin role description --}}
                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                        <div class="form-group">
                            <label>{{_('Role')}}</label>
                            <input type="text" name="name" class="@error('name') is-invalid  @enderror"
                                value="{{old('name',$role->name)}}" />
                            @error('name')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <div class="form-group">
                            <label>{{_('Role Description')}}</label>
                            <input type="text" name="description" class="@error('description') is-invalid  @enderror"
                                value="{{old('description',$role->description)}}" />
                            @error('description')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="input-checkset">
                            <ul>
                                <li>
                                    <label class="inputcheck">Select All
                                        <input type="checkbox" id="select-all" />
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- end role description --}}
                {{-- end role description --}}

                {{-- begin permission section --}}
                <div class="row">
                    <div class="col-12">
                        <div class="productdetails product-respon">
                            <ul>

                                {{-- permission for role management --}}
                                <li>
                                    <h4>Role Management</h4>
                                    <div class="input-checkset">
                                        <ul>
                                            <li>
                                                <label class="inputcheck">View
                                                    <input type="checkbox" name="permission[]" value="roles.show"
                                                        {{in_array("roles.show",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]" value="roles.create"
                                                        {{in_array("roles.create",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="roles.edit"
                                                        {{in_array("roles.edit",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]" value="roles.delete"
                                                        {{in_array("roles.delete",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                {{-- ------------------------------ --}}

                                {{-- permission for user management --}}
                                <li>
                                    <h4>Users Management</h4>
                                    <div class="input-checkset">
                                        <ul>
                                            <li>
                                                <label class="inputcheck">View
                                                    <input type="checkbox" name="permission[]" value="users.show"
                                                        {{in_array("users.show",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]" value="users.create"
                                                        {{in_array("users.create",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="users.edit"
                                                        {{in_array("users.edit",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]" value="users.delete"
                                                        {{in_array("users.delete",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">View all records of all users
                                                    <input type="checkbox" name="permission[]" value="users.show.all" 
                                                        {{in_array("users.show.all",$hasPermission) ? "checked" :""  }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                {{-- ------------------------------ --}}

                            </ul>
                        </div>
                    </div>
                </div>
                {{-- end permission section --}}

                {{-- begin create button --}}
                <div class="row mt-5">
                    <div class="col-12">
                        <button href="javascript:void(0);" class="btn btn-submit me-2">Update</button>
                    </div>
                </div>
                {{-- end create button --}}
            </form>
        </div>
    </div>

    {{-- :: End Section :: --}}

</x-app-layout>