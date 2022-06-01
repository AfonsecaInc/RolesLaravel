@extends('layouts.main', ['activePage' => 'roles', 'titlePage' => __('Información de rol')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h5 class="title">Información detallada del rol {{$role->name}}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="role"
                                    value="{{ $role->name }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">{{ __('Permisos asociados') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="profile">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                @forelse ( $role->permissions as $permission)
                                                                    <span class="badge badge-primary rouded-pill ">{{$permission->name}}</span>
                                                                @empty
                                                                No hay roles asignados
                                                                @endforelse
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
