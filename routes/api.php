<?php

use App\Http\Controllers\BorrowingController;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});
Route::post('/borrow', [BorrowingController::class, 'borrow']);
