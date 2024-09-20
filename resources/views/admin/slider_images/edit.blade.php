@include('auth.include.header')
@include('auth.include.sidebar')
<div class="content-wrapper">

    <div class="content-header">
        <h1>Edit Slider Image</h1>
        <form action="{{ route('admin.slider_images.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $slider->title) }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description">{{ old('description', $slider->description) }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control-file" id="image">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="is_active">Active</label>
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $slider->is_active) ? 'checked' : '' }}>
            </div>

            <button type="submit" class="btn btn-primary">Update Image</button>
        </form>
    </div>
</div>
@include('auth.include.footer')
