@extends('admin.admin_master')
@section('admin')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>子分類表</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">子分類表
                <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a>
            </h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">子類別名稱</th>
                            <th class="wd-15p">類別名稱</th>
                            <th class="wd-20p">行動</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->subcategory_name}}</td>
                            <td>{{ $value->category_name}}</td>
                            <td>
                                <a href="{{ URL::to('admin/edit/subcategory/'.$value->id) }}" class="btn btn-sm btn-info">編輯</a>
                                <a href="{{ URL::to('admin/delete/subcategory/'.$value->id) }}" class="btn btn-sm btn-danger" id="delete">刪除</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!-- LARGE MODAL -->
    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Sub Category Add</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('admin.store.subcategories') }}">
                    @csrf
                    <div class="modal-body pd-20">
                        <div class="form-group">
                            <label for="exampleInputEmail1">類別名稱</label>
                            <select class="form-control" name="category_id">
                                @foreach($category as $row)
                                <option value="{{ $row->id }}"> {{ $row->category_name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">子類別名稱</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sub Category" name="subcategory_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">提交</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">關閉</button>
                    </div>
                </form>
            </div><!-- modal-body -->
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

@endsection