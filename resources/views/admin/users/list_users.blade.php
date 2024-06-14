@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <h1>Listado de Usuarios</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Nuevo Usuario</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                
                <tr>
                <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->role)
                            {{ $user->role->name }}
                        @else
                            Sin Rol Asignado
                        @endif
                    </td>
                    <td>
                    <a href="{{ route('admin.users.profile', $user->id) }}" class="btn btn-info">Detalles</a>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
