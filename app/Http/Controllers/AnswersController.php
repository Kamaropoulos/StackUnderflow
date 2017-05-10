<?php

namespace App\Http\Controllers;

use DB;
use View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function Answer(Request $request, $id)
    {
        $body = $request->input('body');
        $userid = Auth::id();

        DB::table('answers')->insertGetId(
            ['body' => $body, 'uid' => $userid, 'qid' => $id, 'created_at' => Carbon::now()]
        );

        return redirect('/questions/' . $id);
    }
}
