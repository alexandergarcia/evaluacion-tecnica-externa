@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endpush

@push('js')
    <script type="module" src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="module">
        $(document).ready(function() {
            $('#tasks-table').DataTable();
        });

        @if (session('success'))
            Swal.fire({
                title: 'Bien hecho!',
                text: '{{ session('success') }}',
                icon: 'success',
                showConfirmButton: true,
                timer: 1500
            });
        @endif
    </script>

    <script>
        function deleteTask(id, title) {
            var form = $('#delete-task-' + id);
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Usted va a eliminar una tarea con el título: " + title,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Listado de tareas
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                            Crear tarea
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tasks-table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">DNI</th>
                                        <th scope="col">Título</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Fecha de vencimiento</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $task->dni }}</td>
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $task->description }}</td>
                                            <td @class([
                                                'table-danger' => $task->due_date < now() && $task->status != 'completed',
                                            ])>
                                                {{ $task->due_date }}
                                            </td>
                                            <td>
                                                @if ($task->status == 'pending')
                                                    <span class="badge bg-warning text-dark">
                                                        Pendiente
                                                    </span>
                                                @elseif ($task->status == 'in_progress')
                                                    <span class="badge bg-info text-dark">
                                                        En progreso
                                                    </span>
                                                @elseif ($task->status == 'completed')
                                                    <span class="badge bg-success">
                                                        Completado
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('tasks.edit', $task->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form class="d-inline" action="{{ route('tasks.destroy', $task->id) }}"
                                                    method="POST" id="delete-task-{{ $task->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="deleteTask({{ $task->id }}, '{{ $task->title }}')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
