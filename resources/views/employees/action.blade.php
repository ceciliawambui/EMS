<a href="{{ route('employees.edit',$id) }}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary edit">
    Edit
</a>
<a href="javascript:void(0)" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
    Delete
</a>
@if($trashed == 1)
<a href="{{ route('employees.restore',$id) }}" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Restore" class="btn btn-warning">
    Restore
</a>
@endif