@extends('admin.admin_master')
@section('admin')

<div class="sl-mainpanel">


    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>訂單明細</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">列表</h6>


            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">名稱</th>
                            <th class="wd-15p">手機號碼</th>
                            <th class="wd-15p">信箱</th>
                            <th class="wd-20p">訊息</th>
                            <th class="wd-20p">行動</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($message as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->email }} </td>
                            <td>{{ $row->message }} </td>


                            <td>
                                <a href=" " class="btn btn-sm btn-info">查看</a>

                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-mainpanel -->
</div>
@endsection