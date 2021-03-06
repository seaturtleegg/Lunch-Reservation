<?php

namespace App\Http\Controllers\Auth;

use DB;
use Mail;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'email_token' => str_random(10),
        ]);
    }
	
	/**
	*  Over-ridden the register method from the "RegistersUsers" trait
	*  Remember to take care while upgrading laravel
	*/
	public function register(Request $request)
	{
		// Laravel validation
		$validator = $this->validator($request->all());
		if ($validator->fails()) 
		{
			$this->throwValidationException($request, $validator);
		}
		// Using database transactions is useful here because stuff happening is actually a transaction
		// I don't know what I said in the last line! Weird!
		DB::beginTransaction();
		try
		{
			$user = $this->create($request->all());
			// After creating the user send an email with the random token generated in the create method above
			$email = new EmailVerification(new User(['email_token' => $user->email_token, 'name' => $user->username]));
			Mail::to($user->email)->send($email);
			DB::commit();
			//return back();
			return redirect('registerSuccess');
		}
		catch(Exception $e)
		{
			DB::rollback(); 
			return back();
		}
	}
	
	// Get the user who has the same token and change his/her status to verified i.e. 1
	public function verify($token)
	{
		// The verified method has been added to the user model and chained here
		// for better readability
		User::where('email_token',$token)->firstOrFail()->verified();
		return redirect('');
	}
}
