<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\models\Match;
use App\models\Team;
use App\models\Bet;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Validator;


class PagesController extends Controller
{
    public function getHome(){
    	$matches = Match::all();
    	return view('nha')->with('matches',$matches);
    }
    public function getAbout(){
    	return view('about');
    }
    public function getContact(){
    	return view('contact');
    }
    public function getHistory(){
        $user = User::where('id',Auth::id())->first();
        return view('history')->with('user',$user);
    }
    public function getDetail($id){
    	$match = Match::find($id);
    	return view('detailmatch')->with('match',$match);
    }
    public function submit(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
        ]);

        // create new message
        $mess = new Message;
        $mess->name = $request->get('name');
        $mess->email = $request->input('email');
        $mess->message = $request->input('message');

        // save message
        $mess->save();

        return redirect('home')->with('success','Message Sented');
    }
    public function doBet(Request $request){
        if (Auth::check()) {
            $this->validate($request,[
                'bet' => 'required',
                'amountbet' => 'numeric|required',    
            ]);
            if(Auth::user()->amount < $request->input('amountbet')){
                return redirect()->back()->with('fail','Bạn đã đặt quá số tiền hiện có');
            }
            $userBet = new Bet;
            $userBet->amountbet = $request->input('amountbet');
            $userBet->choice = $request->input('bet');
            $userBet->match_id = $request->input('match_id');
            $userBet->user_id = $request->input('user_id');
            $userBet->save();
            
            $user = User::find(Auth::id());
            $user->amount =  Auth::user()->amount - $request->input('amountbet') ;
            $user->save();


            return redirect('home')->with('success','You have betted football');
        }else{
            return redirect()->back();
        }
    }




    
    // operation Match ====================================================================
    // ==================================================================================== 
    public function getMatches(){
        
        $matches = Match::paginate(4);
        $teams = Team::all();
        return view('admin.controll')->with('matches',$matches)->with('teams',$teams);
    }
    public function addMatch(Request $request){

        $request->validate([
            'team' => 'required',
            'awayteam' => 'different:team',
            'tie' => 'bail|required|numeric',
            'win'=>'bail|required|numeric',
            'lost'=>'bail|required|numeric',
            'timestop'=>'bail|required',
            'timestart'=>'bail|required|after:timestop',
            'timefinish'=>'bail|required|after:timestart',
            'result'=>'nullable',
        ]);

        $match = new Match;
        
        $match->awayteam_id = $request->input('awayteam');
        $match->team_id = $request->input('team');
        $match->tie = $request->input('tie');
        $match->win = $request->input('win');
        $match->lost = $request->input('lost');
        $match->timestop = $request->input('timestop');
        $match->timestart = $request->input('timestart');
        $match->timefinish = $request->input('timefinish');
        $match->status = '0';
        $match->save();

        return redirect('matches')->with('success','You are successfully create a match');
    }

    public function deleMatch(Request $request){

        Match::destroy($request->id);
        return redirect('matches')->with('success','You are successfully delete a match');
    }
    public function publicMatch(Request $request){
        $match = Match::find($request->id);
        $match->status = '1';
        $match->save();
        return redirect('matches')->with('success','You are successfully public a match');
    }

    public function editMatch(Request $request){
        $match = Match::find($request->id);

        return redirect('matches')->with('match',$match);
    }
    public function saveMatch(Request $request){
        $request->validate([
            'team' => 'required',
            'awayteam' => 'different:team',
            'tie' => 'bail|required|numeric',
            'win'=>'bail|required|numeric',
            'lost'=>'bail|required|numeric',
            'timestop'=>'bail|required',
            'timestart'=>'bail|required|after:timestop',
            'timefinish'=>'bail|required|after:timestart',
            'result'=>'nullable',
        ]);
        $match = Match::find($request->input('id'));
        $match->awayteam_id = $request->input('awayteam');
        $match->team_id = $request->input('team');
        $match->tie = $request->input('tie');
        $match->win = $request->input('win');
        $match->lost = $request->input('lost');
        $match->timestop = $request->input('timestop');
        $match->timestart = $request->input('timestart');
        $match->timefinish = $request->input('timefinish');
        $match->status = '0';
        $match->save();

        return redirect('matches')->with('success','You are successfully update a match');
    }

    public function viewBetting(Request $request){
        $match = Match::where('id',$request->id)->first();
        return view('admin.bet')->with('match',$match);
    }
    public function addResult(Request $request){
        
        $match = Match::find($request->input('id'));
        $match->result = $request->input('result');
        $match->save();

        $results = explode("-", $request->input('result') );
        if($results[0] > $results[1]){
            $bet = 0;
            $percent = $match->win;
        }elseif($results[0] == $results[1]){
            $bet = 1;
            $percent = $match->tie;
        }else{
            $bet = 2;
            $percent = $match->lost;
        }

        foreach ($match->users as $userBet) {
            if($userBet->pivot->choice == $bet){
                $user = User::find($userBet->pivot->user_id);
                $user->amount += $userBet->pivot->amountbet + $userBet->pivot->amountbet * $percent;
                $user->save();
            }
        }
        return redirect('matches')->with('success','You are successfully add result for a match');
    }




    // operation teams ======================================================================
    // ======================================================================================
    public function getTeams(){
        $teams = Team::paginate(4);
        return view('admin.teams')->with('teams',$teams);
    }
    public function doUpload(Request $request){
        $request->validate([
            'name' => 'required',
            'nation' => 'required',
            'file' => 'required|image|max:5120',
        ]);
        // khong qua 5 M image
        
       if($request->hasFile('file')){
            $file = $request->file;
            $file->move('images', $file->getClientOriginalName());
            $team = new Team;
            $team->name = $request->input('name');
            $team->nation = $request->input('nation');
            $team->flag = 'images/'. $file->getClientOriginalName();
            $team->save();
            return redirect('teams')->with('success','You are successfully add a new team');
        
        }
        
    }
    public function deleTeam(Request $request){
        Team::destroy($request->id);
        return redirect('teams')->with('success','You are successfully delete a team');
    }

    public function editTeam(Request $request){
        $team = Team::find($request->id);

        return redirect('teams')->with('team',$team);
    }
    public function saveTeam(Request $request){
        $request->validate([
            'name' => 'required',
            'nation' => 'required',
            'file' => 'image|max:5120',
        ]);
        // khong qua 5 M image
        $team = Team::find($request->input('id'));
        if($request->hasFile('file')){
            $file = $request->file;
            $file->move('images', $file->getClientOriginalName());    
            $team->flag = 'images/'. $file->getClientOriginalName();
            
        }
        $team->name = $request->input('name');
        $team->nation = $request->input('nation');
        $team->save();
        return redirect('teams')->with('success','You are successfully update a team');
    }
}
