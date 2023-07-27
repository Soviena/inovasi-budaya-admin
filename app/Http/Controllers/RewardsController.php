<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Rewards;

class RewardsController extends Controller
{

    public function index(){
        $page = ["title" => "Rewards"];
        $periodeReward = Periode::with('users')->get();
        $user = User::all();
        return view('reward',compact('periodeReward','user','page'));
        // return response()->json($periodeReward);
    }

    public function addReward(Request $request, $uid, $pid){
        $user = User::find($uid);
        $periode = Periode::find($pid);
        $user->periode()->attach($periode,["rewardsName" => $request->rewardsName,"deskripsi" => $request->deskripsi]);
        return redirect()->route('rewardUser');
    }

    public function addPeriode(Request $request){
        $periode = new Periode;
        $periode->periode = $request->periode;
        $periode->save();
        return redirect()->route('rewardUser');
    }

    public function deleteReward($uid, $pid){
        $u = User::find($uid);
        $p = Periode::find($pid);
        $u->periode()->detach($p);
        return redirect()->route('rewardUser');
    }

}
