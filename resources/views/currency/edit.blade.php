<x-app-layout>

    <x-slot name="header">
        <x-page-header title="Edit Currency Detail">
            {{Breadcrumbs::render('currency.edit',$currency)}}
        </x-page-header>
    </x-slot>

    {{-- :: Begin Section :: --}}

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('currency.update',$currency)}}" method="POST">
                        @csrf
                        @method('put')

                        {{-- :: Begin name Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " placeholder="Enter Currency Name" name="name"
                                    value="{{old('name',$currency->name)}}">
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
                                    value="{{old('code',$currency->code)}}">
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
                                    name="symbol" value="{{old('symbol', $currency->symbol)}}">
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
                                    name="description">{{old('description',$currency->description)}}</textarea>
                                @error('description')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End name Input --}}

                        <hr>

                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-submit">Update</button>
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