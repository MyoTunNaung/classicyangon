<div class="card">
    <div class="card-body">

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Title *</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ old('title', $course->title ?? '') }}"
                       required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Category *</label>
                <select name="category_id" class="form-select" required>
                    <option value="">Select</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @selected(old('category_id', $course->category_id ?? '') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Teacher</label>
                <select name="teacher_id" class="form-select">
                    <option value="">Select</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}"
                            @selected(old('teacher_id', $course->teacher_id ?? '') == $teacher->id)>
                            {{ $teacher->user->name ?? 'N/A' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Organization</label>
                <select name="organization_id" class="form-select">
                    <option value="">Select</option>
                    @foreach ($organizations as $org)
                        <option value="{{ $org->id }}"
                            @selected(old('organization_id', $course->organization_id ?? '') == $org->id)>
                            {{ $org->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $course->description ?? '') }}</textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Level</label>
                <input type="text"
                       name="level"
                       class="form-control"
                       value="{{ old('level', $course->level ?? '') }}">
            </div>

            <div class="col-md-4">
                <label class="form-label">Price</label>
                <input type="number"
                       step="0.01"
                       name="price"
                       class="form-control"
                       value="{{ old('price', $course->price ?? 0) }}">
            </div>

            <div class="col-md-4">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="active" @selected(old('status', $course->status ?? '') === 'active')>Active</option>
                    <option value="inactive" @selected(old('status', $course->status ?? '') === 'inactive')>Inactive</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Cover Photo</label>
            <input type="file" name="cover_photo" class="form-control">
        </div>

    </div>
</div>
