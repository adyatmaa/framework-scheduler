@extends('layouts.header')
@section('content')
    <main>
        <div class="container-fluid ">
            <p class="h3">Sharpen Your Skills Here</p>
            <div class="row">
                <div class="col" style="">
                    <div class="card border-0">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <img src="https://img.freepik.com/free-vector/college-project-concept-illustration_114360-13751.jpg?t=st=1714059546~exp=1714063146~hmac=5dee0201d08aec540caae4acb0acbdd83e8e20b859f76dc846bcffb3e19beb4c&w=1800"
                                        class="rounded" width="100%">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0">
                        <div class="card justify-content-center align-items-center">
                            <div class="card-body">
                                <p class="card-text">Start your learn here!</p>
                            </div>
                            <form action="{{ route('userLogin') }}" method="POST">
                                @csrf
                                <div class="container-fluid">
                                    <div class="col">
                                        <div class="container">
                                            <div class="col mb-3">
                                                <div class="row mb-3">
                                                    <label for="">Username</label>
                                                    <input type="text" name="username" class="form-control"
                                                        style="width: 100%">
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="">Password</label>
                                                    <input type="password" name="password" class="form-control"
                                                        style="width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                        <center>
                                            <div class="container">
                                                <button type="submit" class="btn btn-primary mb-3">Login</button>
                                            </div>

                                            <div class="container">
                                                <p>Don't have an account?<a href="{{ route('user_register') }}">Sign in
                                                        Here</a></p>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
