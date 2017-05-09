<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index(){
        return view('home');
    }

    public function ListQuestions(){
        return view('home');
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
        $result['question'] = questions::find($id);
        return view('question',$result['question']);
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
