<?php

namespace App\Laravel\Controllers\Portal;

/*
 * Request Validator
 */
use App\Laravel\Requests\Portal\LoginRequest;
use App\Laravel\Requests\Portal\RegisterRequest;
use App\Laravel\Requests\PageRequest;

use App\Laravel\Models\User;
use Illuminate\Support\Facades\DB;

class AuthenticationController extends Controller{

    protected $data;
    protected $guard;

    public function __construct(){
        parent::__construct();
        $this->guard = "portal";
    }

    public function login(PageRequest $request){
        return view('Portal.auth.login');
    }

    public function authenticate(LoginRequest $request){
        $email = strtolower($request->input('email'));
        $password = $request->input('password');

        if(!auth($this->guard)->attempt(['email' => $email, 'password' => $password], $request->has('remember'))){
            session()->flash('notification-status', "error");
            session()->flash('notification-msg', "Invalid email or password.");
            return redirect()->back()->withInput($request->only('email'));
        }

        $request->session()->regenerate();
        session()->flash('notification-status', "success");
        session()->flash('notification-msg', "Welcome back!");
        return redirect()->route('portal.home');
    }

    public function register(PageRequest $request){
        return view('Portal.auth.register');
    }

    public function store(RegisterRequest $request){
        DB::beginTransaction();
        try{
            $user = new User();
            $user->name = $request->input('name');
            $user->email = strtolower($request->input('email'));
            $user->password = bcrypt($request->input('password'));
            $user->save();

            DB::commit();

            // log the new user in right away
            auth($this->guard)->login($user);
            $request->session()->regenerate();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Account created. Welcome!");
            return redirect()->route('portal.home');
        }catch(\Exception $e){
            DB::rollback();
            session()->flash('notification-status', "error");
            session()->flash('notification-msg', "Something went wrong. Please try again.");
            return redirect()->back()->withInput($request->except('password', 'password_confirmation'));
        }
    }

    public function logout(PageRequest $request){
        auth($this->guard)->logout();
        $request->session()->regenerateToken();

        session()->flash('notification-status', "success");
        session()->flash('notification-msg', "You have been logged out.");
        return redirect()->route('portal.auth.login');
    }
}
