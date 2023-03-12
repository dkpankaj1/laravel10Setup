<x-app-layout>

    <x-slot name="header">
        <x-page-header title="Create New Currency">
            {{Breadcrumbs::render('currency.create')}}
        </x-page-header>
    </x-slot>

    {{-- :: Begin Section :: --}}

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('currency.store')}}" method="POST">
                        @csrf

                        {{-- :: Begin name Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " placeholder="Enter Currency Name" name="name"
                                    value="{{old('name')}}">
                                @error('name')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End name Input --}}

                        {{-- :: Begin name Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Code</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " placeholder="Enter Currency Code" name="code"
                                    value="{{old('code')}}">
                                @error('code')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End name Input --}}

                        {{-- :: Begin name Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Sybmol</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " placeholder="Enter Currency Symbol"
                                    name="symbol" value="{{old('symbol')}}">
                                @error('symbol')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End name Input --}}

                        {{-- :: Begin name Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Note</label>
                            <div class="col-lg-9">
                                <textarea class="form-control " placeholder="A Few Words.."
                                    name="description">{{old('description')}}</textarea>
                                @error('description')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End name Input --}}

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Save</button>
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