<x-app-layout>

    <x-slot name="header">

        <x-page-header-with-btn>

            <x-slot name="title">User Management</x-slot>

            <x-slot name="breadcrumbs">
                {{Breadcrumbs::render('users')}}
            </x-slot>

            <a class="btn btn-added" href="{{route('users.create')}}"><img src="assets/img/icons/plus.svg" alt="img"
                    class="me-1" />Add New User</a>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Login Enable</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>USR#{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->login_enable ? "Enable" : "Disable"}}</td>
                            <td class="text-end">
                                <a class="me-3" href="{{route('users.edit',$user)}}">
                                    <img src="assets/img/icons/edit.svg" alt="img" />
                                </a>
                                @if($user->role != 'super admin')
                                <a class="me-3 d3l3t3btn" data-attr="{{route('users.delete',$user)}}">
                                    <img src="assets/img/icons/delete.svg" alt="img" />
                                </a>
                                @endif
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