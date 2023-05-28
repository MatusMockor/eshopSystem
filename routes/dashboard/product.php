<?php

use App\Http\Controllers\ProductController;

Route::group(['prefix' => 'categories', 'middleware' => 'roles:admin'], function () {

});
