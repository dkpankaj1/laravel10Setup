<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{route('dashboard')}}"><img src="{{asset('assets/img/icons/dashboard.svg')}}"
                            alt="img"><span>
                            Dashboard</span> </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/product.svg')}}" alt="img"><span>
                            Product</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('product.index')}}">Product List</a></li>
                        <li><a href="{{route('category.index')}}">Category List</a></li>
                        <li><a href="importproduct.html">Import Products</a></li>
                        <li><a href="barcode.html">Print Barcode</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/sales1.svg')}}" alt="img"><span>
                            Sales</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="saleslist.html">Sales List</a></li>
                        <li><a href="pos.html">POS</a></li>
                        <li><a href="pos.html">New Sales</a></li>
                        <li><a href="salesreturnlists.html">Sales Return List</a></li>
                        <li><a href="createsalesreturns.html">New Sales Return</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/purchase1.svg')}}"
                            alt="img"><span>
                            Purchase</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="purchaselist.html">Purchase List</a></li>
                        <li><a href="addpurchase.html">Add Purchase</a></li>
                        <li><a href="importpurchase.html">Import Purchase</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/expense1.svg')}}" alt="img"><span>
                            Expense</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="expenselist.html">Expense List</a></li>
                        <li><a href="createexpense.html">Add Expense</a></li>
                        <li><a href="expensecategory.html">Expense Category</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/quotation1.svg')}}"
                            alt="img"><span>
                            Quotation</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="quotationList.html">Quotation List</a></li>
                        <li><a href="addquotation.html">Add Quotation</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/transfer1.svg')}}"
                            alt="img"><span>
                            Transfer</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="transferlist.html">Transfer List</a></li>
                        <li><a href="addtransfer.html">Add Transfer </a></li>
                        <li><a href="importtransfer.html">Import Transfer </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/return1.svg')}}" alt="img"><span>
                            Return</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="salesreturnlist.html">Sales Return List</a></li>
                        <li><a href="createsalesreturn.html">Add Sales Return </a></li>
                        <li><a href="purchasereturnlist.html">Purchase Return List</a></li>
                        <li><a href="createpurchasereturn.html">Add Purchase Return </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/users1.svg')}}" alt="img"><span>
                            People</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('customer.index')}}">Customer List</a></li>
                        <li><a href="{{route('supplier.index')}}">Supplier List</a></li>
                        <li><a href="{{route('users.index')}}">Users List</a></li>
                    </ul>
                </li>


                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/time.svg')}}" alt="img"><span>
                            Report</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="purchaseorderreport.html">Purchase order report</a></li>
                        <li><a href="inventoryreport.html">Inventory Report</a></li>
                        <li><a href="salesreport.html">Sales Report</a></li>
                        <li><a href="invoicereport.html">Invoice Report</a></li>
                        <li><a href="purchasereport.html">Purchase Report</a></li>
                        <li><a href="supplierreport.html">Supplier Report</a></li>
                        <li><a href="customerreport.html">Customer Report</a></li>
                    </ul>
                </li>
            
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/settings.svg')}}" alt="img"><span>
                            Settings</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('warehouse.index')}}">Warehouse</a></li>
                        <li><a href="{{route('currency.index')}}">Currency</a></li>
                        <li><a href="{{route('units.index')}}">Unit Settings</a></li>
                        <li><a href="{{route('roles.index')}}">Group Permissions</a></li>
                        <li><a href="{{route('setting.system.manage','system')}}">System Settings</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>