<?php

use Illuminate\Database\Seeder;
use App\models\Account;
use App\models\Match;
use App\models\Team;

class BettingAppSeeder extends Seeder
{
    public function run() {

        // clear our database ------------------------------------------
        DB::table('accounts')->delete();
        DB::table('matches')->delete();
        DB::table('matches_accounts')->delete();
        DB::table('teams')->delete();
        // seed our team table -----------------------

        // bear 1 is named Lawly. She is extremely dangerous. Especially when hungry.
        $poland = Team::create(array(
            'name' => 'Poland',
            'nation' => 'Poland',
            'flag' => 'images/poland.png',
        ));

        $senegal = Team::create(array(
            'name' => 'Senegal',
            'nation' => 'Senegal',
            'flag' => 'images/senegal.jpg',
        ));

        $colombia = Team::create(array(
            'name' => 'Colombia',
            'nation' => 'Colombia',
            'flag' => 'images/colombia.png',
        ));        


        $japan = Team::create(array(
            'name' => 'Japan',
            'nation' => 'Japan',
            'flag' => 'images/japan.png',
        ));


        // seed our account table ------------------------

        $admin = Account::create(array(
            'username' => 'admin',
            'password' => 'altplus',
            'email' => 'altplus@gmail.com',
            'amount' => '5000',
        ));
        
        $minh = Account::create(array(
            'username' => 'minh',
            'password' => '123456',
            'email' => 'binhminh@gmail.com',
            'amount' => '5000',
        ));

        $test = Account::create(array(
            'username' => 'test',
            'password' => '123345',
            'email' => 'exampletest@gmail.com',
            'amount' => '5000',
        ));

        //======================================

        $match = Match::create(array(
        	'awayteam_id'=> $poland->id,
        	'team_id'=> $japan->id,
        	'tie'=> 1.4,
        	'win'=> 2.5,
        	'lost'=>0.5,
        	'timestop'=> '2018-10-06 12:00:00',
        	'timestart'=>'2018-11-06 13:17:17',
        	'timefinish'=>'2018-11-06 15:17:17',
        	'result'=> null,
        	'status'=> '0',
        ));
    }
}
