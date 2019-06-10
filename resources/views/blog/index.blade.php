@extends('layouts.app')

@section('content')

    <div class="container pt-5">
        @admin
            <div class="row pt-5">
                <div class="col-auto">
                    <a class="btn btn-success" href="{{ route('blog.create') }}">Создать статью</a>
                </div>
            </div>
        @endadmin
        <div class="row py-5">
            <div class="col-12">
                @if(count($blogs))
                    @include('blog.list', ['blogs' => $blogs])
                @else
                    @include('blog.empty')
                @endif
            </div>
        </div>
    </div>

@endsection