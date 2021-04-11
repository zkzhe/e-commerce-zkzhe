@extends('admin.admin_master')
@section('admin')

<div class="sl-mainpanel">


    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>庫存產品清單</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">庫存產品清單

            </h6>


            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">產品代碼</th>
                            <th class="wd-15p">產品名稱</th>
                            <th class="wd-15p">圖片</th>
                            <th class="wd-15p">類別</th>
                            <th class="wd-15p">品牌</th>
                            <th class="wd-15p">數量</th>
                            <th class="wd-15p">狀態</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $row)
                        <tr>
                            <td>{{ $row->product_code }}</td>
                            <td>{{ $row->product_name }}</td>

                            <td> <img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"> </td>
                            <td>{{ $row->category_name }}</td>
                            <td>{{ $row->brand_name }}</td>
                            <td>{{ $row->product_quantity }}</td>
                            <td>
                                @if($row->status == 1)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif

                            </td>


                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->




    </div><!-- sl-mainpanel -->





    @endsection