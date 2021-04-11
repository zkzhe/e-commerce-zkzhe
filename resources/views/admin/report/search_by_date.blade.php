@extends('admin.admin_master')
@section('admin')

<div class="sl-mainpanel">


    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>This Date Report</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title"> <span class="badge badge-success">
                    <h5> Total Amount This Date $ {{ $total }}</h5>
                </span> </h6>


            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">付款方式</th>
                            <th class="wd-15p">交易編號</th>
                            <th class="wd-15p">小計</th>
                            <th class="wd-20p">運輸</th>
                            <th class="wd-20p">總計</th>
                            <th class="wd-20p">日期</th>
                            <th class="wd-20p">狀態</th>
                            <th class="wd-20p">行動</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $row)
                        <tr>
                            <td>{{ $row->payment_type }}</td>
                            <td>{{ $row->blnc_transection }}</td>
                            <td>{{ $row->subtotal }} $</td>
                            <td>{{ $row->shipping }} $</td>
                            <td>{{ $row->total }} $</td>
                            <td>{{ $row->date }} </td>

                            <td>
                                @if($row->status == 0)
                                <span class="badge badge-warning">待處理</span>
                                @elseif($row->status == 1)
                                <span class="badge badge-info">付款接受</span>
                                @elseif($row->status == 2)
                                <span class="badge badge-warning">進行中</span>
                                @elseif($row->status == 3)
                                <span class="badge badge-success">運送中</span>
                                @else
                                <span class="badge badge-danger">取消</span>

                                @endif

                            </td>

                            <td>
                                <a href="{{ URL::to('admin/view/order/'.$row->id) }} " class="btn btn-sm btn-info">查看</a>

                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->




    </div><!-- sl-mainpanel -->





    @endsection