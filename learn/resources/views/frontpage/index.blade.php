@extends('layouts.frontpage.app')

@section('title', 'Home')

@section('sidebar')
    @include('layouts.frontpage.sidebar')
@endsection

@section('header')
    @include('layouts.frontpage.header')    
@endsection

@section('content')
<div class="block">
    <div class="block-header block-header-default">
    </div>
    <div class="js-slider slick-nav-black slick-dotted-inner slick-dotted-white" data-dots="true" data-arrows="true">
        <div>
            <div class="bg-image" style="background-image: url('codebase/src/assets/img/photos/photo1.jpg');">
                <div class="bg-black-op-75">
                    <div class="content content-top text-center">
                        <div class="py-100">
                            <h1 class="font-w700 text-white mb-10">BOOK BS</h1>
                            <h2 class="h4 font-w400 text-white-op">Book Storage</h2>
                            <h2 class="h5 font-w400 text-white-op">Easy Search</h2>                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="bg-image" style="background-image: url('codebase/src/assets/img/photos/photo2.jpg');">
                <div class="bg-black-op-75">
                    <div class="content content-top text-center">
                        <div class="py-100">
                            <h1 class="font-w700 text-white mb-10">BOOK BS</h1>
                            <h2 class="h4 font-w400 text-white-op">Book Storage</h2>
                            <h2 class="h5 font-w400 text-white-op">Easy Money</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="bg-image" style="background-image: url('codebase/src/assets/img/photos/photo3.jpg');">
                <div class="bg-black-op-75">
                    <div class="content content-top text-center">
                        <div class="py-100">
                            <h1 class="font-w700 text-white mb-10">BOOK BS</h1>
                            <h2 class="h4 font-w400 text-white-op">Book Storage</h2>
                            <h2 class="h5 font-w400 text-white-op">Easy Life</h2>                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>           <!-- END Slider with inner dots and black arrows -->
</div>
@endsection