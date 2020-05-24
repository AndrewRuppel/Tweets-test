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

            <form class="form p-3 border rounded" action="{{route('send_tweet')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tweetCategory">Категория</label>
                    <select class="custom-select"
                            id="tweetCategory"
                            name="category_id"
                            >
                        <option selected disabled>Выбрать</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="tweetUsername">Юзернейм</label>
                    <input class="form-control"
                           id="tweetUsername"
                           name="username"
                           required>
                </div>
                <div class="form-group mb-2">
                    <label for="tweetContent">Содержимое твита</label>
                    <textarea class="form-control"
                              id="tweetContent"
                              name="content"
                              rows="3"
                              required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>

            <div class="tweets">
                @foreach($tweets as $tweet)
                    <div class="card my-3 tweet">
                        <div class="card-header">
                            {{$tweet->category->title}}
                        </div>
                        <div class="card-body">
                            <h3>{{$tweet->username}}</h3>
                            <p class="card-text">{{$tweet->content}}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endsection
