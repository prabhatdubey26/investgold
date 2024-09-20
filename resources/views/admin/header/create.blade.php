@include('auth.include.header')
@include('auth.include.sidebar')

@section('content')
    
<div class="content-wrapper">

    <div class="content-header">
    <h1>Add New Navigation</h1>

<form action="{{ route('admin.header.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="type">Type</label>
        <select name="type" class="form-control" id="type">
            <option value="1" {{ old('type') == 1 ? 'selected' : '' }}>Header</option>
            <option value="2" {{ old('type') == 2 ? 'selected' : '' }}>Services</option>
            <option value="3" {{ old('type') == 3 ? 'selected' : '' }}>Support</option>
            <option value="4" {{ old('type') == 4 ? 'selected' : '' }}>Policies</option>
            <option value="5" {{ old('type') == 5 ? 'selected' : '' }}>About Investgold</option>
            <option value="6" {{ old('type') == 6 ? 'selected' : '' }}>Social Link</option>
        </select>
        @error('type')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="description">Link</label>
        <input type="text" name="link" class="form-control" id="link" value="{{ old('link') }}">
        @error('link')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-success">Submit</button>
</form>
    </div>
</div>
    @include('auth.include.footer')
