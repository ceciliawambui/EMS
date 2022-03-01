{{-- <a href="{{ route('department.edit',$id) }}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary edit">
    Edit
</a>
<a href="javascript:void(0)" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
    Delete
</a> --}}

@if($trashed == 0)
<a href="{{ route('department.edit',$id) }}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary edit">
    Edit
</a>
<a href="javascript:void(0)" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
    Trash
</a>
{{-- <a href="javascript:void(0)"  data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Delete" class="edit btn btn-dark edit">
    Trash
</a> --}}
@endif
@if($trashed == 1)
<a href="{{ route('department.forceDelete',$id) }}" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
    Delete
</a>
<a href="{{ route('department.restore',$id) }}" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Restore" class="btn btn-warning">
    Restore
</a>
@endif