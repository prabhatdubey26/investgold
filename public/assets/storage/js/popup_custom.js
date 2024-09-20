document.getElementById("registerLink").addEventListener("click", function(event) {
    event.preventDefault();
    openPopup();
});

document.getElementById("multiStepForm").addEventListener("submit", function(event) {
    event.preventDefault();
   
    var isValid = true;
    var uimg = $("#uimg").val();
    var type = $("#type").val();
    var doc1 = $("#doc1").val();
    var doc2 = $("#doc2").val();

    // Clear previous error messages
    $(".error-message").text("");

    // Validate Step 2 fields
    if (uimg === "") {
        isValid = false;
        $("#uimg-error").html("<span style='color:red;'>Upload User Image is required.</span>");
    }
    if (type === "") {
        isValid = false;
        $("#type-error").html("<span style='color:red;'>Document Type is required.</span>");
    }
    if (doc1 === "") {
        isValid = false;
        $("#doc1-error").html("<span style='color:red;'>Front Document 1 is required.</span>");
    }
    if (doc2 === "") {
        isValid = false;
        $("#doc2-error").html("<span style='color:red;'>Back Document 2 is required.</span>");
    }
       
    if (isValid) {

        var formData = new FormData(this);
        
        $.ajax({
            url:"submit-form",
            type: "POST",
            data: formData,
            processData: false, 
            contentType: false, 
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' 
            },
            success: function(response) {
                console.log(response);
                alert(response.message);
                closePopup();
            },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                    var response = JSON.parse(xhr.responseText);
                // Extract and display the error message
                if (response.errors && response.errors.email) {
                    var errorMessage = response.errors.email.join(", ");
                    $("#error_show").html("<span style='color:red;'>" + errorMessage + "</span>");
                } else {
                    // Fallback for unexpected error format
                    $("#error_show").html("<span style='color:red;'>An unexpected error occurred.</span>");
                }
                }
        });
       // closePopup(); // Close the popup
    }
});


function openPopup() {
    document.getElementById("popupForm").style.display = "flex";
}

function closePopup() {
    document.getElementById("popupForm").style.display = "none";
}

function nextStep(step) {
    var isValid = true;

    // Validate Step 1 fields if step is 1
    if (step === 1) {
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();

        // Clear previous error messages
        $(".error-message").text("");

        if (name === "") {
            isValid = false;
            $("#name-error").html("<span style='color:red;'>Name is required.</span>");
        }
        if (email === "") {
            isValid = false;
            $("#email-error").html("<span style='color:red;'>Email is required.</span>");
        }
        if (password === "") {
            isValid = false;
            $("#password-error").html("<span style='color:red;'>password is required.</span>");
        }
        if (confirm_password === "") {
            isValid = false;
            $("#confirm-password-error").html("<span style='color:red;'>confirm password is required.</span>");
        }
        if (password !== confirm_password) {
            isValid = false;
            $("#confirm-password-error").html("<span style='color:red;'>Passwords do not match.</span>");
        }
    }

    // Proceed to the next step if validation passes
    if (isValid) {
        // Hide current step
        document.querySelectorAll('.step')[step - 1].style.display = 'none';

        // Show next step
        document.querySelectorAll('.step')[step].style.display = 'block';
    }
}


function previousStep(step) {
    document.querySelectorAll('.step')[step].style.display = 'none';
    document.querySelectorAll('.step')[step - 1].style.display = 'block';
}

// login popup open

document.getElementById("loginLink").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("popupForm1").style.display = "block";
});

function closePopup1() {
    document.getElementById("popupForm1").style.display = "none";
}

// document.getElementById("loginForm1").addEventListener("submit", function(event) {
//     event.preventDefault();

//     var isValid = true;
//     var email = $("#email").val();
//     var password = $("#password").val();
//     $(".error-message").text("");

//     // Validate email and password fields
//     if (email === "") {
//         isValid = false;
//         $("#email-error").html("<span style='color:red;'>Email is required.</span>");
//     }
//     if (password === "") {
//         isValid = false;
//         $("#password-error").html("<span style='color:red;'>Password is required.</span>");
//     }

//     if (isValid) {
//         var token_id = $("#token_id").val(); 
        
//         $.ajax({
//             url: "user-login",
//             type: "POST",
//             data: {
//                 "email": email,
//                 "password": password,
//                 "_token": token_id 
//             },
//             success: function(response) {
//                 // Login successful
//                 console.log(response);
//                 alert(response);
//                 // Close the popup or perform any other action
//                 closePopup();
//             },
//             error: function(xhr, status, error) {
//                 var errorMessage = xhr.responseJSON.message || "An unexpected error occurred.";
//                 // Display error message to the user
//                 $("#error_show1").html("<span style='color:red;'>" + errorMessage + "</span>");
//             }
//         });
//     }
// });
