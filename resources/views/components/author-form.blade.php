<form method="POST" action="{{ $action }}">
    @csrf
    @if($author)
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" class="form-control" value="{{ $author->first_name ?? '' }}">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" class="form-control" value="{{ $author->last_name ?? '' }}">
    </div>
    <div class="form-group">
        <label for="biography">Biography</label>
        <textarea name="biography" class="form-control">{{ $author->biography ?? '' }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">{{ $author ? 'Update' : 'Create' }}</button>
</form>
