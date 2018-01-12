<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderInfoController extends Controller
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
		$userid = Auth::id();
		$balance = DB::table('users')->where('id',$userid)->value('balance');
		$today = date("Y-m-d"); 
		$orderInfo = DB::table('orderinfo')
						->join('users', 'users.id', '=', 'orderinfo.userid')
						->where([
							['userid',$userid],
							['orderinfo.createdate', '>',$today],
							['orderinfo.isconfirmed','0']])
						->get(array('orderinfo.*'));
        return view('orderInfo',['balance' => $balance, 'orderInfo' => $orderInfo]);
    }
	
	public function order()
    {
		$userid = Auth::id();
		$today = date("Y-m-d"); 
		
		$sql = 'update users a join (
				SELECT userid, count(1) num FROM orderinfo where isconfirmed = 0 and createdate > "'.$today.'"
				group by userid) b on a.id = b.userid
				set a.balance = a.balance - b.num * 9';
		DB::update($sql);
		
		DB::table('orderinfo')
				->where([
					['userid',$userid],
					['orderinfo.createdate', '>',$today],
					['isconfirmed',0]
				])
				->update(
					['isconfirmed'=>1]
				);

        return "Order Success.";
    }
	
	public function orderHistory(Request $request)
    {
		$userid = Auth::id();
		$balance = DB::table('users')->where('id',$userid)->value('balance');
		$today = date("Y-m-d"); 
		$orderHistory = DB::table('orderinfo')
						->join('users', 'users.id', '=', 'orderinfo.userid')
						->where([
							['userid',$userid],
							['orderinfo.isconfirmed','1']])
						->get();
        return view('orderHistory',['orderHistory' => $orderHistory]);
    }
	
	public function destroy($orderId)
	{
		DB::table('orderinfo')->where('id',$orderId)->delete();
		return back();
	}
}
