@extends('layouts.admin')
@section('content')
    <main>
        <div class="container-fluid py-3 px-4">
            <p class="h4">All Participant</p>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10%">No</th>
                                <th style="width: 70%">Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($user as $user)
                                @if ($user->role == 'student')
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>{{ $user->nama }}</td>
                                        <td>
                                            <a href="{{ route('admin_parDetail', ['id' => $user->id]) }}"
                                                class="btn btn-success mb-3">See Details</a>
                                            <form action="{{ route('admin_deletePar', ['id' => $user->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
@endsection
