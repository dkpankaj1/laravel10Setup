<x-app-layout>

    <x-slot name="header">

        <x-page-header-with-btn>

            <x-slot name="title">Currency Settings</x-slot>

            <x-slot name="breadcrumbs">
                {{Breadcrumbs::render('currency')}}
            </x-slot>

            @can('currency.create')
            <a class="btn btn-added" href="{{route('currency.create')}}"><img src="assets/img/icons/plus.svg" alt="img"
                    class="me-1" />Add New Currency</a>
            @endcan
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
                            <th>Currency name</th>
                            <th>Currency code</th>
                            <th>Currency symbol</th>
                            <th>Description</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($curencys as $curency)
                        <tr>
                            <td>CUR#{{$curency->id}}</td>
                            <td>{{$curency->name}}</td>
                            <td>{{$curency->code}}</td>
                            <td>{{$curency->symbol}}</td>
                            <td>{{$curency->description}}</td>
                            <td class="text-end">

                                @can('currency.edit')
                                <a class="me-3" href="{{route('currency.edit',$curency)}}">
                                    <img src="assets/img/icons/edit.svg" alt="img" />
                                </a>
                                @endcan

                                @can('currency.delete')
                                <a class="me-3 d3l3t3btn" data-attr="{{route('currency.delete',$curency)}}">
                                    <img src="assets/img/icons/delete.svg" alt="img" />
                                </a>
                                @endcan
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