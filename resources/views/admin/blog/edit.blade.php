@extends('admin.admin_master')
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
@section('admin')

@php
$blogCategory = DB::table('post_category')->get();
@endphp
<div class="sl-pagebody">

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Post Update</h6>
        <a href="{{ route('all.blogpost') }}" class="btn btn-success btn-sm pull-right"> All Post</a>

        <form method="post" action="{{ url('admin/update/post/'.$post->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Post Title (English): <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="post_title_en" placeholder="Enter Post Title in English" value="{{ $post->post_title_en }}">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Post Title (Taiwan): <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="post_title_tw" placeholder="Enter Post Title in Taiwan" value="{{ $post->post_title_tw }}">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Blog Category: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                                <option label="Choose Category"></option>
                                @foreach($blogCategory as $row)
                                <option value="{{ $row->id }}" <?php
                                                                if ($row->id == $post->category_id) {
                                                                    echo "selected";
                                                                }
                                                                ?>>
                                    {{ $row->category_name_en }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Product Datails (English): <span class="tx-danger">*</span></label>
                            <textarea class="form-control" id="summernote" name="details_en">
                            {!! $post->details_en !!}
                            </textarea>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Product Datails (Taiwan): <span class="tx-danger">*</span></label>
                            <textarea class="form-control" id="summernote1" name="details_tw">
                            {!! $post->details_tw !!}
                            </textarea>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Post Image: <span class="tx-danger">*</span></label>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL1(this);" require="">
                                <span class="custom-file-control"></span>
                            </label>
                        </div>
                        <img src="#" id="one">
                    </div><!-- col-4 -->


                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Old Post Image: <span class="tx-danger">*</span></label>
                            <label class="custom-file">
                            </label>
                        </div>
                        <img src="{{ URL::to($post->post_image) }}" style="height: 80px; width: 130px;">
                        <input type="hidden" name="old_image" value="{{ $post->post_image }}">
                    </div><!-- col-4 -->

                </div><!-- row -->
                <hr>
                <br><br>
                <div class="row">

                </div><!-- end row -->
                <br><br>
                <div class="form-layout-footer">
                    <button class="btn btn-info mg-r-5" type="submit">Submit Form</button>
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