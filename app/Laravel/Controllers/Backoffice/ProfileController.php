<?php

namespace App\Laravel\Controllers\Backoffice;

/*
 * Request Validator
 */
use App\Laravel\Requests\Backoffice\ProfileRequest;
use App\Laravel\Requests\PageRequest;

use Illuminate\Support\Facades\DB;

class ProfileController extends Controller{

    protected $data;
    protected $guard;

    public function __construct(){
        parent::__construct();
        $this->guard = "backoffice";
    }

    public function show(PageRequest $request){
        $this->data['user'] = auth($this->guard)->user();
        return view('Backoffice.profile.show', $this->data);
    }

    public function edit(PageRequest $request){
        $this->data['user'] = auth($this->guard)->user();
        return view('Backoffice.profile.edit', $this->data);
    }

    public function update(ProfileRequest $request){
        DB::beginTransaction();
        try{
            $admin = auth($this->guard)->user();
            $admin->name = $request->input('name');
            $admin->email = strtolower($request->input('email'));

            // only change the password if a new one was typed
            if($request->filled('password')){
                $admin->password = bcrypt($request->input('password'));
            }
            $admin->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Profile updated.");
            return redirect()->route('backoffice.profile.show');
        }catch(\Exception $e){
            DB::rollback();
            session()->flash('notification-status', "error");
            session()->flash('notification-msg', "Something went wrong. Please try again.");
            return redirect()->back();
        }
    }
}
