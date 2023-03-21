<x-app-layout>

    <x-slot name="header">
        <x-page-header title="Create Permissions">
            {{Breadcrumbs::render('roles_create')}}
        </x-page-header>
    </x-slot>

    {{-- :: Begin Section :: --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('roles.create')}}" method="POST">
                @csrf
                {{-- begin role description --}}
                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                        <div class="form-group">
                            <label>{{_('Role')}}</label>
                            <input type="text" name="name" class="@error('name') is-invalid  @enderror"
                                value="{{old('name')}}" />
                            @error('name')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <div class="form-group">
                            <label>{{_('Role Description')}}</label>
                            <input type="text" name="description" class="@error('description') is-invalid  @enderror"
                                value="{{old('description')}}" />
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
                                                    <input type="checkbox" name="permission[]" value="category.show" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]"
                                                        value="category.create" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="category.edit" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]"
                                                        value="category.delete" />
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
                                                    <input type="checkbox" name="permission[]" value="currency.show" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]"
                                                        value="currency.create" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="currency.edit" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]"
                                                        value="currency.delete" />
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
                                                    <input type="checkbox" name="permission[]" value="customer.show" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]"
                                                        value="customer.create" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="customer.edit" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]"
                                                        value="customer.delete" />
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
                                                    <input type="checkbox" name="permission[]" value="product.show" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]" value="product.create" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="product.edit" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]" value="product.delete" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Import
                                                    <input type="checkbox" name="permission[]" value="product.import" />
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
                                                    <input type="checkbox" name="permission[]" value="roles.show" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]" value="roles.create" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="roles.edit" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]" value="roles.delete" />
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
                                                        value="system.settion.show" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]"
                                                        value="system.settion.edit" />
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
                                                    <input type="checkbox" name="permission[]" value="supplier.show" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]"
                                                        value="supplier.create" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="supplier.edit" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]"
                                                        value="supplier.delete" />
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
                                                    <input type="checkbox" name="permission[]" value="unit.show" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]" value="unit.create" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="unit.edit" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]" value="unit.delete" />
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
                                                    <input type="checkbox" name="permission[]" value="users.show" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]" value="users.create" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="users.edit" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]" value="users.delete" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">View all
                                                    records of all
                                                    users
                                                    <input type="checkbox" name="permission[]" value="users.show.all" />
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
                                                    <input type="checkbox" name="permission[]" value="warehouse.show" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Create
                                                    <input type="checkbox" name="permission[]"
                                                        value="warehouse.create" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Edit
                                                    <input type="checkbox" name="permission[]" value="warehouse.edit" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="inputcheck">Delete
                                                    <input type="checkbox" name="permission[]"
                                                        value="warehouse.delete" />
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
                        <button href="javascript:void(0);" class="btn btn-submit me-2">Create</button>
                    </div>
                </div>
                {{-- end create button --}}
            </form>
        </div>
    </div>

    {{-- :: End Section :: --}}
</x-app-layout>