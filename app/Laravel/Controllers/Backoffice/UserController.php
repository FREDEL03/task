<?php

namespace App\Laravel\Controllers\Backoffice;

/*
 * Request Validator
 */
use App\Laravel\Requests\Backoffice\UserRequest;
use App\Laravel\Requests\PageRequest;

use App\Laravel\Models\User;
use Illuminate\Support\Facades\DB;

/*
 * User Portal Accounts module: list, view, edit, delete (no create)
 */
class UserController extends Controller{

    protected $data;

    public function __construct(){
        parent::__construct();
    }

    public function index(PageRequest $request){
        $this->data['users'] = User::orderBy('id', 'DESC')->paginate(10);
        return view('Backoffice.users.index', $this->data);
    }

    public function show(PageRequest $request, $id){
        $this->data['user'] = User::findOrFail($id);
        return view('Backoffice.users.show', $this->data);
    }

    public function edit(PageRequest $request, $id){
        $this->data['user'] = User::findOrFail($id);
        return view('Backoffice.users.edit', $this->data);
    }

    public function update(UserRequest $request, $id){
        DB::beginTransaction();
        try{
            $user = User::findOrFail($id);
            $user->name = $request->input('name');
            $user->email = strtolower($request->input('email'));

            if($request->filled('password')){
                $user->password = bcrypt($request->input('password'));
            }
            $user->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "User account updated.");
            return redirect()->route('backoffice.users.show', $user->id);
        }catch(\Exception $e){
            DB::rollback();
            session()->flash('notification-status', "error");
            session()->flash('notification-msg', "Something went wrong. Please try again.");
            return redirect()->back();
        }
    }

    public function destroy(PageRequest $request, $id){
        DB::beginTransaction();
        try{
            $user = User::findOrFail($id);
            $user->delete();
            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "User account deleted.");
        }catch(\Exception $e){
            DB::rollback();
            session()->flash('notification-status', "error");
            session()->flash('notification-msg', "Something went wrong. Please try again.");
        }

        return redirect()->route('backoffice.users.index');
    }
}
