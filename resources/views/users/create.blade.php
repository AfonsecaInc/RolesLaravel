@extends('layouts.main', ['activePage' => 'users', 'titlePage' => __('Nuevo usuario')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('users.store') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Create Profile') }}</h4>
                                <p class="card-category">{{ __('User information') }}</p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name="name" id="input-name" type="text" placeholder="{{ __('Name') }}"
                                                value="{{ old('name', '') }}" ="true"
                                                aria-="true" autofocus />
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Username') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                name="username" id="input-username" type="text" placeholder="{{ __('Username') }}"
                                                value="{{ old('username', '') }}" ="true"
                                                aria-="true" />
                                            @if ($errors->has('username'))
                                                <span id="username-error" class="error text-danger"
                                                    for="input-username">{{ $errors->first('username') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="email" id="input-email" type="email"
                                                placeholder="{{ __('Email') }}"
                                                value="{{ old('email', '') }}"  />
                                            @if ($errors->has('email'))
                                                <span id="email-error" class="error text-danger"
                                                    for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                name="password" id="input-password" type="password"
                                                placeholder="{{ __('Password') }}"
                                                 />
                                            @if ($errors->has('password'))
                                                <span id="password-error" class="error text-danger"
                                                    for="input-password">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header card-header-primary">
                                                <h4 class="card-title">{{ __('Asignar rol') }}</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active">
                                                        <table class="table">
                                                            <tbody>
                                                                @forelse ( $roles as $id => $rol)
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" name="roles[]" value="{{$id}}">
                                                                                <span class="form-check-sign">
                                                                                    <span class="check"></span>
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{$rol}}</td>
                                                                </tr>
                                                                @empty
                                                                No hay roles asignados

                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
