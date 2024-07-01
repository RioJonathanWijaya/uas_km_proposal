<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('{id}', [ProposalController::class, 'viewPdf'])->name('proposals.pdf');
