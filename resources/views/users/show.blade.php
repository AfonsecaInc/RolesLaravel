@extends('layouts.main', ['activePage' => 'users', 'titlePage' => __('Información de usuario')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h5 class="title">Información detallada del usuario {{$user->name}}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name"
                                    value="{{ $user->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username"
                                    value="{{ $user->username }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="Email address"
                                    value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h5 class="title">Rol asociado</h5>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    @forelse ( $user->roles as $role)
                                                        <span class="badge badge-primary rouded-pill ">{{$role->name}}</span>
                                                    @empty
                                                        <span class="badge badge-danger">No hay rol asociado</span>
                                                    @endforelse
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Password</h5>
                        </div>
                        <form method="post" action="https://black-dashboard-laravel.creative-tim.com/profile/password"
                            autocomplete="off">
                            <div class="card-body">
                                <input type="hidden" name="_token" value="kbU2BAaZCAFhTSiqXEEwrAt8wzy9eOlkA2Z8IfRp"> <input
                                    type="hidden" name="_method" value="put">
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" name="old_password" class="form-control"
                                        placeholder="Current Password" value="" required="">
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="New Password"
                                        value="" required="">
                                </div>
                                <div class="form-group">
                                    <label>Confirm New Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Confirm New Password" value="" required="">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-fill btn-primary">Change password</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="card-header card-header-primary">
                            <h5 class="title text-center">Foto</h5>
                        </div>
                        <div class="card-body">
                            <div class="author">
                                <img class="img avatar" src="{{asset('img/faces/avatar.jpg')}}" alt="">
                                <p class="description">
                                    {{$user->username}}
                                </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="button-container">
                                <button class="btn btn-icon btn-round btn-facebook">
                                    <i class="fab fa-facebook"></i>
                                </button>
                                <button class="btn btn-icon btn-round btn-twitter">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button class="btn btn-icon btn-round btn-google">
                                    <i class="fab fa-google-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
