<?php
// Routes/api.php
Route::get('/cart-status', [CartController::class, 'getStatus']);
