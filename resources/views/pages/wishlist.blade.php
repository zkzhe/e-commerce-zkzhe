@extends('layouts.app')

@section('content')
@include('layouts.menubar')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_responsive.css') }}">

<!-- Cart -->

<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart_container">
                    <div class="cart_title">你的願望產品</div>
                    <div class="cart_items">
                        <ul class="cart_list">

                            @foreach($product as $row)

                            <li class="cart_item clearfix">
                                <div class="cart_item_image text-center"><br><img src="{{ asset($row->image_one) }}" style="width: 70px; height: 70px;" alt=""></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">名稱</div>
                                        <div class="cart_item_text">{{ $row->product_name }}</div>
                                    </div>

                                    @if($row->product_color == NULL)

                                    @else
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">顏色</div>
                                        <div class="cart_item_text">{{ $row->product_color }}</div>
                                    </div>
                                    @endif

                                    @if($row->product_size == NULL)

                                    @else
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">尺寸</div>
                                        <div class="cart_item_text">{{ $row->product_size }}</div>
                                    </div>
                                    @endif
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">行動</div><br>
                                        <a href="#" class="btn btn-sm btn-danger">添加至購物車</a>
                                    </div>
                                </div>
                            </li>

                            @endforeach

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('frontend/js/cart_custom.js') }}"></script>

@endsection