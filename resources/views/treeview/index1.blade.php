<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
ul, #myUL {
  list-style-type: none;
}

#myUL {
  margin: 0;
  padding: 0;
}

.caret {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;
}

.caret-down::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */
  transform: rotate(90deg);  
}

.nested {
  display: none;
}

.active {
  display: block;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<h2>Tree View</h2>
<p>A tree view represents a hierarchical view of information, where each item can have a number of subitems.</p>
<p>Click on the arrow(s) to open or close the tree branches. Checkboxes maintain hierarchical integrity.</p>

<ul id="myUL">
  @foreach($treeData as $item)
    @include('treeview.tree_item', ['item' => $item])
  @endforeach
</ul>

<script>
var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    this.parentElement.querySelector(".nested").classList.toggle("active");
    this.classList.toggle("caret-down");
  });
}

// Checkbox functionality
$(document).on('change', '.parent-checkbox', function() {
  var isChecked = $(this).is(':checked');
  var nodeId = $(this).data('id');

  $(this).closest('li').find('.child-checkbox').each(function() {
    $(this).prop('checked', isChecked);
    updateCheckbox($(this).data('id'), isChecked, true);
  });

  updateCheckbox(nodeId, isChecked, true);
});

$(document).on('change', '.child-checkbox', function() {
  updateCheckbox($(this).data('id'), $(this).is(':checked'), false);
});

function updateCheckbox(id, isChecked, updateChildren) {
  $.post('/treeview/update', {
    _token: '{{ csrf_token() }}',
    id: id,
    is_checked: isChecked,
    updateChildren: updateChildren
  });
}
</script>

</body>
</html>
