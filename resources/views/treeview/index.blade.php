<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f9;
  margin: 0;
  padding: 20px;
  font-size: 18px;
}

h2 {
  color: #333;
  text-align: center;
  margin-bottom: 20px;
  font-size: 28px;
}

p {
  color: #666;
  text-align: center;
  font-size: 20px;
}

.container {
  max-width: 800px;
  margin: 0 auto;
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

ul, #myUL {
  list-style-type: none;
  padding-left: 20px;
}

#myUL {
  margin: 0;
  padding: 0;
}

.caret {
  cursor: pointer;
  user-select: none;
  align-items: center;
  font-size: 20px;
}

.caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;
  transition: transform 0.3s;
}

.caret-down::before {
  transform: rotate(90deg);
}

.nested {
  display: none;
  padding-left: 20px;
  border-left: 1px solid #ddd;
  margin-left: 10px;
}

.active {
  display: block;
}

input[type="checkbox"] {
  margin-right: 10px;
  transform: scale(1.5);
}

li {
  margin-bottom: 5px;
}

label {
  display: flex;
  align-items: center;
  cursor: pointer;
  padding: 5px;
  border-radius: 4px;
  font-size: 20px;
}

label:hover {
  background-color: #f0f0f0;
}

.tree-item {
  margin-left: 20px;
}

button {
  display: block;
  margin: 20px auto;
  padding: 15px 30px;
  font-size: 20px;
  color: #fff;
  background-color: #007BFF;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #0056b3;
}

.flex-container {
  display: flex;
  align-items: center;
}

.flex-container .caret {
  margin-right: 10px;
}

/* Custom styles for "All Check/Uncheck" section */
#checkAllSection {
  background-color: #007BFF;
  color: white;
  padding: 10px 20px;
  border-radius: 4px;
  margin-bottom: 20px;
  font-size: 20px;
}

#checkAllSection label {
  margin: 0;
  font-weight: bold;
}

#checkAllSection input[type="checkbox"] {
  transform: scale(1.2);
}

/* Modal styles */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  max-width: 600px;
  border-radius: 10px;
  /* text-align: center; */
}

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
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<div class="container">
  <button id="openModalButton">Show Tree View</button>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Tree View</h2>
    <p>A tree view represents a hierarchical view of information</p>
    
    <div id="checkAllSection">
      <label>
        <input type="checkbox" id="checkAll"> All Check/Uncheck
      </label>
    </div>

    <ul id="myUL">
      @foreach($treeData as $item)
        @include('treeview.tree_item', ['item' => $item])
      @endforeach
    </ul>
  </div>
</div>

<script>
$(document).ready(function() {
  var $checkAll = $('#checkAll');

  // Toggle tree branches
  $('.caret').click(function() {
    $(this).siblings('.nested').toggleClass('active');
    $(this).toggleClass('caret-down');
  });

  // "All" checkbox functionality
  $checkAll.change(function() {
    var isChecked = $(this).is(':checked');
    
    // Check/Uncheck all checkboxes
    $('input[type="checkbox"]').not(this).prop('checked', isChecked).each(function() {
      updateCheckbox($(this).data('id'), isChecked, true);
    });
  });

  // Parent checkbox functionality
  $(document).on('change', '.parent-checkbox', function() {
    var $this = $(this);
    var isChecked = $this.is(':checked');
    var nodeId = $this.data('id');

    $this.closest('li').find('.child-checkbox').prop('checked', isChecked).each(function() {
      updateCheckbox($(this).data('id'), isChecked, true);
    });

    updateCheckbox(nodeId, isChecked, true);
  });

  // Child checkbox functionality
  $(document).on('change', '.child-checkbox', function() {
    updateCheckbox($(this).data('id'), $(this).is(':checked'), false);
  });

  // Update checkbox state on the server
  function updateCheckbox(id, isChecked, updateChildren) {
    $.post('/treeview/update', {
      _token: '{{ csrf_token() }}',
      id: id,
      is_checked: isChecked,
      updateChildren: updateChildren
    });
  }

  // Modal functionality
  var modal = $('#myModal');
  var btn = $('#openModalButton');
  var span = $('.close');

  btn.click(function() {
    modal.show();
  });

  span.click(function() {
    modal.hide();
  });

  $(window).click(function(event) {
    if (event.target == modal[0]) {
      modal.hide();
    }
  });
});
</script>

</body>
</html>
