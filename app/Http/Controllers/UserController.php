<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        
        return view('users', ['title' => 'Usuários', 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = Position::all(['id', 'name']);

	    return view('user-create', ['title' => 'Cadastar Novo Usuário', 'positions' => $positions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        
        $user = new User();
        $user->name = $validated['name'];
        $user->position_id = $validated['position_id'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);

        $saved = $user->save();

        if($saved) {
            Session::flash('userCreateSuccess', 'Usuário cadastrado com sucesso!');
        } else {
            Session::flash('userCreateFail', 'Ocorreu uma falha!');
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(auth()->user()->position_id == 1) {
            $user = User::find($id);
            
            return view('user', ['title' => 'Usuários', 'user' => $user]);
        } else {
            $userId = auth()->user()->id;
            $user = User::find($userId);
            
            return view('user', ['title' => 'Usuários', 'user' => $user]);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $positions = Position::all(['id', 'name']);

	    return view('user-edit', ['title' => 'Editar Usuários', 'user' => $user, 'positions' => $positions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'position_id' => 'required',
            'email' => 'required|email',
        ]);
	    $user = User::find($id);
        $updated = $user->update($validated);
        if($updated) {
            Session::flash('userUpdateSuccess', 'Usuário atualizado com sucesso!');
        } else {
            Session::flash('userUpdateFail', 'Ocorreu uma falha!');
        }
        return back();
    }

    public function passwordUpdate(Request $request, string $id)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        
        $user = User::find($id);
        
        if($user->id != Auth::user()->id) {
            Session::flash('pwdUpdateFail', 'Ocorreu uma falha!');
            return back();
        }
        
        if (!Hash::check($validated['current_password'], Auth::user()->password)) {
            return redirect()->back()->with('current_pwd_error', 'Senha atual incorreta.');
        }
        
        $updated = $user->update($validated);

        if($updated) {
            Session::flash('pwdUpdateSuccess', 'Senha atualizada com sucesso!');
        } else {
            Session::flash('pwdUpdateFail', 'Ocorreu uma falha!');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = User::destroy($id);
        
        if($deleted) {
            Session::flash('delUserSuccess', 'Usuário excluído com sucesso!');
        } else {
            Session::flash('delUserFail', 'Ocorreu uma falha!');
        }
        return back();

    }
}
