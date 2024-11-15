@extends('layouts.app-dash')

@section('title', 'Profile')

@section('content')
    <div class="judul">
        <h2>Profile</h2>
        <span style="margin-top: 45px;">Home > User</span>
    </div>
    <div class="main-content">
        <form class="kotak" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="cont">
                <div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                            required>

                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username"
                            value="{{ old('username', auth()->user()->username) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" id="email"
                            value="{{ old('email', auth()->user()->email) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone number</label>
                        <input type="text" name="phone" id="phone"
                            value="{{ old('phone', auth()->user()->phone) }}" required>
                    </div>
                </div>

                <div class="profile-container">
                    <div class="profile-image">
                        <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/default.jpg') }}"
                            alt="Foto Profil" width="150">
                    </div>
                    <div class="profile-photo">
                        <label for="profilePhotoInput" class="camera-icon">
                            <i class="fas fa-camera" type="file" name="photo" id=""></i>
                        </label>
                        <input name="photo" type="file" id="profilePhotoInput" class="file-input" accept="image/*"
                            onchange="uploadPhoto()">
                    </div>

                </div>
            </div>
            <hr>
            <div class="buttons">
                <button type="reset" class="reset-btn">Reset</button>
                <button type="submit" class="save-btn">Simpan</button>
            </div>
        </form>
    </div>

    <style>
        .cont {
            display: flex;
            justify-content: space-between;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-group label {
            display: flex;
            justify-content: right;
            margin-left: -40px;
            color: #333;
            width: 150px;
        }

        .form-group input {
            flex: 1;
            padding: 10px;
            width: 400px;
            margin-left: 30px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .profile-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 50px auto;
        }

        .profile-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            overflow: hidden;
            margin-top: -50px;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* .camera-icon {
                position: absolute;
                top: 2px;
                right: 3px;
                color: white;
                border-radius: 50%;
                padding: 10px;
                font-size: 20px;
            } */

        .buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-right: 10px;
            width: 180px;
        }

        .buttons .reset-btn {
            background-color: #fff;
            color: #333;
            border: 1px solid #ddd;
        }

        .buttons .save-btn {
            background-color: #00c4ff;
            color: #fff;
        }

        /* input gambar */

        .profile-photo {
            position: relative;
            display: inline-block;
            margin-top: -40px;
            margin-left: 100px;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            overflow: hidden;
            background-color: #00c4ff;
            /* Warna background biru */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Gaya ikon kamera */
        .profile-photo i {
            font-size: 15px;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }

        /* Sembunyikan input file asli */
        .file-input {
            display: none;
        }
    </style>

    <script>
        // Simpan URL gambar profil awal
        let initialProfileImageUrl = document.querySelector('.profile-image img').src;

        function uploadPhoto() {
            const input = document.getElementById('profilePhotoInput');
            const profileImage = document.querySelector('.profile-image img');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    profileImage.src = e.target.result; // Pratinjau gambar baru
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Fungsi untuk mengatur ulang gambar profil ke gambar awal
        function resetProfileImage() {
            const profileImage = document.querySelector('.profile-image img');
            profileImage.src = initialProfileImageUrl; // Kembali ke gambar awal
            document.getElementById('profilePhotoInput').value = ""; // Kosongkan input file
        }

        // Tambahkan event listener ke tombol reset
        document.querySelector('.reset-btn').addEventListener('click', resetProfileImage);
    </script>


@endsection
