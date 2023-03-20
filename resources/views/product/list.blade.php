<x-app-layout>

    <x-slot name="header">

        <x-page-header-with-btn>

            <x-slot name="title">Manage Product</x-slot>

            <x-slot name="breadcrumbs">
                {{Breadcrumbs::render('product')}}
            </x-slot>

            <a class="btn btn-added" href="{{route('product.create')}}"><img src="assets/img/icons/plus.svg" alt="img"
                    class="me-1" />Add New Currency</a>
        </x-page-header-with-btn>

    </x-slot>

    {{-- :: Begin Section :: --}}

    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-input">
                        <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img" /></a>
                    </div>
                </div>
                <div class="wordset">
                    <ul>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                    src="assets/img/icons/pdf.svg" alt="img" /></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" href="{{route('product.export.excle')}}" data-bs-placement="top" title="excel"><img
                                    src="assets/img/icons/excel.svg" alt="img" /></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                    src="assets/img/icons/printer.svg" alt="img" /></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Cost</th>
                            <th>Price</th>
                            <th>Order Tex</th>
                            <th>tex Type</th>
                            <th>Discount</th>
                            <th>Stoke Alert</th>
                            <th>Product Unit</th>
                            <th>Purchage Unit</th>
                            <th>Sell Unit</th>
                            <th>Categorie</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($showProduct as $product)
                        <tr>
                            <td>{{$product->code}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->cost}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->order_tex}}</td>
                            <td>{{$product->tex_type}}</td>
                            <td>{{$product->discount}}</td>
                            <td>{{$product->stock_alert}}</td>
                            <td>{{$product->product_unit}}</td>
                            <td>{{$product->purchase_unit}}</td>
                            <td>{{$product->sell_unit}}</td>
                            <td>{{$product->category}}</td>
                            <td class="text-end">
                                <a class="me-3" href="{{route('product.edit',$product)}}">
                                    <img src="assets/img/icons/edit.svg" alt="img" />
                                </a>
                                <a class="me-3 d3l3t3btn" data-attr="{{route('product.delete',$product)}}">
                                    <img src="assets/img/icons/delete.svg" alt="img" />
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- :: End Section :: --}}

    @section('page_script')
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/loadingoverlay/loadingoverlay.min.js')}}"></script>
    <script src="{{asset('assets/js/confirm-delete.min.js')}}"></script>
    @endsection
</x-app-layout>