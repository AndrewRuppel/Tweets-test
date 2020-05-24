<?php

namespace App\Http\Controllers;

use App\Category;
use App\Jobs\AddMessageJob;
use App\Tweet;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    public function index() {

        $categories = Category::all();
        $tweets = Tweet::orderBy('created_at', 'desc')->paginate()->load('category');

        return view('index', compact('categories', 'tweets'));
    }

    public function sendTweet(Request $request) {

        $this->validate($request, array(
            'category_id'   => 'required',
            'username'      => 'required',
            'content'       => 'required',
        ));

        AddMessageJob::dispatch($request);

        return redirect()->back();
    }
}
