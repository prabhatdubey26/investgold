<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-zR6pdDPZ9vCjnMfTZNPZcG7IH9bT9exwKr9RvbdNa9rV64Ct9R2UYgjPz1t7vE3rF9F8vH8qwnOY++xQW1jodQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
.leading-5 {
    margin-top: 15px;
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
        /* Styles for popup form */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* 5% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
            border-radius: 5px;
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #d4d4d4;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
        div#editFormModal {
            padding: 0px 230px 150px 230px;
        }
    </style>
</head>
<body>

@include('auth.include.header')
@include('auth.include.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <h1>User List</h1>
        <table class="table table-responsive" id="sortable-table">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Bank Name</th>
                    <th>Bank ID</th>
                    <th>A/C</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>KYC Details</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $sl = 1; @endphp
                @foreach ($userData as $item)
                <tr data-id="{{ $item->id }}">
                    <td>{{ $sl }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->bank_name }}</td>
                    <td>{{ $item->bank_id }}</td>
                    <td>{{ $item->account_no }}</td>
					<td>{{ $item->address }}</td>
                    @if($item->kyc_status == 1)
                     <td style = "background-color:green;color:white;"> Approved
                    </td>
                    @elseif($item->kyc_status == 0)
                    <td style = "background-color:blue;color:white;">
                       Pending
                    </td>
                    @else
                    <td style = "background-color:red;color:white;">
                       Rejected
                    </td>
                    @endif
                    
                    <td>
                        <a href="{{url('kyc_list')}}/{{ $item->id }}"><i class="fas fa-eye"></i></a>
                    </td>
                    <td>
                    <button onclick="openEditForm('{{ $item->id }}', '{{ $item->name }}', '{{ $item->email }}', '{{ $item->phone }}', '{{ $item->bank_name }}', '{{ $item->bank_id }}', '{{ $item->account_no }}', '{{ $item->address }}')" class="btn btn-primary">
    <i class="fas fa-edit"></i>
</button>
                        <button onclick="deleteUserDetail('{{$item->id }}')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                 @php $sl++ @endphp
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $userData->links() }}
        </div>
    </div>
</div>


<!-- The Edit Form Modal -->
<div id="editFormModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeEditForm()">&times;</span>
        <h2>Edit User</h2>
        <form id="editForm">
            <div class="row">
                <div class="col-md-6">
                    <!-- First row: Name and Email -->
                    <div class="form-group">
                        <label for="editName">Name:</label>
                        <input type="hidden" id="editId" name="editId" class="form-control">
                        <input type="text" id="editName" name="editName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email:</label>
                        <input type="email" id="editEmail" name="editEmail" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    
                    <div class="form-group">
                        <label for="editPhone">Phone:</label>
                        <input type="text" id="editPhone" name="editPhone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="editBankName">Bank Name:</label>
                        <input type="text" id="editBankName" name="editBankName" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="editBankId">Bank ID:</label>
                        <input type="text" id="editBankId" name="editBankId" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="editAccountNo">A/C:</label>
                        <input type="text" id="editAccountNo" name="editAccountNo" class="form-control">
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="editAddress">Address:</label>
                        <textarea id="editAddress" name="editAddress" class="form-control"></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</div>


@include('auth.include.footer')

<script>
    // Get the modal
    var modal = document.getElementById("editFormModal");

    // Function to open the edit form modal
    function openEditForm(id, name, email, phone, bankName, bankId, accountNo, address) {
        document.getElementById("editId").value = id;
        document.getElementById("editName").value = name;
        document.getElementById("editEmail").value = email;
        document.getElementById("editPhone").value = phone;
        document.getElementById("editBankName").value = bankName;
        document.getElementById("editBankId").value = bankId;
        document.getElementById("editAccountNo").value = accountNo;
        document.getElementById("editAddress").value = address;

        modal.style.display = "block";
    }

    // Function to close the edit form modal
    function closeEditForm() {
        modal.style.display = "none";
    }

    // Close the modal if the user clicks outside of it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Function to handle form submission via AJAX
    document.getElementById("editForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(this); // Get form data

        var xhr = new XMLHttpRequest(); // Create new XMLHttpRequest object
        console.log(xhr);   
        // Define AJAX request parameters
        xhr.open("POST", "/update-user", true);
        xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}"); // Add CSRF token if using Laravel

        // Define AJAX event listener for successful request
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Handle successful response, e.g., close modal or display success message
                closeEditForm();
                alert("Changes saved successfully!");
                location.reload();
            } else {
                // Handle error response
                alert("Error: " + xhr.statusText);
            }
        };

        // Define AJAX event listener for error
        xhr.onerror = function() {
            alert("Request failed!");
        };

        // Send AJAX request with form data
        xhr.send(formData);
    });


    function deleteUserDetail(userId) {
        
    if (confirm("Are you sure you want to delete this user detail?")) {
        var xhr = new XMLHttpRequest(); // Create new XMLHttpRequest object

        // Define AJAX request parameters
        xhr.open("POST", "/delete-user-detail", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert("User detail deleted successfully!");
                location.reload();
            } else {
                alert("Error: " + xhr.statusText);
            }
        };
        xhr.onerror = function() {
            alert("Request failed!");
        };

        xhr.send(JSON.stringify({ userId: userId }));
    }
}

</script>

</body>
</html>
