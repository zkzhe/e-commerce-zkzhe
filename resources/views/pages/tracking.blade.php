@extends('layouts.app')

@section('content')


<div class="contact_form">
    <div class="container">
        <div class="row">

            <div class="col-5 offset-lg-1">
                <div class="contact_form_title">
                    <h4> Your Order 狀態 </h4>
                </div>

                <div class="progress">

                    @if($track->status == 0)
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

                    @elseif($track->status == 1)
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

                    <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>

                    @elseif($track->status == 2)
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

                    <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>

                    <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>

                    @elseif($track->status == 3)
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

                    <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>

                    <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>

                    <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>

                    @else

                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                    @endif

                </div><br>

                @if($track->status == 0)
                <h4>注意：您的訂單正在審核中 </h4>

                @elseif($track->status == 1)
                <h4>注意：付款接受處理中 </h4>

                @elseif($track->status == 2)
                <h4>注意：打包完成移交過程 </h4>

                @elseif($track->status == 3)
                <h4>注意：訂單已完成 </h4>

                @else

                <h4>注意：訂單已取消 </h4>

                @endif




            </div>









            <div class="col-5 offset-lg-1">
                <div class="contact_form_title">
                    <h4>你的訂單明細</h4>
                </div>

                <ul class="list-group col-lg-12">
                    <li class="list-group-item"> <b>付款方式:</b> {{ $track->payment_type  }} </li>
                    <li class="list-group-item"> <b>交易編號：</b> {{ $track->payment_id  }}</li>
                    <li class="list-group-item"> <b>Balance ID:</b> {{ $track->blnc_transection  }}</li>
                    <li class="list-group-item"> <b>小計:</b> $ {{ $track->subtotal  }}</li>
                    <li class="list-group-item"> <b>手續費:</b> $ {{ $track->shipping  }}</li>
                    <li class="list-group-item"> <b>稅:</b> $ {{ $track->vat  }}</li>
                    <li class="list-group-item"> <b>合計:</b> $ {{ $track->total  }}</li>
                    <li class="list-group-item"> <b>月份:</b> {{ $track->month  }}</li>
                    <li class="list-group-item"> <b>日期:</b> {{ $track->date  }}</li>
                    <li class="list-group-item"> <b>年分:</b> {{ $track->year  }}</li>



                </ul>


            </div>




        </div>

    </div>

</div>

@endsection