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
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="tweetContent">Содержимое твита</label>
                    <textarea class="form-control" id="tweetContent" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>

            <div class="tweets">
                @for($i = 0; $i < 5; $i++)
                    <div class="card my-3 tweet">
                        <div class="card-header">
                            Категория
                        </div>
                        <div class="card-body">
                            <p class="card-text">Текст твита</p>
                        </div>
                    </div>
                @endfor
            </div>

        </div>
    </div>

@endsection
