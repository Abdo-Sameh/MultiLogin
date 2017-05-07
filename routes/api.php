<?php

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/start', function(){

    $read = Permission::find(3);
    $create = Permission::find(1);
    $edit = Permission::find(2);
    $delete = Permission::find(4);

    $user1 = User::find(1);
    $user2 = User::find(2);
    $admin = Role::find(1);
    $user = Role::find(2);


    $user -> attachPermission($read);
    $admin -> attachPermission($read);
    $admin -> attachPermission($edit);
    $admin -> attachPermission($delete);
    $admin -> attachPermission($create);

    $user1->attachRole($admin);
    $user2->attachRole($user);

});

Route::get('/read', function(){

    Auth::loginUsingId(1);

    $user = Auth::user();
    if($user -> hasRole('admin')){
            return 'Secret';
    }
    return 'Public';

});
