<?php

use App\Laravel\Models\Admin;
use App\Laravel\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('web pages are public', function () {
    foreach (['/', '/about', '/contact', '/articles', '/articles/welcome-to-the-portal'] as $url) {
        $this->get($url)->assertOk();
    }
    $this->get('/articles/nope')->assertNotFound();
});

test('web topbar shows the portal user name and portal button', function () {
    $user = User::factory()->create(['name' => 'Jane Reader']);

    $this->get('/')->assertSee('Sign Up');
    $this->actingAs($user, 'portal')->get('/')->assertSee('Jane Reader')->assertSee('Go to Portal');
});

test('portal requires login and shows cms pages', function () {
    $this->get('/user')->assertRedirect('/user/login');

    $this->actingAs(User::factory()->create(), 'portal');
    foreach (['/user', '/user/profile', '/user/profile/edit', '/user/cms/home', '/user/cms/about', '/user/cms/contact'] as $url) {
        $this->get($url)->assertOk();
    }
});

test('portal register and login work', function () {
    $this->post('/user/register', ['name' => 'New', 'email' => 'n@x.com', 'password' => 'password1', 'password_confirmation' => 'password1'])
        ->assertRedirect('/user');
    $this->assertAuthenticatedAs(User::first(), 'portal');
});

test('guards are separate', function () {
    $this->actingAs(User::factory()->create(), 'portal')->get('/admin')->assertRedirect('/admin/login');
    $this->actingAs(Admin::create(['name' => 'A', 'email' => 'a@x.com', 'password' => 'password1']), 'backoffice')
        ->get('/admin')->assertOk();
});

test('backoffice manages accounts without create and cannot delete self', function () {
    $admin = Admin::create(['name' => 'A', 'email' => 'a@x.com', 'password' => 'password1']);
    $user = User::factory()->create();
    $this->actingAs($admin, 'backoffice');

    foreach (['/admin/admins', '/admin/users', "/admin/users/{$user->id}", "/admin/users/{$user->id}/edit", '/admin/profile', '/admin/profile/edit'] as $url) {
        $this->get($url)->assertOk();
    }
    $this->get('/admin/users/create')->assertNotFound();

    $this->put("/admin/users/{$user->id}", ['name' => 'Renamed', 'email' => $user->email])->assertRedirect();
    expect($user->fresh()->name)->toBe('Renamed');

    $this->delete("/admin/admins/{$admin->id}")->assertSessionHas('notification-status', 'error');
    expect(Admin::count())->toBe(1);

    $this->delete("/admin/users/{$user->id}");
    expect(User::count())->toBe(0);
});
