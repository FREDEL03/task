<?php

namespace App\Laravel\Traits;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Login / register / logout / profile for one guard.
 * The using controller sets: $guard ('portal'|'backoffice'), $model (class), $home (route name).
 */
trait GuardedAccount
{
    protected function auth()
    {
        return auth($this->guard);
    }

    protected function viewName($name)
    {
        return ucfirst($this->guard) . '.' . $name;
    }

    public function showLogin()
    {
        return view($this->viewName('auth.login'));
    }

    public function showRegister()
    {
        return view($this->viewName('auth.register'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate(['email' => 'required|email', 'password' => 'required']);

        if (!$this->auth()->attempt($credentials, $request->boolean('remember'))) {
            return back()->withInput($request->only('email'))->withErrors(['email' => 'Invalid credentials.']);
        }

        $request->session()->regenerate();

        return redirect()->route($this->home);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique((new $this->model)->getTable())],
            'password' => 'required|min:8|confirmed',
        ]);

        $this->auth()->login($this->model::create($data));
        $request->session()->regenerate();

        return redirect()->route($this->home);
    }

    public function logout(Request $request)
    {
        $this->auth()->logout();
        $request->session()->regenerateToken();

        return redirect()->route($this->guard . '.auth.login');
    }

    public function show()
    {
        return view($this->viewName('profile.show'), ['user' => $this->auth()->user()]);
    }

    public function edit()
    {
        return view($this->viewName('profile.edit'), ['user' => $this->auth()->user()]);
    }

    public function update(Request $request)
    {
        $user = $this->auth()->user();
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique($user->getTable())->ignore($user->id)],
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->update(array_filter($data));

        return redirect()->route($this->guard . '.profile.show')->with('success', 'Profile updated.');
    }
}
