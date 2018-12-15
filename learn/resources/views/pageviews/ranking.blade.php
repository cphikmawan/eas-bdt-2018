@extends('layouts.frontpage.app')

@section('title', 'Pages Rank')

@section('sidebar')
    @include('layouts.frontpage.sidebar')
@endsection

@section('header')
    @include('layouts.frontpage.header')    
@endsection

@section('content')
<div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Page Rank</small></h3>
        </div>
        <div class="block-content block-content-full">
            @for($i=0; $i<count($res); $i++)
                @for($j=0; $j<count($res[$i]); $j++)
                    <ul>
                        <li> Page With ID {{$res[$i][$j][0] }} Visited {{ $res[$i][$j][1] }} Times</li>
                    </ul>
                @endfor
            @endfor
        </div>
    </div>
@endsection