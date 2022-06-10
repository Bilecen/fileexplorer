<?php
/*
Description: UserService
Version: 1.0
Author: muhammettahabilecen
Author URI: http://muhammettahabilecen.com
License: By Muhammet Taha Bilecen
*/

namespace App\Http\Controllers\Service;


use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class UserService implements GenericService
{

    use ValidatesRequests;

    public function insert(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->isadminrole = $request->isadminrole == 1 ? true : false;
        $user->isdeleterole = $request->isdeleterole == 1 ? true : false;
        $user->save();
        return $this->selectAll($request);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);

        $user = User::find($request->id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->isadminrole = $request->isadminrole == 1 ? true : false;
        $user->isdeleterole = $request->isdeleterole == 1 ? true : false;
        $user->save();
        return $this->selectAll($request);
    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);
        $user = User::find($request->id);
        $user->deleted();
        return $this->selectAll($request);
    }

    public function selectAll(Request $request)
    {
        return User::all();
    }
}
