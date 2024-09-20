@include('auth.include.header')
@include('auth.include.sidebar')
<div class="content-wrapper">

    <div class="content-header">
        <h1>Edit Navigation</h1>
        <form action="{{ route('admin.header.update', $header->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="type">Type</label>
        <select name="type" class="form-control" id="type">
            <option value="1" {{ old('type', $header->type) == 1 ? 'selected' : '' }}>Header</option>
            <option value="2" {{ old('type', $header->type) == 2 ? 'selected' : '' }}>Services</option>
            <option value="3" {{ old('type', $header->type) == 3 ? 'selected' : '' }}>Support</option>
            <option value="4" {{ old('type', $header->type) == 4 ? 'selected' : '' }}>Policies</option>
            <option value="5" {{ old('type', $header->type) == 5 ? 'selected' : '' }}>About Investgold</option>
            <option value="6" {{ old('type', $header->type) == 6 ? 'selected' : '' }}>Social Link</option>
        </select>
        @error('type')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $header->title) }}">
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <input type="text" name="link" class="form-control" id="link" value="{{ old('link', $header->link) }}">
        @error('link')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>
</div>
@include('auth.include.footer')
