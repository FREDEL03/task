<?php

namespace App\Laravel\Controllers\Portal;

/*
 * Request Validator
 */
use App\Laravel\Requests\Portal\ProfileRequest;
use App\Laravel\Requests\PageRequest;

use Illuminate\Support\Facades\DB;

class ProfileController extends Controller{

    protected $data;
    protected $guard;

    public function __construct(){
        parent::__construct();
        $this->guard = "portal";
    }

    public function show(PageRequest $request){
        $this->data['user'] = auth($this->guard)->user();
        return view('Portal.profile.show', $this->data);
    }

    public function edit(PageRequest $request){
        $this->data['user'] = auth($this->guard)->user();
        return view('Portal.profile.edit', $this->data);
    }

    public function update(ProfileRequest $request){
        DB::beginTransaction();
        try{
            $user = auth($this->guard)->user();
            $user->name = $request->input('name');
            $user->email = strtolower($request->input('email'));

            // only change the password if a new one was typed
            if($request->filled('password')){
                $user->password = bcrypt($request->input('password'));
            }
            $user->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Profile updated.");
            return redirect()->route('portal.profile.show');
        }catch(\Exception $e){
            DB::rollback();
            session()->flash('notification-status', "error");
            session()->flash('notification-msg', "Something went wrong. Please try again.");
            return redirect()->back();
        }
    }
}
