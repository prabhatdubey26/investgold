@include('auth.include.header')
@include('auth.include.sidebar')

@section('content')
    
<div class="content-wrapper">

    <div class="content-header">
    <h1>Add New Team</h1>

<form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="url">Photo</label>
        <input type="file" name="url" class="form-control-file" id="url">
        @error('url')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    
    <div class="form-group">
        <label for="is_active">Active</label>
        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
    </div>
    
    <button type="submit" class="btn btn-success">Add Image</button>
</form>
    </div>
</div>
@include('auth.include.footer')
