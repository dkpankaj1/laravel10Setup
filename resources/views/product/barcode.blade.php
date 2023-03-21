<html>

<head>
    <link rel="stylesheet" href="{{asset('assets\css\barcode.css')}}">
</head>

<body>
    <div class="barcodea4">
        @for($i = 0; $i < 40; $i++) 
        <div class="barcode-item style40">
            <span class="barcode-name">{{$product->name}}</span>
             <div textmargin="0" fontoptions="bold" class="barcode">
                 {!! DNS1D::getBarcodeSVG($product->barcode, 'C128',1,35,'black',true) !!}
            </div>
        </div>
        @endfor
    </div>
</body>

</html>