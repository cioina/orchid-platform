<?php

declare(strict_types=1);

use Orchid\Platform\Http\Controllers\Auth\ForgotPasswordController;
use Orchid\Platform\Http\Controllers\Auth\LoginController;
use Orchid\Platform\Http\Controllers\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Auth Web Routes
|--------------------------------------------------------------------------
|
| Base route
|
*/

if (config('platform.auth', true)) {
    // Authentication Routes...
    $this->router->get('login', [LoginController::class, 'showLoginForm'])->name('login');
    $this->router->post('login', [LoginController::class, 'login'])->name('login.auth');
    $this->router->get('lock', [LoginController::class, 'resetCookieLockMe'])->name('login.lock');

    if (config('platform.password_reset', true)) {
        // Password Reset Routes...
        $this->router->get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
        $this->router->post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
        $this->router->get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
        $this->router->post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    }

    // Two-Factor Authentication Routes...
    $this->router->get('login/token', [LoginController::class, 'showTokenForm'])->name('login.token');
    $this->router->post('login/token', [LoginController::class, 'verifyToken'])->name('login.token.auth');
}

$this->router->get('switch-logout', [LoginController::class, 'switchLogout']);

$this->router->post('switch-logout', [LoginController::class, 'switchLogout'])->name('switch.logout');
$this->router->post('logout', [LoginController::class, 'logout'])->name('logout');
