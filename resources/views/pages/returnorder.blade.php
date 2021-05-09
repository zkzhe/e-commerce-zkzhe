@extends('layouts.app')

@section('content')


@php
$order = DB::table('orders')->where('user_id',Auth::id())->orderBy('id','DESC')->limit(10)->get();
@endphp

<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-8 card">
                <table class="table table-response">
                    <thead>
                        <tr>
                            <th scope="col">付款方式 </th>
                            <th scope="col">回覆 </th>
                            <th scope="col">價格 </th>
                            <th scope="col">日期 </th>
                            <th scope="col">狀態 </th>

                            <th scope="col">行動 </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $row)
                        <tr>
                            <td scope="col">{{ $row->payment_type }} </td>

                            <td scope="col">

                                @if($row->return_order == 0)
                                <span class="badge badge-warning">No Request</span>
                                @elseif($row->return_order == 1)
                                <span class="badge badge-info">待處理</span>
                                @elseif($row->return_order == 2)
                                <span class="badge badge-warning">成功</span>

                                @endif
                            </td>

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

                            <td scope="col">
                                @if($row->return_order == 0)
                                <a href="{{ url('request/return/'.$row->id) }}" class="btn btn-sm btn-danger" id="return"> 返回</a>
                                @elseif($row->return_order == 1)
                                <span class="badge badge-info">待處理</span>
                                @elseif($row->return_order == 2)
                                <span class="badge badge-warning">成功</span>

                                @endif

                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="col-4">
                <div class="card">
                <img id="showImage" src="{{ (!(empty(Auth::user()->profile_photo_path)))? url('upload/user_images/'.Auth::user()->profile_photo_path):url('upload/no_image.jpg') }}" style="width: 100px; height:100px">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>

                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <a href="{{route('user.password.view')}}">Change Password</a> </li>
                        <a href="{{route('profile.edit')}}" class="list-group-item">Edit Profile</a>
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