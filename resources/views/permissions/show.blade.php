@extends('layouts.main', ['activePage' => 'permissions', 'titlePage' => __('Información de permiso')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h5 class="title">Información detallada del permiso {{$permission->name}}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="title" class="form-control" placeholder="title"
                                    value="{{ $permission->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="title" class="form-control" placeholder="title"
                                    value="{{ $permission->guard_name }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
