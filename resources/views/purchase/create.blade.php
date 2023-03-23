<x-app-layout>

    <x-slot name="header">
        <x-page-header title="New Purchase">
            {{Breadcrumbs::render('purchase.create')}}
        </x-page-header>
    </x-slot>

    {{-- :: Begin Section :: --}}


    <div class="card">
        <div class="card-body">
            <div class="row">
                {{-- Supplier select --}}
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Supplier Name</label>
                        <select class="select">
                            <option>Select</option>
                            <option>Supplier</option>
                        </select>
                    </div>
                </div>
                {{-- ------------ --}}

                {{-- werehoush select --}}
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Werehoush</label>
                        <select class="select">
                            <option>Select</option>
                            <option>Supplier</option>
                        </select>
                    </div>
                </div>
                {{-- ------------ --}}

                {{-- Purchase Date Input --}}
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Purchase Date </label>
                        <div class="input-groupicon">
                            <input type="text" placeholder="DD-MM-YYYY" class="datetimepicker" />
                            <div class="addonset">
                                <img src="{{asset('assets/img/icons/calendars.svg')}}" alt="img" />
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ------------ --}}

                {{-- refrence number input --}}
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Reference No.</label>
                        <input type="text" />
                    </div>
                </div>
                {{-- ---------- --}}

                {{-- product search input --}}
                <div class="col-lg-12 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Product Name</label>
                        <div class="input-groupicon">
                            <input type="text" placeholder="Scan/Search Product by code and select...">
                            <div class="addonset">
                                <img src="{{asset('assets/img/icons/scanners.svg')}}" alt="img">
                            </div>
                        </div>
                        <ul id="suggestion-list">
                            <li>English Book | Supplyer-101 | PRC:320</li>
                            <li>Hindi Book | Supplyer-101 | PRC:320</li>
                            <li>Mathe Book | Supplyer-101 | PRC:320</li>
                        </ul>
                    </div>
                </div>
                {{-- product search input --}}

            </div>



            {{-- Begin Purchase Detail  --}}

            <div class="row">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>QTY</th>
                                <th>Purchase Price($)</th>
                                <th>Discount($)</th>
                                <th>Tax %</th>
                                <th>Tax Amount($)</th>
                                <th class="text-end">
                                    Unit Cost($)
                                </th>
                                <th class="text-end">
                                    Total Cost ($)
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="assets/img/product/product7.jpg" alt="product" />
                                    </a>
                                    <a href="javascript:void(0);">Apple Earpods</a>
                                </td>
                                <td>10.00</td>
                                <td>2000.00</td>
                                <td>500.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td class="text-end">
                                    2000.00
                                </td>
                                <td class="text-end">
                                    2000.00
                                </td>
                                <td>
                                    <a class="delete-set"><img src="{{asset('assets/img/icons/delete.svg')}}" alt="svg" /></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="{{asset('assets/img/product/product6.jpg')}}" alt="product" />
                                    </a>
                                    <a href="javascript:void(0);">Macbook Pro</a>
                                </td>
                                <td>15.00</td>
                                <td>6000.00</td>
                                <td>100.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td class="text-end">
                                    1000.00
                                </td>
                                <td class="text-end">
                                    1000.00
                                </td>
                                <td>
                                    <a class="delete-set"><img src="assets/img/icons/delete.svg" alt="svg" /></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 float-md-right">
                    <div class="total-order">
                        <ul>
                            <li>
                                <h4>Order Tax</h4>
                                <h5>$ 0.00 (0.00%)</h5>
                            </li>
                            <li>
                                <h4>Discount</h4>
                                <h5>$ 0.00</h5>
                            </li>
                            <li>
                                <h4>Shipping</h4>
                                <h5>$ 0.00</h5>
                            </li>
                            <li class="total">
                                <h4>Grand Total</h4>
                                <h5>$ 0.00</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Begin purchase amount section --}}
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Order Tax</label>
                        <input type="text" />
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Discount</label>
                        <input type="text" />
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Shipping</label>
                        <input type="text" />
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="select">
                            <option>Choose Status</option>
                            <option>Completed</option>
                            <option>Inprogress</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
                    <a href="purchaselist.html" class="btn btn-cancel">Cancel</a>
                </div>
            </div>
            {{-- End purchase amount section --}}

            {{-- End Purchase Detail  --}}
        </div>
    </div>

    {{-- :: End Section :: --}}

    @section('page_css')
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
    @endsection

    @section('page_script')
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script>
        $('.preventHitEnter').keypress(function(event) {
            if (event.keyCode === 10 || event.keyCode === 13) {
                event.preventDefault();
            }
        });

    </script>
    @endsection
</x-app-layout>
