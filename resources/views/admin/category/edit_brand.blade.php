@extends('admin.admin_master')
@section('admin')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Brand Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Brand Update
            </h6>
            <div class="table-wrapper">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ url('admin/update/brand/'.$brand->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pd-20">
                        <div class="form-group">
                            <label for="exampleInputEmail1">品牌名稱</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$brand->brand_name}}" name="brand_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">品牌 LOGO</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$brand->brand_logo}}" name="brand_logo">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">舊品牌 LOGO</label>
                            <img src="{{ url('media/brand/'.$brand->brand_logo) }}" height="70px" width="90px">
                            <imput type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">更新</button>
                    </div>
                </form>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- sl-mainpanel -->


    @endsection