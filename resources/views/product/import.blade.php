<x-app-layout>

    <x-slot name="header">
        <x-page-header title="Import Product">
            {{Breadcrumbs::render('product.import')}}
        </x-page-header>
    </x-slot>

    {{-- :: Begin Section :: --}}


    <div class="card">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="requiredfield">
                    <h4>Field must be in excle format</h4>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <a href="{{route('product.download.sample')}}"" class="btn btn-submit w-100">Download Sample File</a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label> Upload EXCLE File</label>
                            @error('file')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="image-upload">
                                <input type="file" name="file" id="file-upload" />
                                <div class="image-uploads">
                                    <img src="{{asset('assets/img/icons/upload.svg')}}" alt="img" />
                                    <h4 id="file-name">
                                        Drag and drop a file to
                                        upload
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="productdetails productdetailnew">
                            <ul class="product-bar">
                                <li>
                                    <h4>Product Name</h4>
                                    <h6 class="manitorygreen">
                                        This Field is required
                                    </h6>
                                </li>
                                <li>
                                    <h4>Category</h4>
                                    <h6 class="manitorygreen">
                                        This Field is required
                                    </h6>
                                </li>
                                <li>
                                    <h4>Product code</h4>
                                    <h6 class="manitorygreen">
                                        This Field is required
                                    </h6>
                                </li>
                                <li>
                                    <h4>Barcode</h4>
                                    <h6 class="manitorygreen">
                                        This Field is required
                                    </h6>
                                </li>
                                <li>
                                    <h4>Barcode Type</h4>
                                    <h6 class="manitorygreen">
                                        This Field is required
                                    </h6>
                                </li>
                                <li>
                                    <h4>Product Cost</h4>
                                    <h6 class="manitorygreen">
                                        This Field is required
                                    </h6>
                                </li>
                                <li>
                                    <h4>Product Price</h4>
                                    <h6 class="manitorygreen">
                                        This Field is required
                                    </h6>
                                </li>
                                <li>
                                    <h4>Product Unit</h4>
                                    <h6 class="manitorygreen">
                                        This Field is required
                                    </h6>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="productdetails productdetailnew">
                            <ul class="product-bar">
                                <li>
                                    <h4>Stock Alert</h4>
                                    <h6 class="manitorygreen">
                                        This Field is required
                                    </h6>
                                </li>
                                <li>
                                    <h4>Purchase Unit</h4>
                                    <h6 class="manitorygreen">
                                        This Field is required
                                    </h6>
                                </li>
                                <li>
                                    <h4>Sell Unit</h4>
                                    <h6 class="manitorygreen">
                                        This Field is required
                                    </h6>
                                </li>
                                <li>
                                    <h4>Discount Type</h4>
                                    <h6 class="manitorygreen">
                                        This Field is required
                                    </h6>
                                </li>
                                <li>
                                    <h4>Discount</h4>
                                    <h6 class="manitorygreen">
                                        This Field is required
                                    </h6>
                                </li>
                                <li>
                                    <h4>Tex Type</h4>
                                    <h6 class="manitorygreen">
                                        This Field is required
                                    </h6>
                                </li>
                                <li>
                                    <h4>Product Tex</h4>
                                    <h6 class="manitorygreen">
                                        This Field is required
                                    </h6>
                                </li>
                                <li>
                                    <h4>Description</h4>
                                    <h6 class="manitoryblue">
                                        Field optional
                                    </h6>
                                </li>
                                <li>
                                    <h4>Session ID</h4>
                                    <h6 class="manitorygreen">
                                        This Field is required
                                    </h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <button type="reset" class="btn btn-cancel">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- :: End Section :: --}}

    @section('page_script')
    <script>
        $("#file-upload").change(function(){
            $("#file-name").text(this.files[0].name);
        });
    </script>
    @endsection
</x-app-layout>