@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="container">
            <h1 class="text-center">Твиты</h1>

            <form class="form p-3 border rounded">
                <div class="form-group">
                    <label for="tweetCategory">Категория</label>
                    <select class="custom-select mr-sm-2" id="tweetCategory" required>
                        <option selected disabled>Выбрать</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="tweetUsername">Юзернейм</label>
                    <input class="form-control" id="tweetUsername" required></input>
                </div>
                <div class="form-group mb-2">
                    <label for="tweetContent">Содержимое твита</label>
                    <textarea class="form-control" id="tweetContent" rows="3" required></textarea>
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
