@extends('layouts.app-dash')

@section('title', 'User | Ubah')

@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mt-2">Ubah</h5>
                <a href="/user" type="button" class="btn-close" aria-label="Close"></a>
            </div>
            <div class="card-body">
                <form action="/user/{{ $user->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Nomor HP</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="level">Level</label>
                        <select name="levels_id" id="levels_id" class="form-control" required>
                            <option value="{{ $user->levels->id }}">{{ $user->levels->name }}</option>
                            @foreach ($level as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-end mt-4">
                        <button type="button" class="btn btn-kembali me-2" onclick="window.location.href='/user'">Kembali</button>
                        <button type="submit" class="btn btn-simpan" >Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
