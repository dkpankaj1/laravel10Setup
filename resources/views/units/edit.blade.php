<x-app-layout>

    <x-slot name="header">
        <x-page-header title="Edit Unit">
            {{Breadcrumbs::render('units.edit',$productUnit)}}
        </x-page-header>
    </x-slot>

    {{-- :: Begin Section :: --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('units.update',$productUnit)}}" method="POST">
                        @csrf
                        @method('put')

                        {{-- :: Begin name Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " placeholder="Unit Name" name="name"
                                    value="{{old('name',$productUnit->name)}}">
                                @error('name')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End name Input --}}

                        {{-- :: Begin short name Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Short Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " placeholder="Short Name" name="short_name"
                                    value="{{old('short_name',$productUnit->short_name)}}">
                                @error('short_name')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End short name Input --}}

                        {{-- :: Begin base Unit Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Base Unit</label>
                            <div class="col-lg-9">
                                <select class="select" name="base_unit">
                                    <option value="">Choose Base Unit</option>
                                    @foreach($units as $unit)
                                    <option value="{{$unit->id}}" @if(old('base_unit',$productUnit->base_unit)==$unit->id) selected="selected" @endif>
                                        {{$unit->name}} [ {{$unit->short_name}} ]</option>
                                    @endforeach
                                </select>
                                @error('base_unit')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- :: End base Unit Input --}}


                        {{-- :: Begin operator Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Operator</label>
                            <div class="col-lg-9">
                                <select class="select" name="operator">
                                    <option value="">Choose Operator</option>
                                    @foreach($operatorList as $item)
                                    <option value="{{$item}}" @if(old('operator',$productUnit->operator)==$item) selected="selected" @endif>
                                        {{$item}}</option>
                                    @endforeach
                                </select>
                                @error('operator')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- :: End operator Input --}}

                        {{-- :: Begin name Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Note</label>
                            <div class="col-lg-9">
                                <textarea class="form-control " placeholder="A Few Words.."
                                    name="description">{{old('description',$productUnit->description)}}</textarea>
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