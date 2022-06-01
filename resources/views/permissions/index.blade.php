@extends('layouts.main', ['activePage' => 'permissions', 'titlePage' => __('Listado de permisos')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Permisos</h4>
                            <p class="card-category"> Administración de permisos</p>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    @can('permission_create')
                                        <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-primary">Add permiso</a>
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
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($permissions as $permission)
                                            <tr>
                                                <td>{{ $permission->id }}</td>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->guard_name }}</td>
                                                <td>{{ $permission->created_at }}</td>
                                                <td class="td-actions text-right">
                                                    @can('permission_show')
                                                    <a rel="tooltip" class="btn btn-info btn-link"
                                                        href="{{ route('permissions.show', $permission->id) }}" data-original-title=""
                                                        title="Ver">
                                                        <i class="material-icons">visibility</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    @endcan
                                                    @can('permission_edit')
                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                        href="{{ route('permissions.edit', $permission->id) }}" data-original-title=""
                                                        title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    @endcan
                                                    @can('permission_destroy')
                                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
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
                                            <div class="col-12">No hay permisos</div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer mr-auto">
                            {{ $permissions->links() }}
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
                        'El permiso ha sido eliminado correctamente.',
                        'success'
                    )
                } else{
                    Swal.fire(
                        'Info!',
                        'Your permiso has not been deleted.',
                        'info'
                    )
                }
            })
        });
    </script>
@endpush
