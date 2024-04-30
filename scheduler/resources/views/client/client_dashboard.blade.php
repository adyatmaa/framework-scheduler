@extends('layouts.client')
@section('content')
    <main>
        <div class="container-fluid px-5">
            
            <div class="card my-3">
                <div class="card-body">
                    <p class="h4 mb-3 text-end">Howdy, {{ session('userNow.nama') }} 👋</p>
                    <p class="h3">Start your learning by doing all your course here</p>
                    <img src="{{ asset('assets/img/task.jpg') }}" alt="" style="width: 100%">
                </div>
            </div>
            {{--  --}}
        </div>
    </main>
@endsection
