<?php

namespace App\Laravel\Controllers\Backoffice;

/*
 * Request Validator
 */
use App\Laravel\Requests\Backoffice\AdminRequest;
use App\Laravel\Requests\PageRequest;

use App\Laravel\Models\Admin;
use Illuminate\Support\Facades\DB;

/*
 * Admin Accounts module: list, view, edit, delete (no create)
 */
class AdminController extends Controller{

    protected $data;

    public function __construct(){
        parent::__construct();
    }

    public function index(PageRequest $request){
        $this->data['admins'] = Admin::orderBy('id', 'DESC')->paginate(10);
        return view('Backoffice.admins.index', $this->data);
    }

    public function show(PageRequest $request, $id){
        $this->data['admin'] = Admin::findOrFail($id);
        return view('Backoffice.admins.show', $this->data);
    }

    public function edit(PageRequest $request, $id){
        $this->data['admin'] = Admin::findOrFail($id);
        return view('Backoffice.admins.edit', $this->data);
    }

    public function update(AdminRequest $request, $id){
        DB::beginTransaction();
        try{
            $admin = Admin::findOrFail($id);
            $admin->name = $request->input('name');
            $admin->email = strtolower($request->input('email'));

            if($request->filled('password')){
                $admin->password = bcrypt($request->input('password'));
            }
            $admin->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Admin account updated.");
            return redirect()->route('backoffice.admins.show', $admin->id);
        }catch(\Exception $e){
            DB::rollback();
            session()->flash('notification-status', "error");
            session()->flash('notification-msg', "Something went wrong. Please try again.");
            return redirect()->back();
        }
    }

    public function destroy(PageRequest $request, $id){
        $admin = Admin::findOrFail($id);

        // an admin should not be able to delete their own account
        if($admin->id == auth('backoffice')->id()){
            session()->flash('notification-status', "error");
            session()->flash('notification-msg', "You cannot delete your own account.");
            return redirect()->back();
        }

        DB::beginTransaction();
        try{
            $admin->delete();
            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Admin account deleted.");
        }catch(\Exception $e){
            DB::rollback();
            session()->flash('notification-status', "error");
            session()->flash('notification-msg', "Something went wrong. Please try again.");
        }

        return redirect()->route('backoffice.admins.index');
    }
}
