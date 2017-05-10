<?php

namespace App\Http\Controllers;

use App\Questions;
use App\Answers;
use App\User;
use App\Votes;
use DB;
use View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Questions::all()->sortByDesc("created_at");
        $authors = array();
        $questions_votes = array();
        $i = 1;
        foreach ($questions as $question) {
            $authors[$i] = User::find($question->uid);

            $question_votes['up'] = DB::table('votes')
                ->where('qid', '=', $question->id)
                ->where('isUp', '=', true)
                ->count();

            $question_votes['down'] = DB::table('votes')
                ->where('qid', '=', $question->id)
                ->where('isUp', '=', false)
                ->count();

            $questions_votes[$i] = $question_votes['up'] - $question_votes['down'];

            $i++;
        }
        return View::make('home')
            ->with('questions', $questions)
            ->with('authors', $authors)
            ->with('questions_votes', $questions_votes);
    }

    public function ListQuestions()
    {
        //return View::make('home')->with('question', Questions::find(1));
        //$question = Question::find(1);
        //return view('home', compact())
    }

    public function AskForm()
    {
        return view('ask');
    }

    public function Ask(Request $request)
    {
        $title = $request->input('title');
        $body = $request->input('body');
        $tags = $request->input('tags');
        $userid = Auth::id();

        $id = DB::table('questions')->insertGetId(
            ['title' => $title, 'body' => $body, 'tags' => $tags, 'uid' => $userid, 'created_at' => Carbon::now()]
        );

        return redirect('/questions/' . $id);
    }

    public function ViewQuestion($id)
    {
        $question = Questions::find($id);
        $answers = Answers::where('qid', '=', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        $questions_votes['up'] = DB::table('votes')
            ->where('qid', '=', $id)
            ->where('isUp', '=', true)
            ->count();

        $questions_votes['down'] = DB::table('votes')
            ->where('qid', '=', $id)
            ->where('isUp', '=', false)
            ->count();

        $questions_votes_total = $questions_votes['up'] - $questions_votes['down'];

        if ($answers) {
            $answer_authors = array();
            $answers_votes = array();
            $i = 1;
            foreach ($answers as $answer) {
                $answer_authors[$i] = User::find($answer->uid);

                $answer_votes['up'] = DB::table('votes')
                    ->where('aid', '=', $answer->id)
                    ->where('isUp', '=', true)
                    ->count();

                $answer_votes['down'] = DB::table('votes')
                    ->where('aid', '=', $answer->id)
                    ->where('isUp', '=', false)
                    ->count();

                $answers_votes[$i] = $answer_votes['up'] - $answer_votes['down'];
                $i++;
            }
            if ($question) {
                return View::make('question')
                    ->with('question', $question)
                    ->with('answers', $answers)
                    ->with('author', User::find($question->uid))
                    ->with('answer_authors', $answer_authors)
                    ->with('question_votes', $questions_votes_total)
                    ->with('answers_votes', $answers_votes);
            } else {
                abort(404);
            }
        } else {
            if ($question) {
                return View::make('question')
                    ->with('question', $question)
                    ->with('author', User::find($question->uid))
                    ->with('question_votes', $questions_votes_total);
            } else {
                abort(404);
            }
        }

    }

    public function EditForm()
    {

    }

    public function Edit()
    {

    }

    public function Answer()
    {

    }

    public function Upvote()
    {

    }

    public function Downvote()
    {

    }
}
