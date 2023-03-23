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

                                {{-- permission for category management--}}
                                <li>
                                    <h4>Category Management</h4>
                                    <div class="input-checkset">
                                        <ul>
                                            <li>
                                                <label class="inputcheck">View
                                                    <input type="checkbox" name="permission[]" value="category.show"
                                                        {{in_array("currency.show",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]" value="category.create"
                                                        {{in_array("category.create",$hasPermission) ? "checked" :""
                                                        }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="category.edit"
                                                        {{in_array("category.edit",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]" value="category.delete"
                                                        {{in_array("category.delete",$hasPermission) ? "checked" :""
                                                        }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                {{-- ------------------------------ --}}

                                {{-- permission for currency management--}}
                                <li>
                                    <h4>Currency Management</h4>
                                    <div class="input-checkset">
                                        <ul>
                                            <li>
                                                <label class="inputcheck">View
                                                    <input type="checkbox" name="permission[]" value="currency.show"
                                                        {{in_array("currency.show",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]" value="currency.create"
                                                        {{in_array("currency.create",$hasPermission) ? "checked" :""
                                                        }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="currency.edit"
                                                        {{in_array("currency.edit",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]" value="currency.delete"
                                                        {{in_array("currency.delete",$hasPermission) ? "checked" :""
                                                        }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                {{-- ------------------------------ --}}

                                {{-- permission for Customer management --}}
                                <li>
                                    <h4>Customer Management</h4>
                                    <div class="input-checkset">
                                        <ul>
                                            <li>
                                                <label class="inputcheck">View
                                                    <input type="checkbox" name="permission[]" value="customer.show"
                                                        {{in_array("customer.show",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]" value="customer.create"
                                                        {{in_array("customer.create",$hasPermission) ? "checked" :""
                                                        }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="customer.edit"
                                                        {{in_array("customer.edit",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]" value="customer.delete"
                                                        {{in_array("customer.delete",$hasPermission) ? "checked" :""
                                                        }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                {{-- ------------------------------ --}}

                                {{-- permission for Product management --}}
                                <li>
                                    <h4>Product Management</h4>
                                    <div class="input-checkset">
                                        <ul>
                                            <li>
                                                <label class="inputcheck">View
                                                    <input type="checkbox" name="permission[]" value="product.show" 
                                                    {{in_array("product.show",$hasPermission) ? "checked" :"" }}/>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]" value="product.create" 
                                                    {{in_array("product.create",$hasPermission) ? "checked" :"" }}/>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="product.edit" 
                                                    {{in_array("product.edit",$hasPermission) ? "checked" :"" }}/>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]" value="product.delete" 
                                                    {{in_array("product.delete",$hasPermission) ? "checked" :"" }}/>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Import
                                                    <input type="checkbox" name="permission[]" value="product.import" 
                                                    {{in_array("product.import",$hasPermission) ? "checked" :"" }}/>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Barcode Generate
                                                    <input type="checkbox" name="permission[]" value="product.barcode.generate" 
                                                    {{in_array("product.barcode.generate",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                {{-- ------------------------------ --}}

                                 {{-- permission for purchase management --}}
                                 <li>
                                    <h4>Purchase Management</h4>
                                    <div class="input-checkset">
                                        <ul>
                                            <li>
                                                <label class="inputcheck">View
                                                    <input type="checkbox" name="permission[]" value="purchase.show" 
                                                    {{in_array("purchase.show",$hasPermission) ? "checked" :"" }}/>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]" value="purchase.create" 
                                                    {{in_array("purchase.create",$hasPermission) ? "checked" :"" }}/>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="purchase.edit" 
                                                    {{in_array("purchase.edit",$hasPermission) ? "checked" :"" }}/>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]" value="purchase.delete" 
                                                    {{in_array("purchase.delete",$hasPermission) ? "checked" :"" }}/>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                {{-- ------------------------------ --}}

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

                                {{-- permission for system.settion management --}}
                                <li>
                                    <h4>System Settion</h4>
                                    <div class="input-checkset">
                                        <ul>
                                            <li>
                                                <label class="inputcheck">View
                                                    <input type="checkbox" name="permission[]"
                                                        value="system.settion.show"
                                                        {{in_array("system.settion.show",$hasPermission) ? "checked" :""
                                                        }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]"
                                                        value="system.settion.edit"
                                                        {{in_array("system.settion.edit",$hasPermission) ? "checked" :""
                                                        }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                {{-- ------------------------------ --}}

                                {{-- permission for supplier management --}}
                                <li>
                                    <h4>Supplier Management</h4>
                                    <div class="input-checkset">
                                        <ul>
                                            <li>
                                                <label class="inputcheck">View
                                                    <input type="checkbox" name="permission[]" value="supplier.show"
                                                        {{in_array("supplier.show",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]" value="supplier.create"
                                                        {{in_array("supplier.create",$hasPermission) ? "checked" :""
                                                        }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="supplier.edit"
                                                        {{in_array("supplier.edit",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]" value="supplier.delete"
                                                        {{in_array("supplier.delete",$hasPermission) ? "checked" :""
                                                        }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                {{-- ------------------------------ --}}

                                {{-- permission for unit management --}}
                                <li>
                                    <h4>Units Management</h4>
                                    <div class="input-checkset">
                                        <ul>
                                            <li>
                                                <label class="inputcheck">View
                                                    <input type="checkbox" name="permission[]" value="unit.show"
                                                        {{in_array("unit.show",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]" value="unit.create"
                                                        {{in_array("unit.create",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="unit.edit"
                                                        {{in_array("unit.edit",$hasPermission) ? "checked" :"" }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]" value="unit.delete"
                                                        {{in_array("unit.delete",$hasPermission) ? "checked" :"" }} />
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
                                                <label class="inputcheck">View all
                                                    records of all
                                                    users
                                                    <input type="checkbox" name="permission[]" value="users.show.all"
                                                        {{in_array("users.show.all",$hasPermission) ? "checked" :""
                                                        }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                {{-- ------------------------------ --}}

                                {{-- permission for warehouse management --}}
                                <li>
                                    <h4>Warehouse Management</h4>
                                    <div class="input-checkset">
                                        <ul>
                                            <li>
                                                <label class="inputcheck">View
                                                    <input type="checkbox" name="permission[]" value="warehouse.show"
                                                        {{in_array("warehouse.show",$hasPermission) ? "checked" :""
                                                        }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]" value="warehouse.create"
                                                        {{in_array("warehouse.create",$hasPermission) ? "checked" :""
                                                        }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="warehouse.edit"
                                                        {{in_array("warehouse.edit",$hasPermission) ? "checked" :""
                                                        }} />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]" value="warehouse.delete"
                                                        {{in_array("warehouse.delete",$hasPermission) ? "checked" :""
                                                        }} />
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