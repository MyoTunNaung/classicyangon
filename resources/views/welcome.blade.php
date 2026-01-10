@extends('layouts.app')
@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT CONTENT -->
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="hero-title mb-3">
                        Myo Tun Naung (SayarMyo)
                    </h1>

                    <h4 class="bg-light text-primary mb-3">
                        Professional Software Developer & Technology Educator
                    </h4>

                    <p class="hero-text mb-4">
                        Over 20+ years of experience in software development and IT education,
                        delivering real‑world technology solutions for businesses and students.
                        Specialized in PHP, Laravel, and modern web technologies.
                    </p>

                    <div>

                        <a href="#profile" class="btn btn-outline-primary btn-md">Profile</a>
                        <a href="#experience" class="btn btn-outline-primary btn-md">Experience</a>
                        <a href="#projects" class="btn btn-outline-primary btn-md">Projects</a>
                        <a href="#gallery" class="btn btn-outline-primary btn-md">Gallery</a>
                        <a href="#skills" class="btn btn-outline-primary btn-md">Skills</a>
                        <a href="#contact" class="btn btn-outline-primary btn-md">Contact</a>

                    </div>
                </div>

                <!-- RIGHT IMAGE -->
                <div class="col-lg-6 text-center mt-5 mt-lg-0">
                    <img src="{{ asset('images/profile.jpg') }}" class="hero-image img-fluid"
                        alt="Myo Tun Naung – Software Developer & IT Educator">
                </div>

            </div>
        </div>
    </section>

    <!-- Profile Section -->
    <section id="profile" class="py-3 bg-light">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="fw-bold">Professional Profile</h2>
                <p class="text-muted mt-2">
                    Experience, expertise, and vision in technology & education
                </p>
            </div>

            <div class="row g-4">

                <!-- Card 1: Who I Am -->
                <div class="col-md-4">
                    <div class="profile-card h-100 shadow-sm p-4 text-center">
                        <h5 class="fw-bold mb-3">Who I Am</h5>
                        <p class="profile-text mb-0">
                            I am a <strong>Professional Software Developer</strong> with over
                            <strong>20+ years of experience</strong> in computer science,
                            software development, and IT education.
                            I graduated from the <strong>University of Computer Studies, Mandalay (UCSM)</strong>
                            with a <strong>B.C.Tech (Honours)</strong> in Computer Technology.
                        </p>
                    </div>
                </div>


                <!-- Card 2: What I’ve Done -->
                <div class="col-md-4">
                    <div class="profile-card h-100 shadow-sm p-4 text-center">
                        <h5 class="fw-bold mb-3">What I’ve Done</h5>
                        <p class="profile-text mb-0">
                            Since 2003, I have dedicated my career to teaching,
                            mentoring students, and building real‑world software
                            solutions for businesses and institutions.
                        </p>
                    </div>
                </div>

                <!-- Card 3: Mission & Vision -->
                <div class="col-md-4">
                    <div class="profile-card h-100 shadow-sm p-4 text-center">
                        <h5 class="fw-bold mb-3">Mission & Vision</h5>
                        <p class="profile-text mb-0">
                            My mission and vision is to empower students,
                            educators, and organizations through practical
                            technology, modern software solutions, and
                            sustainable digital platforms.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Experience Section -->
    <section id="experience" class="bg-light py-3">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="fw-bold">Professional Experience</h2>
                <p class="text-muted">
                    Industry, education, and international professional background
                </p>
            </div>

            <div class="row g-4">

                <!-- Card 1 -->
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="fw-bold">
                                Senior Software Developer, Founder & Teacher
                            </h5>
                            <h6 class="text-primary">
                                Classic Yangon · 2025 – Present
                            </h6>
                            <p class="mt-3">
                                Managing IT systems and digital platforms including website and portal for
                                business and education consultancy operations, ensuring
                                reliability, scalability, and smooth daily operations.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="fw-bold">
                                Freelance IT Manager
                            </h5>
                            <h6 class="text-primary">
                                Education Valley (Yangon) · 2023 – Present
                            </h6>
                            <p class="mt-3">
                                Leading international education consultancy services,
                                supporting Myanmar students to study abroad in the US,
                                UK, Canada, Germany, etc. Also responsible for building company website and education portal
                                platforms
                                and IT systems.

                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="fw-bold">
                                Founder & Senior Instructor
                            </h5>
                            <h6 class="text-primary">
                                Classic Computer Center · 2003 – 2020
                            </h6>
                            <p class="mt-3">
                                Founded and operated a computer training center in Pakokku,
                                teaching thousands of students from universities and
                                technology institutes in programming, web development,
                                hardware, and final‑year projects.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="fw-bold">
                                Supervisor
                            </h5>
                            <h6 class="text-primary">
                                Industrial Painting Sector (Singapore) · 2013 – 2015
                            </h6>
                            <p class="mt-3">
                                Gained international work experience in Singapore,
                                developing discipline, leadership, teamwork, and
                                organizational skills in an industrial environment.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-3">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="fw-bold  mb-2">
                    Client Projects & Platforms
                </h2>
                <p class="text-muted mb-5">
                    Real‑world systems built and used by organizations
                </p>
            </div>

            <div class="row g-4">

                <!-- Project 1 -->
                <div class="col-md-6 col-lg-6">
                    <div class="card project-card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/projects/drrdroadchart.png') }}" class="card-img-top project-preview"
                            alt="DRRD Road Chart & Road Report Platform" data-bs-toggle="modal"
                            data-bs-target="#imagePreviewModal" data-img="{{ asset('images/projects/drrdroadchart.png') }}">

                        <div class="card-body">
                            <h5 class="fw-bold">
                                DRRD Road Chart & Road Report Platform
                                <span class="d-block small text-muted">
                                    Government Road Management System (2025)
                                </span>
                            </h5>

                            <p class="text-muted small">
                                A nationwide government platform developed for the Department of Rural Road
                                Development (DRRD) to manage road and bridge data across Myanmar.
                                The system enables structured reporting, verification, and monitoring
                                from township level up to national level.
                            </p>

                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-success">Live System</span>
                                <span class="badge bg-primary">Government Project</span>
                                <span class="badge bg-info text-dark">Laravel</span>
                                <span class="badge bg-secondary">PHP</span>
                                <span class="badge bg-dark">MySQL</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="col-md-6 col-lg-6">
                    <div class="card project-card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/projects/gacportal.png') }}" class="card-img-top project-preview"
                            alt="Education Platform" data-bs-toggle="modal" data-bs-target="#imagePreviewModal"
                            data-img="{{ asset('images/projects/gacportal.png') }}">

                        <div class="card-body">
                            <h5 class="fw-bold">Education Platform (Student Portal)</h5>
                            <p class="text-muted small">
                                Student management, course enrollment, and reporting system
                                for education consultancy operations.
                            </p>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-primary">Laravel</span>
                                <span class="badge bg-secondary">PHP</span>
                                <span class="badge bg-dark">MySQL</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="col-md-6 col-lg-6">
                    <div class="card project-card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/projects/restaurant-pos.jpg') }}" class="card-img-top project-preview"
                            alt="Restaurant POS System" data-bs-toggle="modal" data-bs-target="#imagePreviewModal"
                            data-img="{{ asset('images/projects/restaurant-pos.jpg') }}">

                        <div class="card-body">
                            <h5 class="fw-bold">Restaurant POS</h5>
                            <p class="text-muted small">
                                Sales, Order, and Inventory Management System
                                for small to medium-sized restaurants and cafes.
                            </p>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-success">MySQL</span>
                                <span class="badge bg-primary">Laravel</span>
                                <span class="badge bg-secondary">REST API</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 4 -->
                <div class="col-md-6 col-lg-6">
                    <div class="card project-card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/projects/eduvalleymm.png') }}" class="card-img-top project-preview"
                            alt="Company Website" data-bs-toggle="modal" data-bs-target="#imagePreviewModal"
                            data-img="{{ asset('images/projects/eduvalleymm.png') }}">

                        <div class="card-body">
                            <h5 class="fw-bold">Company Websites</h5>
                            <p class="text-muted small">
                                Professional websites with responsive UI, SEO optimization,
                                and modern design standards.
                            </p>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-primary">Laravel</span>
                                <span class="badge bg-info text-dark">Bootstrap</span>
                                <span class="badge bg-warning text-dark">UI/UX</span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- Training & Activities Section -->
    <section id="gallery" class="py-3 bg-light">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="fw-bold">Training & Activities</h2>
                <p class="text-muted">
                    Moments from training programs, student achievements, and professional activities
                </p>
            </div>

            <div class="row g-3">

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="gallery-card">
                        <img src="{{ asset('images/gallery/celebration-1.jpg') }}" alt="Celebration">
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="gallery-card">
                        <img src="{{ asset('images/gallery/certificate-1.jpg') }}" alt="Certificate">
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="gallery-card">
                        <img src="{{ asset('images/gallery/event-1.jpg') }}" alt="Workshop">
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="gallery-card">
                        <img src="{{ asset('images/gallery/students-1.jpg') }}" alt="Workshop">
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="gallery-card">
                        <img src="{{ asset('images/gallery/training-1.jpg') }}" alt="Workshop">
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="gallery-card">
                        <img src="{{ asset('images/gallery/workshop-1.jpg') }}" alt="Training">
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-3 bg-white">
        <div class="container">

            <div class="text-center mb-3">
                <h2 class="fw-bold">Skills & Technology Stack</h2>
                <p class="text-muted">
                    Technologies and expertise built through real‑world experience
                </p>
            </div>

            <div class="row g-4">

                <!-- Frontend -->
                <div class="col-md-4">
                    <div class="skill-card h-100 text-center">
                        <div class="skill-icon text-primary">
                            <i class="bi bi-code-slash"></i>
                        </div>
                        <h5 class="fw-bold">Frontend</h5>
                        <p>
                            HTML, CSS, JavaScript<br>
                            jQuery, Bootstrap 5
                        </p>
                    </div>
                </div>

                <!-- Backend -->
                <div class="col-md-4">
                    <div class="skill-card h-100 text-center">
                        <div class="skill-icon text-success">
                            <i class="bi bi-server"></i>
                        </div>
                        <h5 class="fw-bold">Backend</h5>
                        <p>
                            PHP, Laravel Framework<br>
                            Java, Spring Boot
                        </p>
                    </div>
                </div>

                <!-- Database -->
                <div class="col-md-4">
                    <div class="skill-card h-100 text-center">
                        <div class="skill-icon text-warning">
                            <i class="bi bi-database"></i>
                        </div>
                        <h5 class="fw-bold">Database</h5>
                        <p>
                            MySQL<br>
                            Oracle Database<br>
                            Microsoft SQL Server
                        </p>
                    </div>
                </div>

                <!-- Education -->
                <div class="col-md-4">
                    <div class="skill-card h-100 text-center">
                        <div class="skill-icon text-info">
                            <i class="bi bi-mortarboard"></i>
                        </div>
                        <h5 class="fw-bold">Education & Training</h5>
                        <p>
                            Programming Instruction<br>
                            Project Supervision<br>
                            Thesis & Presentation Support
                        </p>
                    </div>
                </div>

                <!-- Hardware -->
                <div class="col-md-4">
                    <div class="skill-card h-100 text-center">
                        <div class="skill-icon text-danger">
                            <i class="bi bi-cpu"></i>
                        </div>
                        <h5 class="fw-bold">Hardware & IoT</h5>
                        <p>
                            Arduino<br>
                            Raspberry Pi
                        </p>
                    </div>
                </div>

                <!-- Other -->
                <div class="col-md-4">
                    <div class="skill-card h-100 text-center">
                        <div class="skill-icon text-secondary">
                            <i class="bi bi-tools"></i>
                        </div>
                        <h5 class="fw-bold">Other Technologies</h5>
                        <p>
                            Git & GitHub<br>
                            System Design<br>
                            Business Software Solutions
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact" class="contact-section py-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">

                    <h2 class="fw-bold mb-3">Let’s Work Together</h2>
                    <p class="text-muted mb-5">
                        Feel free to reach out for collaboration, consulting, or educational opportunities.
                    </p>

                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <div class="card shadow-lg border-0 contact-card">
                        <div class="card-body p-5 text-center">

                            <h4 class="fw-bold mb-4">Contact Information</h4>

                            <div class="contact-item mb-3">
                                <strong>Name</strong>
                                <p class="mb-0">Myo Tun Naung</p>
                            </div>

                            <div class="contact-item mb-3">
                                <strong>Phone</strong>
                                <p class="mb-0">+95 9 430 718 44</p>
                            </div>

                            <div class="contact-item mb-3">
                                <strong>Email</strong>
                                <p class="mb-0">
                                    <a href="mailto:myotunnoung@gmail.com" class="contact-link">
                                        myotunnoung@gmail.com
                                    </a>
                                </p>
                            </div>

                            <div class="contact-item mb-4">
                                <strong>Location</strong>
                                <p class="mb-0">Yangon, Myanmar</p>
                            </div>

                            <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">

                                <!-- Facebook -->
                                <a href="https://www.facebook.com/myotun.noung.9" target="_blank"
                                    class="btn btn-primary btn-icon">
                                    <i class="bi bi-facebook"></i>
                                </a>

                                <!-- YouTube -->
                                <a href="https://www.youtube.com/@myotunnaung6886" target="_blank"
                                    class="btn btn-danger btn-icon">
                                    <i class="bi bi-youtube"></i>
                                </a>

                                <!-- Viber -->
                                <a href="viber://chat?number=+95943071844" class="btn btn-purple btn-icon">
                                    <i class="bi bi-telephone-fill"></i>
                                </a>

                                <!-- WhatsApp -->
                                <a href="https://wa.me/95943071844" target="_blank" class="btn btn-success btn-icon">
                                    <i class="bi bi-whatsapp"></i>
                                </a>

                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Image Preview Modal -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-2 text-center">
                    <img id="modalPreviewImage" src="" class="img-fluid rounded" alt="Project Preview">
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById('imagePreviewModal');
            const modalImage = document.getElementById('modalPreviewImage');

            modal.addEventListener('show.bs.modal', function(event) {
                const triggerImage = event.relatedTarget;
                const imgSrc = triggerImage.getAttribute('data-img');
                modalImage.src = imgSrc;
            });
        });
    </script>

@endsection
