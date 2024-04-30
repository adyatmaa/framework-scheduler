@extends('layouts.client')
@section('content')
    <main>
        <div class="container-fluid px-5 py-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="{{ route('user_submit', ['id' => $jadwal->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" id="" value="{{ $jadwal->id }}">
                                <input type="hidden" name="status_id" id="" value="{{ $jadwal->status_id }}">
                                <div class="mb-3">
                                    <label for="">Course Title</label>
                                    <input type="text" name="judul" style="background-color: white"
                                        class="form-control" id="" value="{{ $jadwal->judul }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="">Course Time</label>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text"
                                                style="width: 100%; border: none;"class="form-control bg-white"
                                                value="{{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->format('l') }}"
                                                disabled>
                                            <input type="date"
                                                style="width: 100%;border: none;"class="form-control bg-white"
                                                value="{{ $jadwal->tanggal_mulai }}" disabled>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control bg-white" value="Until"
                                                style="border: white" disabled>
                                        </div>
                                        <div class="col">
                                            <input type="text" style="width: 100%; border:none;"
                                                class="form-control bg-white"
                                                value="{{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->format('l') }}"
                                                disabled>
                                            <input type="date" style="width: 100%; border:none;"
                                                class="form-control bg-white" value="{{ $jadwal->tanggal_selesai }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Course Location</label>
                                    <input type="text" class="form-control bg-white" value="{{ $jadwal->lokasi }}"
                                        disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Task Description</label>
                                    <textarea class="form-control bg-white" name="deskripsi" id="deskripsi" cols="30" style="width: 100%"
                                        rows="5" disabled>{{ $jadwal->deskripsi }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Mark as Done</button>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <img src="{{ asset('assets/img/assign.jpg') }}" alt="" style="width: 100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
