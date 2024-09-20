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

    .download-btn {
        margin-left: 10px;
        color: #007bff;
        cursor: pointer;
    }

    .download-btn:hover {
        text-decoration: underline;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <h1>KYC List</h1>
        <table id="sortable-table">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Selfie Photo</th>
                    <th>Photo</th>
                    <th>Documents</th>
                    <th>KYC Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kycs as $item)
                    <tr data-id="{{ $item->id }}">
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <img src="{{ asset('image/' . $item->image) }}" alt="Selfie Photo" style="max-width: 100px;">
                            <a href="{{ asset('image/' . $item->image) }}" download class="download-btn"><i class="fa fa-download"></i></a>
                        </td>
                        <td>
                            <img src="{{ asset('photos/' . $item->photo) }}" alt="Photo" style="max-width: 100px;">
                            <a href="{{ asset('photos/' . $item->photo) }}" download class="download-btn"><i class="fa fa-download"></i></a>
                        </td>
                        <td>
                            @if (Str::endsWith($item->backphoto, '.pdf'))
                                <a href="{{ asset('documents/' . $item->backphoto) }}" target="_blank">{{ $item->backphoto }}</a>
                                <a href="{{ asset('documents/' . $item->backphoto) }}" download class="download-btn"><i class="fa fa-download"></i></a>
                            @else
                                <img src="{{ asset('documents/' . $item->backphoto) }}" alt="Document" style="max-width: 100px;">
                                <a href="{{ asset('documents/' . $item->backphoto) }}" download class="download-btn"><i class="fa fa-download"></i></a>
                            @endif
                        </td>
                        <td>
                            <select class="form-control" id="kyc_status_{{ $item->user_id }}" onchange="updateKycStatus({{ $item->user_id }})">
                                <option value="0" {{ $item->kyc_status === 0 ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ $item->kyc_status === 1 ? 'selected' : '' }}>Approved</option>
                                <option value="2" {{ $item->kyc_status === 2 ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>

@include('auth.include.footer')

<!-- Add this to your layout or HTML file -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    $(document).ready(function () {
        new Sortable(document.getElementById('sortable-table').getElementsByTagName('tbody')[0], {
            animation: 150,
            onUpdate: function (evt) {
                var order = [];
                $('#sortable-table tbody tr').each(function () {
                    order.push($(this).data('id'));
                });

                $.ajax({
                    type: 'POST',
                    url: "{{ route('update-order') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        order: JSON.stringify(order),
                    },
                    success: function (data) {
                        console.log('Order updated successfully');
                    },
                    error: function (data) {
                        console.log('Error updating order');
                    }
                });
            }
        });
    });

    function updateKycStatus(userId) {
        var status = document.getElementById('kyc_status_' + userId).value;
        var comment = '';

        if (status === '2') { // If status is 'Rejected'
            comment = prompt("Please enter the reason for rejection:");
            if (comment === null || comment === "") {
                alert("Please provide a reason for rejection.");
                return; // Exit function if comment is not provided
            }
        }

        axios.post('/update-kyc-status', {
            user_id: userId,
            kyc_status: status,
            comment: comment // Send comment along with the status update
        })
        .then(function (response) {
            console.log(response.data);
            var message = '';
            switch (status) {
                case '0':
                    message = 'KYC status set to Pending';
                    break;
                case '1':
                    message = 'KYC status set to Approved';
                    break;
                case '2':
                    message = 'KYC status set to Rejected';
                    break;
            }
            alert(message);
        })
        .catch(function (error) {
            console.error(error);
            alert('Error updating KYC status');
        });
    }
</script>
