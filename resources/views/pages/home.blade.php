@extends('layouts.app')

@section('title', 'Myo Tun Naung | Professional Developer & Educator')

@section('content')

<!-- Hero Section -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7">
                <h1 class="fw-bold mb-3">
                    Myo Tun Naung
                </h1>
                <h4 class="text-primary mb-3">
                    Professional Developer & Technology Educator
                </h4>
                <p class="lead">
                    20+ years of experience in software development, IT education,
                    and building real‑world technology solutions for businesses
                    and students.
                </p>

                <a href="#profile" class="btn btn-primary me-2">
                    View Profile
                </a>
                <a href="#contact" class="btn btn-outline-secondary">
                    Contact Me
                </a>
            </div>

            <div class="col-md-5 text-center">
                <img src="https://via.placeholder.com/350x350"
                     class="img-fluid rounded-circle shadow"
                     alt="Myo Tun Naung">
            </div>
        </div>
    </div>
</section>

<!-- Profile Section -->
<section id="profile" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h2 class="fw-bold mb-4">Professional Profile</h2>

                <p class="lead">
                    I am a Professional Software Developer and Technology Educator
                    with over <strong>20 years of experience</strong> in computer science,
                    software development, and IT education.
                </p>

                <p>
                    I began my academic journey at the University of Computer Studies,
                    Mandalay (UCSM), where I earned a Bachelor of Computer Technology (Honours).
                    Since 2003, I have dedicated my career to teaching, mentoring students,
                    and building real‑world software solutions for businesses and institutions.
                </p>

                <p>
                    My mission is to empower students, educators, and organizations
                    through practical technology, modern software solutions,
                    and sustainable digital platforms.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="bg-light py-5">
    <div class="container">
        <h2 class="fw-bold text-center mb-5">Professional Experience</h2>

        <div class="row">
            <div class="col-md-10 mx-auto">

                <div class="mb-4">
                    <h5 class="fw-bold">Manager – Education Valley (Yangon)</h5>
                    <span class="text-muted">2023 – Present</span>
                    <p class="mt-2">
                        Leading international education consultancy services,
                        supporting Myanmar students to study abroad in countries
                        such as the US, UK, Canada, Ireland, Germany, and Switzerland.
                        Also responsible for building education platforms and systems.
                    </p>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold">Founder & Senior Instructor – Classic Computer Center</h5>
                    <span class="text-muted">2003 – 2020</span>
                    <p class="mt-2">
                        Founded and operated a computer training center in Pakokku,
                        teaching thousands of students from universities and technology institutes.
                        Subjects included programming, web development, hardware,
                        and final‑year project support.
                    </p>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold">Supervisor – Industrial Painting Sector (Singapore)</h5>
                    <span class="text-muted">2013 – 2015</span>
                    <p class="mt-2">
                        Worked in a supervisory role in Singapore, gaining
                        international work experience, discipline,
                        and organizational leadership skills.
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
