@extends('layouts.home')

@section('content')
<section class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6">
            <div class="custom-card card text-center">
                <div class="card-header">
                    Crie Uma Tarefa
                </div>
                <div class="card-body">
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Adicionar Tarefa</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection