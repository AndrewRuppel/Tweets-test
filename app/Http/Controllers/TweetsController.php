<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tweets;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    public function index() {

        $categories = Category::all();
        $tweets = Tweets::paginate()->load('category');

        return view('index', compact('categories', 'tweets'));
    }
}
