@extends('layouts.app')
@section('content')

@php
$order = DB::table('orders')->where('user_id',Auth::id())->orderBy('id','DESC')->limit(10)->get();
@endphp

<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-10 card">
                <table class="table table-response">
                    <thead>
                        <tr>
                            <th scope="col">付款方式 </th>
                            <th scope="col">付款編號 </th>
                            <th scope="col">價格 </th>
                            <th scope="col">日期 </th>
                            <th scope="col">狀態 </th>
                            <th scope="col">訂單號 </th>
                            <th scope="col">行動 </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $row)
                        <tr>
                            <td scope="col">{{ $row->payment_type }} </td>
                            <td scope="col">{{ $row->payment_id }} </td>
                            <td scope="col">{{ $row->total }}$ </td>
                            <td scope="col">{{ $row->date }} </td>
                            <td scope="col">
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
                            <td scope="col">{{ $row->status_code }} </td>
                            <td scope="col">
                                <a href="" class="btn btn-sm btn-info"> 查看</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-2">
                <div class="card">
                    <img src="{{ asset('frontend/images/kaziariyan.png') }}" class="card-img-top" style="height: 90px; width: 90px; margin-left: 34%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <a href="">Change Password</a> </li>
                        <li class="list-group-item">Edit Profile</li>
                        <li class="list-group-item"><a href="{{ route('success.orderlist') }}"> Return Order</a> </li>
                    </ul>

                    <div class="card-body">
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection