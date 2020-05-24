@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="container">
            <h1 class="text-center">Твиты</h1>

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    Ошибка добавления твита
                </div>
            @endif

            <form-component>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </form-component>

            <tweets-component></tweets-component>

        </div>
    </div>

@endsection
