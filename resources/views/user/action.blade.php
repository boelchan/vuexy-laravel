@role('administrator')
    <form action="{{ route('user.destroy', $user->id) }}" method="post">
        <a href="{{ route('user.edit', $user->id) }}" class='btn btn-icon btn-sm btn-flat-success' title="edit">
            <i class="far fa-edit"></i>
        </a>
        @csrf
        @method('DELETE')
        <button type="submit" class='btn btn-icon btn-sm btn-flat-danger'> <i class="far fa-trash-alt"></i></button>
    </form>
@endrole