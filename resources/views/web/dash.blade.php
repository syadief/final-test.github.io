@extends('layouts.app-dash')

@section('title', 'Dashboard')

@section('content')
    <div class="judul">
        <h2>Dashboard</h2>
        <span style="margin-top: 45px;">Home > Dashboard</span>
    </div>
    <div class="main-content">
        <div class="title">
            <h2>
                Daftar
            </h2>
            <div class="actions">
                <button class="btn-add">
                    Tambah
                </button>
                <button class="btn-export">
                    Export
                </button>
                <button class="btn-import">
                    Import
                </button>
            </div>
        </div>

        <div class="container">
            <div class="entries">
                <span>Tampilkan</span>
                <div class="dropdown-placeholder">
                    <span>10</span>
                    <i class="fa-solid fa-sort"></i>
                </div>
                <span>Entri</span>
            </div>
            <form action="" method="get">
                <div class="search-filter">
                    <div class="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" name="keyword" placeholder="Cari">
                    </div>
            </form>
            <div class="filter">
                <i class="fas fa-filter"></i>
                <span>Filter</span>
            </div>
        </div>
    </div>
    </div>

    <style>
        .container {
            display: flex;
            align-items: center;
            padding: 10px;
        }

        .entries {
            display: flex;
            align-items: center;
            margin-right: auto;
            margin-top: -15px
        }

        .entries .dropdown-placeholder {
            margin: 0px 5px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 80px;
            height: 30px;
            cursor: default;
            margin-right: 15px;
            margin-left: 15px;
        }

        .search-filter {
            display: flex;
            align-items: center;
        }

        .search-filter .search,
        .search-filter .filter {
            display: flex;
            align-items: center;
            margin-left: 10px;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-filter .search input {
            border: none;
            outline: none;
            margin-left: 5px;
            width: 150px
        }

        .search-filter .filter {
            cursor: pointer;
        }

        .filter i {
            margin-right: 5px;
        }
    </style>

@endsection
