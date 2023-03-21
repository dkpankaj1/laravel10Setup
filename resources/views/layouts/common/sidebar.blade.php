<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{route('dashboard')}}"><img src="{{asset('assets/img/icons/dashboard.svg')}}"
                            alt="img"><span>
                            Dashboard</span> </a>
                </li>

                @canany(['product.show','product.create','category.show', 'category.create','product.import'])
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/product.svg')}}" alt="img"><span>
                            Product</span> <span class="menu-arrow"></span></a>
                    <ul>
                        @can('product.show')
                        <li><a href="{{route('product.index')}}">Product List</a></li>
                        @endcan
                        @can('product.create')
                        <li><a href="{{route('product.create')}}">Add Product</a></li>
                        @endcan
                        @can('category.show')
                        <li><a href="{{route('category.index')}}">Category List</a></li>
                        @endcan
                        @can('category.create')
                        <li><a href="{{route('category.create')}}">Add Category</a></li>
                        @endcan
                        @can('product.import')
                        <li><a href="{{route('product.import')}}">Import Products</a></li>
                        @endcan
                        <li><a href="#">Print Barcode</a></li>
                    </ul>
                </li>
                @endcanany

                @canany(['customer.show', 'supplier.show', 'users.show','customer.create', 'supplier.create', 'users.create'])
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/users1.svg')}}" alt="img"><span>
                            People</span> <span class="menu-arrow"></span></a>
                    <ul>
                        @can('customer.show')
                        <li><a href="{{route('customer.index')}}">Customer List</a></li>
                        @endcan
                        @can('customer.create')
                        <li><a href="{{route('customer.create')}}">Add Customer</a></li>
                        @endcan
                        @can('supplier.show')
                        <li><a href="{{route('supplier.index')}}">Supplier List</a></li>
                        @endcan
                        @can('supplier.create')
                        <li><a href="{{route('supplier.create')}}">Add Supplier</a></li>
                        @endcan
                        @can('users.show')
                        <li><a href="{{route('users.index')}}">Users List</a></li>
                        @endcan
                        @can('users.create')
                        <li><a href="{{route('users.create')}}">Add Users</a></li>
                        @endcan
                    </ul>
                </li>
                @endcanany



                @canany(['warehouse.show', 'currency.show', 'unit.show' , 'roles.show' , 'system.settion.show'])

                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/settings.svg')}}" alt="img"><span>
                            Settings</span> <span class="menu-arrow"></span></a>
                    <ul>
                        @can('warehouse.show')
                        <li><a href="{{route('warehouse.index')}}">Warehouse</a></li>
                        @endcan

                        @can('currency.show')
                        <li><a href="{{route('currency.index')}}">Currency</a></li>
                        @endcan

                        @can('unit.show')
                        <li><a href="{{route('units.index')}}">Unit Settings</a></li>
                        @endcan

                        @can('roles.show')
                        <li><a href="{{route('roles.index')}}">Group Permissions</a></li>
                        @endcan

                        @can('system.settion.show')
                        <li><a href="{{route('setting.system.manage','system')}}">System Settings</a></li>
                        @endcan
                    </ul>
                </li>
                @endcanany
            </ul>
        </div>
    </div>
</div>