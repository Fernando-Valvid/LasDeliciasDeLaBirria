<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users=User::simplePaginate(10);
        return view('admin.users.index')->with(compact('users')); // Listado de usuarios
    }

    public function edit($id){
        $user=User::find($id);
        return view('admin.users.edit')->with(compact('user')); //Formulario de edicion
    }

    public function update(Request $request, $id){
        $user=User::find($id);
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->save();

        return redirect('/admin/users');
    }

    public function destroy($id){
        $user=User::find($id);
        $user->delete();

        return back();
    }
}
