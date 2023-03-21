<x-app-layout>

    <x-slot name="header">
        <x-page-header-with-btn>
            <x-slot name="title">Units Settings</x-slot>
            <x-slot name="breadcrumbs">
                {{Breadcrumbs::render('units.index')}}
            </x-slot>

            @can('units.create')
            <a class="btn btn-added" href="{{route('units.create')}}"><img src="assets/img/icons/plus.svg" alt="img"
                    class="me-1" />Add New Unit</a>
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
                            <th>Unit name</th>
                            <th>Short Name</th>
                            <th>Operator</th>
                            <th>Base Unit</th>
                            <th>Description</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($units as $unit)

                        <tr>
                            <td>UNT#{{$unit->id}}</td>
                            <td>{{$unit->name}}</td>
                            <td>{{$unit->short_name}}</td>
                            <td>{{$unit->operator}}</td>
                            <td>
                                @if(!is_null($unit->baseUnit))
                                {{$unit->baseUnit->name}}
                                @endif
                            </td>
                            <td>{{$unit->description}}</td>
                            <td class="text-end">
                                @can('units.edit')
                                <a class="me-3" href="{{route('units.edit',$unit)}}">
                                    <img src="assets/img/icons/edit.svg" alt="img" />
                                </a>
                                @endcan

                                @can('units.delete')
                                <a class="me-3 d3l3t3btn" data-attr="{{route('units.delete',$unit)}}">
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