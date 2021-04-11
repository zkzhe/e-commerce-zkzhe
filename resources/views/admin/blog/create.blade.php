@extends('admin.admin_master')
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
@section('admin')
<div class="sl-pagebody">

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">New Post ADD</h6>
        <a href="{{ route('all.blogpost') }}" class="btn btn-success btn-sm pull-right"> All Post</a>
        <p class="mg-b-20 mg-sm-b-30">New Post ADD Form</p>

        <form method="post" action="{{ route('store.blogpost') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">標題 (English): <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="post_title_en" placeholder="Enter Post Title in English">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">標題 (Taiwan): <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="post_title_tw" placeholder="Enter Post Title in Taiwan">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">部落格 類別: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                                <option label="Choose Category"></option>
                                @foreach($blogCategory as $row)
                                <option value="{{ $row->id }}">{{ $row->category_name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">產品詳情(English): <span class="tx-danger">*</span></label>
                            <textarea class="form-control" id="summernote" name="details_en"></textarea>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">產品詳情(Taiwan): <span class="tx-danger">*</span></label>
                            <textarea class="form-control" id="summernote1" name="details_tw"></textarea>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Post 圖片: <span class="tx-danger">*</span></label>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL1(this);" require="">
                                <span class="custom-file-control"></span>
                            </label>
                        </div>
                        <img src="#" id="one">
                    </div><!-- col-4 -->

                </div><!-- row -->
                <hr>
                <br><br>
                <div class="row">

                </div><!-- end row -->
                <br><br>
                <div class="form-layout-footer">
                    <button class="btn btn-info mg-r-5" type="submit">提交表格</button>
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->

        </form>

    </div><!-- sl-pagebody -->

    <script type="text/javascript">
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    @endsection