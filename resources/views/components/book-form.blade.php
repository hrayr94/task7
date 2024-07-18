<form method="POST" action="{{ $action }}">
    @csrf
    @if($book)
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $book->title ?? '' }}">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control">{{ $book->description ?? '' }}</textarea>
    </div>
    <div class="form-group">
        <label for="publication_year">Publication Year</label>
        <input type="number" name="publication_year" class="form-control" value="{{ $book->publication_year ?? '' }}">
    </div>
    <div class="form-group">
        <label for="authors">Authors</label>
        <select name="authors[]" class="form-control" multiple>
            @foreach($authors as $author)
                <option value="{{ $author->id }}" {{ isset($book) && in_array($author->id, $book->authors->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $author->first_name }} {{ $author->last_name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">{{ $book ? 'Update' : 'Create' }}</button>
</form>
