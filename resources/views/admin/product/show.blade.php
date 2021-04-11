@extends('admin.admin_master')
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
@section('admin')
<div class="sl-pagebody">

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Product Details Page</h6>

        <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">產品名稱: <span class="tx-danger">*</span></label>
                        <br><strong>{{ $product->product_name }}</strong>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">產品代碼: <span class="tx-danger">*</span></label>
                        <br><strong>{{ $product->product_code }}</strong>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">數量: <span class="tx-danger">*</span></label>
                        <br><strong>{{ $product->product_quantity }}</strong>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">類別:<span class="tx-danger">*</span></label>
                        <br><strong>{{ $product->category_name }}</strong>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">子類別: <span class="tx-danger">*</span></label>
                        <br><strong>{{ $product->subcategory_name }}</strong>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">品牌:<span class="tx-danger">*</span></label>
                        <br><strong>{{ $product->brand_name }}</strong>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">產品尺寸: <span class="tx-danger">*</span></label>
                        <br><strong>{{ $product->product_size }}</strong>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">產品顏色: <span class="tx-danger">*</span></label>
                        <br><strong>{{ $product->product_color }}</strong>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">價格:  <span class="tx-danger">*</span></label>
                        <br><strong>{{ $product->selling_price }}</strong>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">產品介紹:  <span class="tx-danger">*</span></label>
                        <br><strong>{!! $product->product_details !!}</strong>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">影片連結:  <span class="tx-danger">*</span></label>
                        <br>
                        <p>{{ $product->video_link }}</p>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Image One ( Main Thumbnali): <span class="tx-danger">*</span></label>
                        <br>
                        <label class="custom-file">
                            <img src="{{ URL::to($product->image_one) }}" style="height: 80px ; width: 80px">
                        </label>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                        <br>
                        <label class="custom-file">
                            <img src="{{ URL::to($product->image_two) }}" style="height: 80px ; width: 80px">
                        </label>
                    </div>

                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                        <br>
                        <label class="custom-file">
                            <img src="{{ URL::to($product->image_three) }}" style="height: 80px ; width: 80px">
                        </label>
                    </div>

                </div><!-- col-4 -->
            </div><!-- row -->
            <hr>
            <br><br>
            <div class="row">
                <div class="col-lg-4">
                    @if($product->main_slider == 1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                    <span>主滑塊</span>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    @if($product->hot_deal == 1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                    <span>特價促銷</span>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    @if($product->best_rated == 1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                    <span>最佳評分</span>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    @if($product->trend == 1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                    <span>趨勢產品</span>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    @if($product->mid_slider == 1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                    <span>中滑塊</span>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    @if($product->hot_new == 1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                    <span>熱門</span>
                </div><!-- col-4 -->

            </div><!-- end row -->
        </div><!-- form-layout -->

    </div><!-- sl-pagebody -->

    @endsection