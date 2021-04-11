@extends('admin.admin_master')
@section('admin')


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Admin Section</span>
    </nav>

    <div class="sl-pagebody">


        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">新的管理員 </h6>

            <form method="post" action="{{ route('store.admin') }}">
                @csrf

                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label"> 名稱: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" placeholder="Enter User Name" required="">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="email" name="email" placeholder="Enter Your Email" required="">
                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="password" name="password" placeholder="Enter Password" required="">
                            </div>
                        </div><!-- col-4 -->




                    </div><!-- row -->

                    <hr>
                    <br><br>

                    <div class="row">

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="category" value="1">
                                <span>類別</span>
                            </label>

                        </div> <!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="coupon" value="1">
                                <span>優惠卷</span>
                            </label>

                        </div> <!-- col-4 -->



                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="product" value="1">
                                <span>商品</span>
                            </label>

                        </div> <!-- col-4 -->


                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="blog" value="1">
                                <span> 部落格</span>
                            </label>

                        </div> <!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="order" value="1">
                                <span>其他</span>
                            </label>

                        </div> <!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="other" value="1">
                                <span>其他</span>
                            </label>

                        </div> <!-- col-4 -->


                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="report" value="1">
                                <span>報告</span>
                            </label>

                        </div> <!-- col-4 -->


                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="role" value="1">
                                <span>權限</span>
                            </label>

                        </div> <!-- col-4 -->


                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="return" value="1">
                                <span> 返回</span>
                            </label>

                        </div> <!-- col-4 -->



                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="contact" value="1">
                                <span> 關於</span>
                            </label>

                        </div> <!-- col-4 -->


                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="comment" value="1">
                                <span>評論</span>
                            </label>

                        </div> <!-- col-4 -->


                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="setting" value="1">
                                <span>設定</span>
                            </label>

                        </div> <!-- col-4 -->


                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="stock" value="1">
                                <span>庫存</span>
                            </label>

                        </div> <!-- col-4 -->





                    </div><!-- end row -->
                    <br><br>


                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info mg-r-5">提交</button>

                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
        </div><!-- card -->

        </form>




    </div><!-- row -->


</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->





@endsection