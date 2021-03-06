@extends('admin.admin_master')
@section('admin')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>帖子列表</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Post List
                <a href="{{ route('add.blogpost') }}" class="btn btn-sm btn-warning" style="float: right;">Add New Post</a>
            </h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">標題</th>
                            <th class="wd-15p">Post Category</th>
                            <th class="wd-15p">圖片</th>
                            <th class="wd-20p">行動</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $key => $value)
                        <tr>
                            <td>{{ $value->post_title_en }}</td>
                            <td>{{ $value->category_name_en }}</td>
                            <td><img src="{{ URL::to($value->post_image) }}" style="height: 50px; width: 50px;"></td>
                            <td>
                                <a href="{{ URL::to('admin/edit/post/'.$value->id) }}" class="btn btn-sm btn-info">編輯</a>
                                <a href="{{ URL::to('admin/delete/post/'.$value->id) }}" class="btn btn-sm btn-danger" id="delete">刪除</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
</div><!-- modal -->

@endsection