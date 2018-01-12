<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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
    public function index(Request $request)
    {
		$restaurantId = 4;
		$userid = Auth::id();
		$balance = DB::table('users')->where('id',$userid)->value('balance');
		$foods = DB::table('foodinfo')->where('restaurantId',$restaurantId)->paginate(16);
        return view('home',['balance' => $balance, 'restaurantId' => $restaurantId, 'foods' => $foods]);
    }
	
	public function order(Request $request)
    {
		$userid = Auth::id();
		$balance = DB::table('users')->where('id',$userid)->value('balance');
		$foods = DB::table('foodinfo')->where('id',$request->order);
		$today = date("Y-m-d"); 
		DB::table('orderinfo')->insert(
			[	'userid'=>$userid,
				'ordernum'=>0,
				'foodid'=>$foods->value('id'),
				'foodname'=>$foods->value('name')." ".$foods->value('englishname'),
				'foodprice'=>$foods->value('price')]
			);
        return redirect('orderInfo');
    }
}
