<x-app-layout>

    <x-slot name="header">
        <x-page-header title="Edit Product">
            {{Breadcrumbs::render('product.edit',$product)}}
        </x-page-header>
    </x-slot>

    {{-- :: Begin Section :: --}}


    <div class="card">
        <div class="card-body">
            <form action="{{route('product.update',$product)}}" method="POST">
                @csrf
                @method('put')

                <div class="row">

                    {{-- :: Begin Product name Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="name" placeholder="Ente Product name" value="{{old('name',$product->name)}}" />
                            @error('name')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- :: End Product name Input :: --}}

                    {{-- :: Begin Product code Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Product Code</label>
                            <input type="text" name="code" placeholder="Ente Product code" value="{{old('code',$product->code)}}" />
                            @error('code')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- :: End Product code Input :: --}}

                    {{-- :: Begin Product barcode Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>BarCode</label>
                            <input type="text" name="barcode" placeholder="Product Barcode"
                                value="{{old('barcode',$product->barcode)}}" />
                            @error('barcode')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- :: End Product barcode Input :: --}}

                    {{-- :: Begin Product category Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Barcode Type</label>
                            <select class="select" name="barcode_type">
                                <option value="">Choose Barcode Type</option>
                                @foreach($barcodeTypes as $item)
                                <option value="{{$item->id}}" @if(old('barcode_type',$product->barcode_type_id) == $item->id) selected="selected"
                                    @endif >{{$item->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('barcode_type')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- :: End Product category Input :: --}}


                    {{-- :: Begin Product category Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="select" name="category">
                                <option value="">Choose Catagory</option>
                                @foreach($categories as $item)
                                <option value="{{$item->id}}" @if(old('category',$product->category_id)==$item->id) selected="selected"
                                    @endif >{{$item->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- :: End Product category Input :: --}}


                    {{-- :: Begin Product unit Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Unit</label>
                            <select class="select" name="product_unit">
                                <option value="">Choose Unit</option>
                                @foreach($ProductUnits as $item)
                                <option value="{{$item->id}}" @if(old('product_unit',$product->product_unit_id)==$item->id) selected="selected"
                                    @endif >{{$item->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('product_unit')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- :: End Product unit Input :: --}}

                    {{-- :: Begin Product Purchase unit Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Purchase Unit</label>
                            <select class="select" name="purchase_unit">
                                <option value="">Choose Unit</option>
                                @foreach($ProductUnits as $item)
                                <option value="{{$item->id}}" @if(old('purchase_unit',$product->purchase_unit_id)==$item->id)
                                    selected="selected" @endif >{{$item->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('purchase_unit')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- :: End Product Purchase unit Input :: --}}

                    {{-- :: Begin Product sell unit Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Sell Unit</label>
                            <select class="select" name="sell_unit">
                                <option value="">Choose Unit</option>
                                @foreach($ProductUnits as $item)
                                <option value="{{$item->id}}" @if(old('sell_unit',$product->sell_unit_id)==$item->id) selected="selected"
                                    @endif >{{$item->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('sell_unit')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- :: End Product sell unit Input :: --}}

                    {{-- :: Begin Product cost Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Product Cost</label>
                            <input type="text" name="cost" value="{{old('cost',$product->cost)}}" placeholder="Enter Product Cost" />
                            @error('cost')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- :: End Product cost Input :: --}}

                    {{-- :: Begin Product price Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="text" value="{{old('price',$product->price)}}" placeholder="Enter Product Price"
                                name="price" />
                            @error('price')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- :: End Product price Input :: --}}

                    {{-- :: Begin Order Tex Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Order Tex</label>
                            <div class="input-group">
                                <input type="text" value="{{old('order_tex',$product->order_tex)}}" class="form-control"
                                    placeholder="Enate Orcer Tex" name="order_tex" />
                                <span class="input-group-text">%</span>
                            </div>
                            @error('order_tex')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- :: End Order Tex Input :: --}}

                    {{-- :: Begin Product Purchase unit Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Tex Type</label>
                            <select class="select" name="tex_type">
                                <option value="">Choose Tex Type</option>
                                @foreach($texTypes as $item)
                                <option value="{{$item->id}}" @if(old('tex_type',$product->tex_type_id)==$item->id) selected="selected" @endif
                                    >{{$item->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('tex_type')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- :: End Product Purchase unit Input :: --}}


                    {{-- :: Begin discount Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Discount</label>
                            <div class="input-group">
                                <input type="text" class="form-control " value="{{old('discount',$product->discount)}}"
                                    placeholder="Enate Product discount" name="discount" />
                                <span class="input-group-text">%</span>
                            </div>
                            @error('sell_unit')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- :: Enddiscount Input :: --}}

                    {{-- :: Begin Stock alert Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Stock Alert</label>
                            <input type="text" name="stock_alert" value="{{old('stock_alert',$product->stock_alert)}}"
                                placeholder="Set Stock Alert" />
                            @error('stock_alert')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- :: End Stock alert Input :: --}}

                    {{-- :: Begin Product Name Input :: --}}
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description"
                                placeholder="A Few Word">{{old('description',$product->description)}}</textarea>
                        </div>
                    </div>
                    {{-- :: End Product Name Input :: --}}


                    {{-- :: Begin Product Name Input :: --}}
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Update</button>
                    </div>
                    {{-- :: End Product Name Input :: --}}
                </div>

            </form>
        </div>
    </div>

    {{-- :: End Section :: --}}

    @section('page-script')
    <script>
        $('.preventHitEnter').keypress(function (event) {
            if (event.keyCode === 10 || event.keyCode === 13) {
                event.preventDefault();
            }
        });
    </script>
    @endsection
</x-app-layout>