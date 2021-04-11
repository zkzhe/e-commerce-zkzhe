@extends('admin.admin_master')
@section('admin')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Category Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Category Update
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
                <form method="post" action="{{ url('admin/update/category/'.$category->id) }}">
                    @csrf
                    <div class="modal-body pd-20">
                        <div class="form-group">
                            <label for="exampleInputEmail1">類別名稱</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$category->category_name}}" name="category_name">
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