<x-app-layout>

    <x-slot name="header">

        <x-page-header-with-btn>

            <x-slot name="title">Warehouse Settings</x-slot>

            <x-slot name="breadcrumbs">
                {{Breadcrumbs::render('warehouse.index')}}
            </x-slot>

            <a class="btn btn-added" href="{{route('warehouse.create')}}"><img src="assets/img/icons/plus.svg" alt="img"
                    class="me-1" />Add New Warehouse</a>
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
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
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
                            <th>ID</th>
                            <th>Warehouse name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($warehouses as $warehouse)
                        <tr>
                            <td>WH#{{$warehouse->id}}</td>
                            <td>{{$warehouse->name}}</td>
                            <td>{{$warehouse->email}}</td>
                            <td>{{$warehouse->phone}}</td>
                            <td>{{$warehouse->address}}</td>
                            <td>{{$warehouse->description}}</td>
                            <td class="text-end">
                                <a class="me-3" href="{{route('warehouse.edit',$warehouse)}}">
                                    <img src="assets/img/icons/edit.svg" alt="img" />
                                </a>
                                <a class="me-3 d3l3t3btn" data-attr="{{route('warehouse.delete',$warehouse)}}">
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