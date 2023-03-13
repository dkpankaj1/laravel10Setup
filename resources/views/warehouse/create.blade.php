<x-app-layout>

    <x-slot name="header">
        <x-page-header title="Create New Warehouse">
            {{Breadcrumbs::render('warehouse.create')}}
        </x-page-header>
    </x-slot>

    {{-- :: Begin Section :: --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('warehouse.store')}}" method="POST">
                        @csrf

                        {{-- :: Begin name Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " placeholder="Enter warehouse Name" name="name"
                                    value="{{old('name')}}">
                                @error('name')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End name Input --}}

                        {{-- :: Begin name Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Email</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " placeholder="example@email.com" name="email"
                                    value="{{old('email')}}">
                                @error('email')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End name Input --}}

                        {{-- :: Begin name Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Phone</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " placeholder="+91 97xxxxx940"
                                    name="phone" value="{{old('phone')}}">
                                @error('phone')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End name Input --}}

                        {{-- :: Begin name Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Address</label>
                            <div class="col-lg-9">
                                <textarea class="form-control " placeholder="Example, XYZ Address - 27XX49"
                                    name="address">{{old('address')}}</textarea>
                                @error('address')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End name Input --}}
                         {{-- :: Begin name Input --}}
                         <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Notes</label>
                            <div class="col-lg-9">
                                <textarea class="form-control " placeholder="A Few Words.."
                                    name="description">{{old('description')}}</textarea>
                                @error('description')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End name Input --}}

                        <hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-submit">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- :: End Section :: --}}

    @section('page_script')
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    @endsection

</x-app-layout>