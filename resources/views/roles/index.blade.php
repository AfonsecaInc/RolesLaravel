@extends('layouts.main', ['activePage' => 'roles', 'titlePage' => __('Listado de roles')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Roles</h4>
                            <p class="card-category"> Administración de roles</p>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    @can('role_create')
                                    <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">Add rol</a>
                                    @endcan
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Guard</th>
                                            <th>Creation date</th>
                                            <th>Permisos</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($roles as $role)
                                            <tr>
                                                <td>{{ $role->id }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>{{ $role->guard_name }}</td>
                                                <td>{{ $role->created_at }}</td>
                                                <td>
                                                    @forelse ($role->permissions as $permission)
                                                        <span class="badge badge-primary">{{ $permission->name}}</span>
                                                    @empty
                                                    <span class="badge badge-danger">No hay permisos asociados</span>
                                                    @endforelse
                                                </td>
                                                <td class="td-actions text-right">
                                                    @can('role_show')
                                                    <a rel="tooltip" class="btn btn-info btn-link"
                                                        href="{{ route('roles.show', $role->id) }}" data-original-title=""
                                                        title="Ver">
                                                        <i class="material-icons">visibility</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    @endcan
                                                    @can('role_edit')
                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                        href="{{ route('roles.edit', $role->id) }}" data-original-title=""
                                                        title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    @endcan
                                                    @can('role_destroy')
                                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                                        style="display: inline-block;" id="frmDelete">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button rel="tooltip" class="btn btn-danger btn-link eliminar" type="submit"
                                                            id="eliminar">
                                                            <i class="material-icons">delete</i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                    </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                            @empty
                                            <div class="col-12">No hay roles</div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer mr-auto">
                            {{ $roles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('.eliminar').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: '¿Está seguro?',
                text: "Esta acción no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire(
                        'Deleted!',
                        'El rol ha sido eliminado correctamente.',
                        'success'
                    )
                } else{
                    Swal.fire(
                        'Info!',
                        'Your rol has not been deleted.',
                        'info'
                    )
                }
            })
        });
    </script>
@endpush
