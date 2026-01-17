@extends('layouts.app')

@section('content')
    <div class="container py-3">


        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0">
                <i class="bi bi-play-circle me-1"></i>
                {{ $lesson->title }}
            </h4>

            <a href="{{ route('user.lessons.index', $course) }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>
                Back to Lessons
            </a>
        </div>



        <div class="card">
            <div class="card-body">
                <div class="row g-3">

                    {{-- Video (Left) --}}
                    <div class="col-md-8">
                        <h5 class="fw-bold mb-2">
                            <i class="bi bi-camera-video me-1"></i>
                            Lecture Video
                        </h5>

                        @if ($lesson->video_url)
                            @if (\Illuminate\Support\Str::contains($lesson->video_url, 'youtube'))
                                <div class="ratio ratio-16x9">
                                    <iframe
                                        src="{{ $lesson->video_url }}"
                                        title="Lesson Video"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            @else
                                <video class="w-100" controls>
                                    <source src="{{ asset($lesson->video_url) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        @else
                            <div class="text-muted fst-italic">
                                No video available.
                            </div>
                        @endif
                    </div>

                    {{-- Content (Right) --}}
                    <div class="col-md-4">
                        <h5 class="fw-bold mb-2">
                            <i class="bi bi-journal-text me-1"></i>
                            Notes for Students
                        </h5>

                        <textarea
                            class="form-control"
                            rows="20"
                            readonly>{{ $lesson->content ?? 'No lesson content available.' }}</textarea>
                    </div>

                </div>
            </div>
        </div>



    </div>
@endsection
