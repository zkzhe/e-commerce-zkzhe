@extends('admin.admin_master')
@section('admin')

<!-- ########## START: MAIN PANEL ########## -->

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>產品列表</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-50">
        <h6 class="card-body-title">產品列表
            <a href="{{ route('add.product') }}" class="btn btn-sm btn-warning" style="float: right;">Add New</a>
        </h6>

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p">產品代碼</th>
                        <th class="wd-15p">產品名稱</th>
                        <th class="wd-15p">圖片</th>
                        <th class="wd-20p">類別</th>
                        <th class="wd-15p">品牌</th>
                        <th class="wd-15p">數量</th>
                        <th class="wd-15p">狀態</th>
                        <th class="wd-20p">行動</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $row)
                    <tr>
                        <td>{{ $row->product_code }}</td>
                        <td>{{ $row->product_name }}</td>
                        <td><img src="{{ URL::to($row->image_one) }}" height="80px" width="80px"></td>
                        <td>{{ $row->category_name }}</td>
                        <td>{{ $row->brand_name }}</td>
                        <td>{{ $row->product_quantity }}</td>
                        <td>
                            @if($row->status == 1)
                            <span class="badge badge-success"> Active </span>
                            @else
                            <span class="badge badge-danger"> Inactive </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ URL::to('admin/edit/product/'.$row->id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{ URL::to('admin/delete/product/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                            <a href="{{ URL::to('admin/view/product/'.$row->id) }}" class="btn btn-sm btn-warning" title="View"><i class="fa fa-eye"></i></a>
                            @if($row->status == 1)
                            <a href="{{ URL::to('admin/inactive/product/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" title="Inactive"><i class="fa fa-thumbs-down"></i></a>
                            @else
                            <a href="{{ URL::to('admin/active/product/'.$row->id) }}" class="btn btn-sm btn-info" id="delete" title="Active"><i class="fa fa-thumbs-up"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- table-wrapper -->
    </div><!-- card -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection