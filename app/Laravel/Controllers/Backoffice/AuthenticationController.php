<?php

namespace App\Laravel\Controllers\Backoffice;

/*
 * Request Validator
 */
use App\Laravel\Requests\Backoffice\LoginRequest;
use App\Laravel\Requests\Backoffice\RegisterRequest;
use App\Laravel\Requests\PageRequest;

use App\Laravel\Models\Admin;
use Illuminate\Support\Facades\DB;

class AuthenticationController extends Controller{

    protected $data;
    protected $guard;

    public function __construct(){
        parent::__construct();
        $this->guard = "backoffice";
    }

    public function login(PageRequest $request){
        return view('Backoffice.auth.login');
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
        return redirect()->route('backoffice.dashboard');
    }

    public function register(PageRequest $request){
        return view('Backoffice.auth.register');
    }

    public function store(RegisterRequest $request){
        DB::beginTransaction();
        try{
            $admin = new Admin();
            $admin->name = $request->input('name');
            $admin->email = strtolower($request->input('email'));
            $admin->password = bcrypt($request->input('password'));
            $admin->save();

            DB::commit();

            // log the new admin in right away
            auth($this->guard)->login($admin);
            $request->session()->regenerate();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Account created. Welcome!");
            return redirect()->route('backoffice.dashboard');
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
        return redirect()->route('backoffice.auth.login');
    }
}
