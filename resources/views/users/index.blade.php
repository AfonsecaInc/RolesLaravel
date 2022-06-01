@extends('layouts.main', ['activePage' => 'users', 'titlePage' => __('Listado de usuarios')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Users</h4>
                            <p class="card-category"> Administración de usuarios</p>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    @can('user_create')
                                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Add user</a>
                                    @endcan
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Rol</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @forelse ($user->roles as $role)
                                                        <span class="badge badge-info">{{$role->name}}</span>
                                                    @empty
                                                        <span class="badge badge-danger">No hay rol asociado</span>
                                                    @endforelse
                                                </td>
                                                <td class="td-actions text-right">
                                                    @can('user_show')
                                                    <a rel="tooltip" class="btn btn-info btn-link"
                                                        href="{{ route('users.show', $user->id) }}" data-original-title=""
                                                        title="Ver">
                                                        <i class="material-icons">visibility</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    @endcan
                                                    @can('user_edit')
                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                        href="{{ route('users.edit', $user->id) }}" data-original-title=""
                                                        title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    @endcan
                                                    @can('user_destroy')
                                                    <form action="{{ route('users.delete', $user->id) }}" method="post"
                                                        style="display: inline-block;">
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
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer mr-auto">
                            {{ $users->links() }}
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
                }else{
                    Swal.fire(
                        'Cancelado!',
                        'El usuario no ha sido eliminado.',
                        'info'
                    )
                }
            })
        });
    </script>
@endpush
