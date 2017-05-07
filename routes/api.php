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

Route::get('/create', function(){
    $user1 = new User();
    $user1 -> name = 'Ahmed';
    $user1 -> email = 'ahmed@gmail.com';
    $user1 -> password = '123';
    $user1 -> save();

    $user2 = new User();
    $user2 -> name =  'Amr';
    $user2 -> email = 'amr@gmail.com';
    $user2 -> password = '123';
    $user2 -> save();
});
Route::get('/start', function(){



    $admin = new Role();
    $admin -> name = 'Admin';
    $admin -> save();

    $user = new Role();
    $user -> name = 'Editor';
    $user -> save();

    $read = new Permission();
    $read -> name = 'can_read';
    $read -> display_name = 'Can Read Data';
    $read -> save();

    $delete = new Permission();
    $delete -> name = 'can_delete';
    $delete -> display_name = 'Can Delete Data';
    $delete -> save();

    $edit = new Permission();
    $edit -> name = 'can_edit';
    $edit -> display_name = 'Can Edit Data';
    $edit -> save();

    $user -> attachPermission($read);
    $user -> attachPermission($edit);
    $admin -> attachPermission($read);
    $admin -> attachPermission($edit);
    $admin -> attachPermission($delete);


    $user1 = User::find(1);
    $user2 = User::find(2);

    $user1->attachRole($admin);
    $user2->attachRole($user);

});

Route::get('/read', function(){

    Auth::loginUsingId(2);

    $user = Auth::user();
    if($user -> hasRole('Admin')){
            return 'Secret';
    }
    return 'Public';

});
Route::filter('editalbe', function(){
   $user = Auth::user();

   if(!$user->ability(['Admin'], ['can_edit'])){
       return Redirect::home();
   }
});
