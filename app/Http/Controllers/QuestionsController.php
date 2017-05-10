<?php

namespace App\Http\Controllers;

use App\Questions;
use App\User;
use DB;
use View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index(){
        $questions = Questions::all()->sortByDesc("created_at");
        $authors = array();
        $i = 1;
        foreach ($questions as $question) {
            $authors[$i] = User::find($question->uid);
            $i++;
        }
        return View::make('home')
            ->with('questions', $questions)
            ->with('authors', $authors);
    }

    public function ListQuestions(){
        //return View::make('home')->with('question', Questions::find(1));
        //$question = Question::find(1);
        //return view('home', compact())
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
            ['title' => $title, 'body' => $body, 'tags' => $tags, 'uid' => $userid, 'created_at' => Carbon::now()]
        );

        return redirect('/questions/'.$id);
    }

    public function ViewQuestion($id){
        $question = Questions::find($id);
        if ($question) {
            return View::make('question')
                ->with('question', $question)
                ->with('author', User::find($question->uid));
        } else {
            abort(404);
        }

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
