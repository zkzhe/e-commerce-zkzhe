@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_single_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_single_responsive.css') }}">

<!-- Single Blog Post -->

@foreach($posts as $row)

<div class="single_post">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="single_post_title">

                    @if(Session()->get('lang') == 'taiwan')
                    {{ $row->post_title_tw }}
                    @else
                    {{ $row->post_title_en }}
                    @endif

                </div>
                <div class="single_post_text">
                    <p>

                        @if(Session()->get('lang') == 'taiwan')
                        {!! $row->details_tw !!}
                        @else
                        {!! $row->details_en !!}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection