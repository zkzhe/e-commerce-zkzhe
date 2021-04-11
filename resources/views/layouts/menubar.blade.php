@php
$category = DB::table('categories')->get();
@endphp

<nav class="main_nav">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="main_nav_content d-flex flex-row">

                    <!-- Categories Menu -->

                    <div class="cat_menu_container">
                        <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                            <div class="cat_burger"><span></span><span></span><span></span></div>
                            <div class="cat_menu_text">類別</div>
                        </div>

                        <ul class="cat_menu">
                            @foreach($category as $key)
                            <li class="hassubs">
                                <a href="{{ url('allcategory/'.$key->id) }}">{{ $key->category_name }}<i class="fas fa-chevron-right"></i></a>
                                <ul>
                                    @php
                                    $subcategory = DB::table('subcategories')->where('category_id', $key->id)->get();
                                    @endphp
                                    @foreach($subcategory as $value)
                                    <li class="hassubs">
                                        <a href="{{ url('products/'.$value->id) }}">{{ $value->subcategory_name }}<i class="fas fa-chevron-right"></i></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Main Nav Menu -->

                    <div class="main_nav_menu ml-auto">
                        <ul class="standard_dropdown main_nav_dropdown">
                            <li><a href="{{ route('blog.post') }}">部落格<i class="fas fa-chevron-down"></i></a></li>
                            <li><a href="{{ route('contact.page') }}">關於<i class="fas fa-chevron-down"></i></a></li>
                        </ul>
                    </div>

                    <!-- Menu Trigger -->

                    <div class="menu_trigger_container ml-auto">
                        <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                            <div class="menu_burger">
                                <div class="menu_trigger_text">menu</div>
                                <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>

</header>