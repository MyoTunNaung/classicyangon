@extends('layouts.admin')

@section('content')
    <div class="container">

        {{-- Page Header --}}
        <div class="row py-3">
            <div class="col text-center">
                <h3 class="fw-bold mb-1">
                    Classic Yangon - Education Platform
                </h3>
                <p class="text-muted mb-0">
                    <i class="bi bi-speedometer2 me-1"></i>
                    Admin Dashboard
                </p>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="row g-4">

            {{-- Master Data Management --}}
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header fw-semibold">
                        <i class="bi bi-database-fill-gear me-1"></i>
                        Master Data Management
                    </div>
                    <div class="card-body">

                        <div class="d-flex flex-wrap gap-2">

                            <a href="{{ route('admin.organizations.index') }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-buildings me-1"></i>
                                Organizations
                            </a>

                            <a href="{{ route('admin.teachers.index') }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-person-badge me-1"></i>
                                Teachers
                            </a>

                            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-tags me-1"></i>
                                Categories
                            </a>

                            <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-journal-bookmark me-1"></i>
                                Courses
                            </a>

                            <a href="{{ route('admin.lessons.index') }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-collection-play me-1"></i>
                                Lessons
                            </a>


                        </div>

                    </div>
                </div>
            </div>

            {{-- Master Data Management --}}
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header fw-semibold">
                        <i class="bi bi-database-fill-gear me-1"></i>
                        Master Data Management
                    </div>
                    <div class="card-body">

                        <div class="d-flex flex-wrap gap-2">

                            <a href="{{ route('admin.payment-methods.index') }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-credit-card me-1"></i>
                                Payment Methods
                            </a>


                            <a href="{{ route('admin.payments.index') }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-credit-card me-1"></i>
                                Payments
                            </a>

                            <a href="{{ route('admin.enrollments.index') }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-collection-play me-1"></i>
                                Enrollments
                            </a>





                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
