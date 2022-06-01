<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index(){
        abort_if(Gate::denies('user_index'), 403);
        $users = User::paginate(6);
        return view('users.index', compact('users'));
    }

    public function create(){
        abort_if(Gate::denies('user_create'), 403);
        $roles = Role::all()->pluck('name', 'id');
        return view('users.create', compact('roles'));
    }

    public function store(CreateUserRequest $request){
        $user = User::create($request->only('name', 'username', 'email')
        + [
            'password' => bcrypt($request->input('password')),
        ]);
        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('users.show', $user)->with(['success' => 'Usuario creado exitosamente', 'icon' => 'success']);
    }

    public function show(User $user){
        abort_if(Gate::denies('user_show'), 403);
        $user->load('roles');
        return view('users.show', compact('user'));
    }

    public function edit(User $user){
        abort_if(Gate::denies('user_edit'), 403);
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user){
        $data = $request->only('name', 'username', 'email');
        $pass = $request->input('password');
        if($pass){
            $data['password'] = bcrypt($pass);
        }
        $user->update($data);
        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('users.show', $user->id)->with(['success' => 'Actualizado correctamente', 'icon' => 'info']);
    }

    public function destroy(User $user){
        abort_if(Gate::denies('user_destroy'), 403);
        if(auth()->user()->id == $user->id){
            return redirect()->route('users.index')->with(['success' => 'No es posible eliminar tu usuario.', 'icon' => 'warning']);
        }
        $user->delete();
        return redirect()->route('users.index')->with(['success' => 'Eliminado correctamente', 'icon' => 'warning']);
    }
}
