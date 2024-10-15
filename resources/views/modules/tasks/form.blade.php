@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form
                    @if ($action == 'create') action="{{ route('tasks.store') }}" @else action="{{ route('tasks.update', $task->id) }}" @endif
                    method="POST">
                    @csrf
                    @if ($action == 'edit')
                        @method('PUT')
                    @endif
                    <div class="card">
                        <div class="card-header">
                            {{ $task->exists ? 'Editar tarea' : 'Crear tarea' }}
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="dni" class="form-label">DNI <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="dni" required
                                        value="{{ $task->dni }}" name="dni">
                                    @error('dni')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="title" class="form-label">Título <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" required
                                        value="{{ $task->title }}" name="title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="description" class="form-label">
                                        Descripción
                                    </label>
                                    <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="due_date" class="form-label">
                                        Fecha de vencimiento
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" class="form-control" id="due_date" required
                                        value="{{ $task->due_date }}" name="due_date">
                                    @error('due_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="status" class="form-label">
                                        Estado <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" id="status" required name="status">
                                        <option value="" disabled selected>Seleccione un estado</option>
                                        <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>
                                            Pendiente
                                        </option>
                                        <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>
                                            En progreso
                                        </option>
                                        <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>
                                            Completado
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i>
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                @if ($action == 'create')
                                    Guardar
                                @else
                                    Actualizar
                                @endif
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
