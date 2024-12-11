@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="display-4">Welcome to Pawtopia</h1>
        <p class="lead">A Basic Laravel CRUD Application developed as part of the Finals Exam for Prof Elective 5 - Advanced Web Development: Back-end.</p>
        <p class="text-muted">Created by: <strong>{{ 'Cyanne Justin Vega' }}</strong></p>
        <p class="text-muted">Submitted to: <strong>{{ 'Mr. Jim-mar de los Reyes' }}</strong></p>

        <footer class="mt-5">
            <p class="text-muted">Copyright &copy; {{ date('Y') }} Your Company. All rights reserved.</p>
        </footer>
    </div>


@endsection
