<?php
    use Illuminate\Support\Facades\Route;
    // routes dashbord

Route::group(['prefix' => 'admin'],function (){
       Route::get('login',[\App\Http\Controllers\Admin\DashbordController::class,'login'])->name('admin.login');
       Route::post('post/login',[\App\Http\Controllers\Admin\DashbordController::class,'postLogin'])->name('admin.post.login');

    });

    Route::group(['prefix' => 'admin','middleware' => 'auth:admin'],function (){
        Route::get('dashbord',[\App\Http\Controllers\Admin\DashbordController::class,'dashbord'])->name('admin.dashbord');

        Route::post('logout','DashbordController@logout')->name('admin.logout');
        // categories route
        Route::resource('categories','CategoryController');
        // products route
        Route::resource('products','ProductController');
        // users route
        Route::resource('users','UsersController');
    });




?>
