<?php

namespace App\Http\Controllers;

use App\Questions;
use DB;
use View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index(){
        return View::make('home')->with('questions', Questions::all());
    }

    public function ListQuestions(){
        return View::make('home')->with('question', Questions::find(1));
    }

    public function AskForm(){
        return view('ask');
    }

    public function Ask(Request $request){
        $title = $request->input('title');
        $body = $request->input('body');
        $tags = $request->input('tags');
        $userid = Auth::id();

        $id = DB::table('questions')->insertGetId(
        	                        ['title' => $title, 'body' => $body, 'tags' => $tags, 'uid' => $userid]
        );

        return redirect('/questions/'.$id);
    }

    public function ViewQuestion($id){
        $result['question'] = Questions::find($id);
        return View::make('question')->with('question', Questions::find($id));
    }

    public function EditForm(){

    }

    public function Edit(){

    }

    public function Answer(){

    }

    public function Upvote()
    {

    }

    public function Downvote(){

    }
}
