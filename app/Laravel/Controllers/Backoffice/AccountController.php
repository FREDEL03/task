<?php

namespace App\Laravel\Controllers\Backoffice;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * List / view / edit / delete for one account table.
 * Subclasses set: $model (class), $base (route name prefix, e.g. 'backoffice.admins'), $title.
 */
abstract class AccountController extends Controller{

    protected function render($view, $record = null, $extra = []){
        return view("Backoffice.accounts.$view", ['base' => $this->base, 'title' => $this->title, 'record' => $record] + $extra);
    }

    public function index(){
        return $this->render('index', null, ['records' => $this->model::latest('id')->paginate(10)]);
    }

    public function show($id){
        return $this->render('show', $this->model::findOrFail($id));
    }

    public function edit($id){
        return $this->render('edit', $this->model::findOrFail($id));
    }

    public function update(Request $request, $id){
        $record = $this->model::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique($record->getTable())->ignore($record->id)],
            'password' => 'nullable|min:8|confirmed',
        ]);

        $record->update(array_filter($data));

        return redirect()->route("{$this->base}.show", $record->id)->with('success', 'Account updated.');
    }

    public function destroy($id){
        $record = $this->model::findOrFail($id);

        if ($this->isSelf($record)) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        $record->delete();

        return redirect()->route("{$this->base}.index")->with('success', 'Account deleted.');
    }

    protected function isSelf($record){
        return false;
    }
}
