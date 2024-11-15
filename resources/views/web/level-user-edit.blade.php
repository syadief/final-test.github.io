@extends('layouts.app-dash')

@section('title', 'Level User | Ubah')

@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mt-2">Ubah</h5>
                <a href="/level-user" type="button" class="btn-close" aria-label="Close"></a>
            </div>
            <div class="card-body">
                <form action="/level-user/{{ $level->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $level->name }}" required>
                    </div>
                    <div class="text-end mt-4">
                        <button type="button" class="btn btn-kembali me-2" onclick="window.location.href='/level-user'">Kembali</button>

                        <button type="submit" class="btn btn-simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .card {
            border-radius: 15px;
            box-shadow: rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .card-header {
            background-color: white;
            border-bottom: 2px solid #dee2e6;
        }

        .btn-simpan {
            background-color: #00d4ff;
            color: white;
            border: none;
            padding: 8px 24px;
        }

        .btn-simpan:hover {
            background-color: #00bfe6;
            color: white;
        }

        .btn-kembali {
            background-color: white;
            color: black;
            border: 1px solid #dee2e6;
            padding: 8px 24px;
        }

        .btn-kembali:hover {
            background-color: #e9ecef;
        }
    </style>

@endsection
