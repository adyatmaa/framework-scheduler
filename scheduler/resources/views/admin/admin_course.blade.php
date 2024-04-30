@extends('layouts.admin')
@section('content')
    <main>
        <div class="container-fluid">
            @if ($jadwal->isEmpty())
                <p class="h6 mt-3">No Course Here</p>
            @else
                <div class="container-fluid">
                    <div class="form-control bg-white mt-3" style="border: 0;">
                        <strong class="h4">Course List</strong>
                    </div>
                </div>
                @foreach ($jadwal as $jadwal)
                    <div class="card my-3 mx-3" style="width: 75%">
                        <div class="card-body">
                            <h5 class="card-title">{{ $jadwal->judul }}</h5>
                            <textarea name="deskripsi" class="form-control bg-white" id="" style="width: 75%" cols="30" rows="3"
                                disabled>{{ $jadwal->deskripsi }}</textarea>
                            <input type="text" name="" style="border: 0ch" id=""
                                value="Course Loocation : {{ $jadwal->lokasi }}" class="form-control bg-white my-3"
                                disabled>
                            <div class="container ml-3 mb-3">
                                <p class="card-text">Course Started:
                                    {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->translatedFormat('l, d F Y') }}</p>
                            </div>
                            <div class="container ml-3">
                                <p class="card-text">Course End:
                                    {{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->translatedFormat('l, d F Y') }}</p>
                            </div>
                            <a href="{{ route('admin_editCourse', ['id' => $jadwal->id]) }}"
                                class="btn btn-primary my-3">Edit this course</a>
                            <form action="{{ route('admin_deleteCourse', ['id' => $jadwal->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete this Course</button>
                            </form>

                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </main>
@endsection
