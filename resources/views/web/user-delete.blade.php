@extends('layouts.app-dash')

@section('title', 'User | Hapus')

@section('content')

    <div class="container mt-5">
        <form style="display: inline-block" action="/user-destroy/{{ $user->id }}" method="post">
            @csrf
            @method('delete')
            <h2 class="mt-3">Apakah Kamu Yakin Hapus Data: {{ $user->id }} ({{ $user->name }})</h2>
                <button type="submit" class="btn btn-danger mt-3">Hapus</button>
                <button type="button" class="btn btn-kembali me-2 mt-3" style="background-color: white;">
                    <a href="/user" style="text-decoration: none; color: inherit;">Kembali</a>
                </button>
        </form>
    </div>

@endsection
