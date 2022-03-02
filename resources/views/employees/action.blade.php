@if($trashed == 0)
<a href="{{ route('employees.edit',$id) }}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary edit btn-sm">
    Edit
</a>
<a href="javascript:void(0)" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-dark btn-sm">
    Trash
</a>
{{-- <a href="javascript:void(0)"  data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Delete" class="edit btn btn-dark edit">
    Trash
</a> --}}
@endif
@if($trashed == 1)
<a href="{{ route('employees.forceDelete',$id) }}" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn-sm" style="margin:5px">
    Delete
</a>
<a href="{{ route('employees.restore',$id) }}" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Restore" class="btn btn-warning btn-sm">
    Restore
</a>
@endif
