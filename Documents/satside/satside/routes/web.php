<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['verified'])->name('dashboard');

Route::get('sanctions-tracker', function () {
    return Inertia::render('SanctionsTracker');
})->name('sanctions-tracker');

Route::get('diplomatic-pulse', function () {
    return Inertia::render('DiplomaticPulseMonitor');
})->name('diplomatic-pulse');

Route::get('investment-risk', function () {
    return Inertia::render('InvestmentRiskForecaster');
})->name('investment-risk');

require __DIR__.'/settings.php';

require __DIR__.'/auth.php';