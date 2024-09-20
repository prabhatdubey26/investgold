@include('auth.include.header')
@include('auth.include.sidebar')

<style>
    .content-wrapper {
        background-color: #f8f9fa;
        padding: 20px;
    }

    .content-header {
        background-color: #ffffff;
        border: 1px solid #d4d4d4;
        border-radius: 5px;
        padding: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #007bff;
        margin-bottom: 20px;
    }

    #sortable-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    #sortable-table th, #sortable-table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #d4d4d4;
    }

    #sortable-table th {
        background-color: #007bff;
        color: #ffffff;
    }

    #sortable-table tbody tr {
        cursor: grab;
    }

    #sortable-table tbody tr:hover {
        background-color: #f2f2f2;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <a href="{{ route('admin.slider_images.create') }}" class="btn btn-primary">Add New Image</a>
        <h1>Slider List</h1>
        <table id="sortable-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Slider Image</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Sliders as $sliderImage)
                <tr>
                    <td>{{ $sliderImage->id }}</td>
                    <td>{{ $sliderImage->title }}</td>
                    <td>{{ $sliderImage->description }}</td>
                    <td><img src="{{ asset('sliders/' . $sliderImage->image_path) }}" alt="Photo" style="max-width: 100px;"></td>
                    
                    <td>{{ $sliderImage->is_active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('admin.slider_images.edit', $sliderImage->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.slider_images.destroy', $sliderImage->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">
            <button id="prev" class="btn btn-secondary">Previous</button>
            <span id="page-info"></span>
            <button id="next" class="btn btn-secondary">Next</button>
        </div>   
    </div>
</div>




@include('auth.include.footer')
