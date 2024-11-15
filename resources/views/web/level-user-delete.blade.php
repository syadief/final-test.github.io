@extends('layouts.app-dash')

@section('title', 'Level User | Hapus')

@section('content')

    <div class="container mt-5">
        <form style="display: inline-block" action="/level-user-destroy/{{ $level->id }}" method="post">
            @csrf
            @method('delete')
            <h2 class="mt-3">Apakah Kamu Yakin Hapus Data: {{ $level->id }} ({{ $level->name }})</h2>
                <button type="submit" class="btn btn-danger mt-3">Hapus</button>
                <button type="button" class="btn btn-kembali me-2 mt-3" style="background-color: white;">
                    <a href="/level-user" style="text-decoration: none; color: inherit;">Kembali</a>
                </button>
        </form>
    </div>

@endsection