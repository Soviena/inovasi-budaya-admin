<?php

namespace App\Http\Controllers;

use App\Models\Bulan;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Rewards;

class RewardsController extends Controller
{

    public function index(){
        $page = ["title" => "Rewards"];
        $periodeReward = Periode::latest()->with('users')->get();
        $user = base64_encode(json_encode(User::with('bulan')->get()));
        $bulan = Bulan::all();
        return view('reward',compact('periodeReward','user','page','bulan'));
        // return response()->json($periodeReward);
    }

    public function addReward(Request $request, $uid, $pid){
        $user = User::find($uid);
        $periode = Periode::find($pid);
        $user->periode()->attach($periode,["rewardsName" => $request->rewardsName,"deskripsi" => $request->deskripsi]);
        return redirect()->route('rewardUser');
    }

    public function editReward(Request $request, $uid, $pid){
        $user = User::find($uid);
        $periode = Periode::find($pid);
        $user->periode()->detach($periode);
        $user->periode()->attach($periode,["rewardsName" => $request->rewardsName,"deskripsi" => $request->deskripsi]);
        return redirect()->route('rewardUser');
    }

    public function addPeriode(Request $request){
        $periode = new Periode;
        $periode->periode = $request->periode;
        $periode->save();
        return redirect()->route('rewardUser');
    }
    public function editPeriode(Request $request,$id){
        $periode = Periode::find($id);
        $periode->periode = $request->periode;
        $periode->save();
        return redirect()->route('rewardUser');
    }
    public function deletePeriode(Request $request,$id){
        $periode = Periode::find($id);
        $periode->delete();
        return redirect()->route('rewardUser');
    }

    public function deleteReward($uid, $pid){
        $u = User::find($uid);
        $p = Periode::find($pid);
        $u->periode()->detach($p);
        return redirect()->route('rewardUser');
    }

}
