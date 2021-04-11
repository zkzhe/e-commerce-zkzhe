    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
    <div class="sl-sideleft">
        <div class="input-group input-group-search">
            <input type="search" name="search" class="form-control" placeholder="Search">
            <span class="input-group-btn">
                <button class="btn"><i class="fa fa-search"></i></button>
            </span><!-- input-group-btn -->
        </div><!-- input-group -->

        <label class="sidebar-label">導航</label>
        <div class="sl-sideleft-menu">
            <a href="{{url('admin/dashboard')}}" class="sl-menu-link active">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                    <span class="menu-item-label">儀表板</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            @if(Auth::user()->category == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                    <span class="menu-item-label">類別</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.categories') }}" class="nav-link">類別</a></li>
                <li class="nav-item"><a href="{{ route('admin.sub.categories') }}" class="nav-link">子類別</a></li>
                <li class="nav-item"><a href="{{ route('admin.brands') }}" class="nav-link">品牌</a></li>
            </ul>
            @else
            @endif

            @if(Auth::user()->coupon == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                    <span class="menu-item-label">優惠</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.coupon') }}" class="nav-link">優惠卷</a></li>
            </ul>
            @else
            @endif

            @if(Auth::user()->product == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                    <span class="menu-item-label">產品</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('add.product') }}" class="nav-link">新增產品</a></li>
                <li class="nav-item"><a href="{{ route('all.product') }}" class="nav-link">全部產品</a></li>
            </ul>
            @else
            @endif

            @if(Auth::user()->order == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                    <span class="menu-item-label">訂單</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.neworder') }}" class="nav-link">新訂單</a></li>
                <li class="nav-item"><a href="{{ route('admin.accept.payment') }}" class="nav-link">接受付款</a></li>
                <li class="nav-item"><a href="{{ route('admin.cancel.order') }}" class="nav-link">取消付款</a></li>
                <li class="nav-item"><a href="{{ route('admin.process.payment') }}" class="nav-link">流程交付</a></li>
                <li class="nav-item"><a href="{{ route('admin.success.payment') }}" class="nav-link">送貨成功</a></li>
            </ul>
            @else
            @endif

            @if(Auth::user()->blog == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                    <span class="menu-item-label">部落格</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('add.blog.categorylist') }}" class="nav-link">部落格 類別</a></li>
                <li class="nav-item"><a href="{{ route('add.blogpost')  }}" class="nav-link">添加帖子</a></li>
                <li class="nav-item"><a href="{{ route('all.blogpost')  }}" class="nav-link">帖子列表</a></li>
            </ul>
            @else
            @endif

            @if(Auth::user()->other == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">其他</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.newslater') }}" class="nav-link">新聞通訊</a></li>
                <li class="nav-item"><a href="{{ route('admin.seo') }}" class="nav-link">SEO 設定</a></li>
            </ul>
            @else
            @endif

            @if(Auth::user()->role == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
                    <span class="menu-item-label">使用者權限</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('create.admin') }}" class="nav-link">新增使用者</a></li>
                <li class="nav-item"><a href="{{ route('admin.all.user') }}" class="nav-link">所有使用者</a></li>
            </ul>
            @else
            @endif

            @if(Auth::user()->return == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
                    <span class="menu-item-label">退貨單</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.return.request') }}" class="nav-link">退貨要求</a></li>
                <li class="nav-item"><a href="{{ route('admin.all.request') }}" class="nav-link">所有請求</a></li>
            </ul>
            @else
            @endif

            @if(Auth::user()->contact == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                    <span class="menu-item-label">聯繫信息</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('all.message') }}" class="nav-link">所有留言</a></li>
            </ul>
            @else
            @endif

            @if(Auth::user()->stock == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
                    <span class="menu-item-label">產品庫存</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.product.stock') }}" class="nav-link">庫存</a></li>
            </ul>
            @else
            @endif

            @if(Auth::user()->comment == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
                    <span class="menu-item-label">產品評論</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href=" " class="nav-link">新評論</a></li>
                <li class="nav-item"><a href="" class="nav-link">所有評論</a></li>
            </ul>
            @else
            @endif

            @if(Auth::user()->setting == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
                    <span class="menu-item-label">網站設置</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.site.setting') }}" class="nav-link">網站設置</a></li>
            </ul>
            @else
            @endif

            @if(Auth::user()->report == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
                    <span class="menu-item-label">報告</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('today.order') }}" class="nav-link">今日 訂單</a></li>
                <li class="nav-item"><a href="{{ route('today.delivery') }}" class="nav-link">今天交貨</a></li>
                <li class="nav-item"><a href="{{ route('this.month') }}" class="nav-link">本月</a></li>
                <li class="nav-item"><a href="{{ route('search.report') }}" class="nav-link">搜索報告</a></li>
            </ul>
            @else
            @endif

        </div><!-- sl-sideleft-menu -->

        <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->