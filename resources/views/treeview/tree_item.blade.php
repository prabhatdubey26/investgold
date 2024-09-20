<li>
  <span class="caret">{{ $item->name }}</span> <input type="checkbox" class="parent-checkbox" data-id="{{ $item->id }}" {{ $item->is_checked ? 'checked' : '' }}>
  @if($item->children->isNotEmpty())
    <ul class="nested">
      @foreach($item->children as $child)
        @include('treeview.tree_item_child', ['item' => $child])
      @endforeach
    </ul>
  @endif
</li>
