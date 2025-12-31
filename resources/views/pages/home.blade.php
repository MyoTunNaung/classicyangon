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

<!-- Skills Section -->
<section id="skills" class="py-5">
    <div class="container">
        <h2 class="fw-bold text-center mb-5">Skills & Technology Stack</h2>

        <div class="row text-center">

            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Frontend</h5>
                <p>
                    HTML, CSS, JavaScript<br>
                    jQuery, Bootstrap 5
                </p>
            </div>

            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Backend</h5>
                <p>
                    PHP, Laravel Framework<br>
                    Java, Spring Boot
                </p>
            </div>

            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Database</h5>
                <p>
                    MySQL<br>
                    Oracle Database<br>
                    Microsoft SQL Server
                </p>
            </div>

            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Education & Training</h5>
                <p>
                    Programming Instruction<br>
                    Project Supervision<br>
                    Thesis & Presentation Support
                </p>
            </div>

            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Hardware & IoT</h5>
                <p>
                    Arduino<br>
                    Raspberry Pi
                </p>
            </div>

            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Other Technologies</h5>
                <p>
                    Git & GitHub<br>
                    System Design<br>
                    Business Software Solutions
                </p>
            </div>

        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="bg-dark text-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">

                <h2 class="fw-bold mb-4">Contact Information</h2>

                <p class="mb-2">
                    <strong>Name:</strong> Myo Tun Naung
                </p>

                <p class="mb-2">
                    <strong>Phone:</strong> +95 9 430 718 44
                </p>

                <p class="mb-2">
                    <strong>Email:</strong>
                    <a href="mailto:myotunnoung@gmail.com" class="text-warning text-decoration-none">
                        myotunnoung@gmail.com
                    </a>
                </p>

                <p class="mb-2">
                    <strong>Location:</strong> Yangon, Myanmar
                </p>

                <p class="mt-4">
                    <a href="https://www.facebook.com/myotun.noung.9"
                       target="_blank"
                       class="btn btn-outline-light">
                        Facebook Profile
                    </a>
                </p>

            </div>
        </div>
    </div>
</section>

@endsection
