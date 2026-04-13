@extends('layout.app')
@section('title','Home')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="display-4 mb-4">Welcome to My Web Profile <br> Halo, Saya Iik Muhammad Ikmal</h1>
                    <img src="https://i.pinimg.com/736x/21/ac/32/21ac32f69dacb35471c7d0cb7f12e678.jpg" alt="Profile Image" class="img-fluid rounded-circle mb-4" style="width: 200px; height: 200px; object-fit: cover;">
                        <p class="lead">
                Hallo saya seorang junior web developer yang passionable dalam membuat aplikasi web modern
                        </p>
                    <hr class="my-4">
                        <p class="lead">
                Selamat datang diprofile website saya, saya memiliki pengalaman dalam membuat aplikasi web modern seperti menggunakan framework Laravel, React, dan Vue.js. Saya juga memiliki pengalaman dalam mengelola database menggunakan MySQL dan MongoDB. Saya selalu berusaha untuk terus belajar dan mengembangkan keterampilan saya dalam dunia web development. 
                        </p>
            </div>
        </div>
    </div>
    <div class="row mt-5 text-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pengalaman</h5>
                    <p class="card-text">2 Tahun Pengalaman</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Project</h5>
                    <p class="card-text">144 Project Selesai</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pengalaman</h5>
                    <p class="card-text">2 Tahun Pengalaman</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection