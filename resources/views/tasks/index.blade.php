@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD de Tarefas</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('tasks.create') }}"> Criar Nova Tarefa</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nº</th>
            <th>Título</th>
            <th>Descrição</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $loop->iteration + ($tasks->currentPage() - 1) * $tasks->perPage() }}</td>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>
                <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('tasks.show',$task->id) }}">Mostrar</a>
                    <a class="btn btn-primary" href="{{ route('tasks.edit',$task->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $tasks->links() !!}
@endsection
