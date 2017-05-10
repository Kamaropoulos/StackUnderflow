<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function UpvoteQuestion($id){

        $userid = Auth::id();

        DB::table('votes')->insertGetId(
            ['uid' => $userid, 'qid' => $id, 'isUp' => true, 'created_at' => Carbon::now()]
        );

        return redirect('/questions/' . $id);
    }

    public function DownvoteQuestion($id){
        $userid = Auth::id();

        DB::table('votes')->insertGetId(
            ['uid' => $userid, 'qid' => $id, 'isUp' => false, 'created_at' => Carbon::now()]
        );

        return redirect('/questions/' . $id);
    }

    public function UpvoteAnswer($id, $aid){
        $userid = Auth::id();

        DB::table('votes')->insertGetId(
            ['uid' => $userid, 'aid' => $aid, 'isUp' => true, 'created_at' => Carbon::now()]
        );

        return redirect('/questions/' . $id);
    }

    public function DownvoteAnswer($id, $aid){
        $userid = Auth::id();

        DB::table('votes')->insertGetId(
            ['uid' => $userid, 'aid' => $aid, 'isUp' => false, 'created_at' => Carbon::now()]
        );

        return redirect('/questions/' . $id);
    }
}
