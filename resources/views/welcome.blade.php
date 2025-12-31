@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Hero Section -->
<section class="hero-section d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT -->
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="hero-title mb-3">Myo Tun Naung</h1>

                <h4 class="hero-subtitle mb-4">
                    Professional Software Developer & IT Educator
                </h4>

                <p class="hero-text mb-4">
                    Over 20 years of experience in software development and IT education,
                    building real‑world solutions using Laravel, PHP, and modern web technologies.
                </p>

                <a href="#contact" class="btn btn-primary btn-lg me-3">Contact Me</a>
                <a href="#profile" class="btn btn-outline-primary btn-lg">View Projects</a>
            </div>

            <!-- RIGHT -->
            <div class="col-lg-6 text-center mt-4 mt-lg-0">
                <img src="{{ asset('images/profile.jpg') }}" class="img-fluid hero-image" alt="Myo Tun Naung">
            </div>

        </div>
    </div>
</section>

@endsection
