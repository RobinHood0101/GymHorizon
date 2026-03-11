<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('create-admin-user', function () {
    $admin = User::create([
        'name' => config('statamic.users.admin_name'),
        'email' => config('statamic.users.admin_email'),
        'password' => config('statamic.users.admin_password'),
    ]);
    $admin->super = true;
    $admin->save();
    $this->comment('Successfully created statamic cms admin user');
})->purpose('test');
