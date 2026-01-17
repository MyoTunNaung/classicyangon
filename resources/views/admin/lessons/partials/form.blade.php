<div class="card">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="card-body">

        {{-- Title & Course --}}
        <div class="row mb-3">

            <div class="col-md-6">
                <label class="form-label">Title *</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ old('title', $lesson->title ?? '') }}"
                       required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Course *</label>
                <select name="course_id" class="form-select" required>
                    <option value="">Select</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}"
                            @selected(old('course_id', $lesson->course_id ?? '') == $course->id)>
                            {{ $course->title }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>

        {{-- Order / Free / Status --}}
        <div class="row mb-3">

            <div class="col-md-4">
                <label class="form-label">Lesson Order</label>
                <input type="number"
                       name="lesson_order"
                       class="form-control"
                       value="{{ old('lesson_order', $lesson->lesson_order ?? 0) }}">
            </div>

            <div class="col-md-4">
                <label class="form-label">Free Lesson?</label>
                <select name="is_free" class="form-select">
                    <option value="0" @selected(old('is_free', $lesson->is_free ?? 0) == 0)>No</option>
                    <option value="1" @selected(old('is_free', $lesson->is_free ?? 0) == 1)>Yes</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="active" @selected(old('status', $lesson->status ?? 'active') === 'active')>
                        Active
                    </option>
                    <option value="inactive" @selected(old('status', $lesson->status ?? '') === 'inactive')>
                        Inactive
                    </option>
                </select>
            </div>

        </div>

        {{-- Content --}}
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content"
                      class="form-control"
                      rows="4">{{ old('content', $lesson->content ?? '') }}</textarea>
        </div>



        <div class="row mb-3 align-items-end">

            {{-- YouTube Embed URL --}}
            <div class="col-md-5">
                <label class="form-label">
                    YouTube Embed URL
                    <small class="text-muted">(optional)</small>
                </label>
                <input type="text"
                    name="video_url"
                    class="form-control"
                    value="{{ old('video_url', $lesson->video_url ?? '') }}"
                    placeholder="https://www.youtube.com/embed/xxxx">
                    <small class="text-muted">
                        Paste YouTube <strong>embed</strong> URL only.
                    </small>
            </div>

            {{-- OR Divider --}}
            <div class="col-md-2 text-center">
                <div class="fw-bold text-primary mt-4">
                    — OR —
                </div>
            </div>

            {{-- Local MP4 Upload --}}
            <div class="col-md-5">
                <label class="form-label">
                    Upload MP4 Video
                    <small class="text-muted">(optional)</small>
                </label>
                <input type="file"
                    name="video_file"
                    class="form-control"
                    accept="video/mp4">
                    <small class="text-muted">
                        MP4 only. Uploaded file will override Video URL.
                    </small>
            </div>

        </div>




        {{-- Remark --}}
        <div class="mb-3">
            <label class="form-label">Remark</label>
            <textarea name="remark"
                      class="form-control"
                      rows="2">{{ old('remark', $lesson->remark ?? '') }}</textarea>
        </div>

    </div>
</div>
