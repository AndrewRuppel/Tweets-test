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

    public function getTweets(Request $request) {
        $limit = 10;

        if ($request->has('last_id')) {
            $last_id = $request->get('last_id');
            return Tweet::where([
                ['id', '<', $last_id]
            ])->orderBy('created_at', 'desc')->limit($limit)->get()->load('category');
        } else {
            return Tweet::orderBy('created_at', 'desc')->limit($limit)->get()->load('category');
        }

    }
}
