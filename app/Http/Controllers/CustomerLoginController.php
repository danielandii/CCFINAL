<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Customer;
use Auth;

class CustomerLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout')->except('index');
    }

    public function index(){
        return view('customer.home');
    }

    public function LoginForm()
    {
        return view('Auth.login');
    }

    public function RegisterForm()
    {
        return view('Auth.register');
    }

    public function username()
    {
        return 'email';
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email'         => 'required|string|email|unique:customers',
            'password'      => 'required|string|min:6|confirmed',
            'male_name'     => 'required|string',
            'female.name'   => 'required|string',
            'event.date'    => 'required|string',
            // 'plan_id'       => 'required',
            'address1'      => 'required|string',
            'address2'      => 'required|string',
            'family1'       => 'required|string',
            'family2'       => 'required|string'

        ]);
        Customer::create([
            'email'         => $request->email,
            'password' => Hash::make($request['password']),
            'male_name'     => $request->male_name,
            'female_name'   => $request->female_name,
            'event_date'    => $request->event_date,
            // 'plan_id'       => $request->plan_id,
            'address1'      => $request->address1,
            'address2'      => $request->address2,
            'family1'       => $request->family1,
            'family2'       => $request->family2,
        ]);
        return redirect()->route('/')->with('success', 'Successfully register!');
    }

}
