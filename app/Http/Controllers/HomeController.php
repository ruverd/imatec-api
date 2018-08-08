<?php

namespace App\Http\Controllers;

use App\Entities\User;
use Silber\Bouncer\Database\Ability;

//use App\Mail\StockProductMax;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;
//use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = Auth::user();
        $user = User::find(3);
        $abilities = [];
        $count = 1;
        //dd($abilities = $user->getAbilities());

        foreach (Ability::all() as $ability){
            if($count == 1) {
                echo "<pre>";
                var_dump($ability->name);
                var_dump($user->can($ability->name));
                echo "</pre>";
            }

            if($ability->name){
                $abilities[$ability->name] = $user->can($ability->name);
            }
//
//            if($count == 1) {
//                dd($permissions);
//            }
            $count++;
        }
        dd($abilities);
        exit();

        //Mail::send(new StockProductMax());
        return view('home');
    }
}
