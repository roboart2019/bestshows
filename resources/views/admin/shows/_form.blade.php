<div class="grid-2">
    <div class="form-group">
        <label for="title">Title *</label>
        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $show->title ?? '') }}" required>
        @error('title') <p class="form-error">{{ $message }}</p> @enderror
    </div>

    <div class="form-group">
        <label for="type">Type *</label>
        <select id="type" name="type" class="form-control" required>
            <option value="movie" {{ old('type', $show->type ?? '') === 'movie' ? 'selected' : '' }}>Movie</option>
            <option value="tv_show" {{ old('type', $show->type ?? '') === 'tv_show' ? 'selected' : '' }}>TV Show</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea id="description" name="description" class="form-control">{{ old('description', $show->description ?? '') }}</textarea>
</div>

<div class="grid-2">
    <div class="form-group">
        <label for="genre">Genre</label>
        <input type="text" id="genre" name="genre" class="form-control" value="{{ old('genre', $show->genre ?? '') }}" placeholder="Action, Drama, Comedy...">
    </div>

    <div class="form-group">
        <label for="release_year">Release Year</label>
        <input type="number" id="release_year" name="release_year" class="form-control" value="{{ old('release_year', $show->release_year ?? '') }}" min="1900" max="2030">
    </div>
</div>

<div class="grid-2">
    <div class="form-group">
        <label for="director">Director</label>
        <input type="text" id="director" name="director" class="form-control" value="{{ old('director', $show->director ?? '') }}">
    </div>

    <div class="form-group">
        <label for="network_or_studio">Network/Studio</label>
        <input type="text" id="network_or_studio" name="network_or_studio" class="form-control" value="{{ old('network_or_studio', $show->network_or_studio ?? '') }}">
    </div>
</div>

<div class="form-group">
    <label for="cast">Cast</label>
    <input type="text" id="cast" name="cast" class="form-control" value="{{ old('cast', $show->cast ?? '') }}" placeholder="Actor 1, Actor 2, Actor 3...">
</div>

<div class="grid-2">
    <div class="form-group">
        <label for="mpaa_rating">MPAA Rating (Movies)</label>
        <select id="mpaa_rating" name="mpaa_rating" class="form-control">
            <option value="">-- Select --</option>
            @foreach(['G', 'PG', 'PG-13', 'R', 'NC-17'] as $r)
                <option value="{{ $r }}" {{ old('mpaa_rating', $show->mpaa_rating ?? '') === $r ? 'selected' : '' }}>{{ $r }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="tv_rating">TV Rating</label>
        <select id="tv_rating" name="tv_rating" class="form-control">
            <option value="">-- Select --</option>
            @foreach(['TV-Y', 'TV-Y7', 'TV-G', 'TV-PG', 'TV-14', 'TV-MA'] as $r)
                <option value="{{ $r }}" {{ old('tv_rating', $show->tv_rating ?? '') === $r ? 'selected' : '' }}>{{ $r }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="grid-2">
    <div class="form-group">
        <label for="seasons">Seasons (TV)</label>
        <input type="number" id="seasons" name="seasons" class="form-control" value="{{ old('seasons', $show->seasons ?? '') }}" min="1">
    </div>

    <div class="form-group">
        <label for="episodes">Episodes (TV)</label>
        <input type="number" id="episodes" name="episodes" class="form-control" value="{{ old('episodes', $show->episodes ?? '') }}" min="1">
    </div>
</div>

<div class="form-group">
    <label for="runtime_minutes">Runtime (minutes)</label>
    <input type="number" id="runtime_minutes" name="runtime_minutes" class="form-control" value="{{ old('runtime_minutes', $show->runtime_minutes ?? '') }}" min="1" style="max-width: 200px;">
</div>

<div class="grid-2">
    <div class="form-group">
        <label for="poster_image">Poster Image URL</label>
        <input type="text" id="poster_image" name="poster_image" class="form-control" value="{{ old('poster_image', $show->poster_image ?? '') }}">
    </div>

    <div class="form-group">
        <label for="banner_image">Banner Image URL</label>
        <input type="text" id="banner_image" name="banner_image" class="form-control" value="{{ old('banner_image', $show->banner_image ?? '') }}">
    </div>
</div>

<div class="form-group">
    <label for="trailer_url">Trailer URL</label>
    <input type="url" id="trailer_url" name="trailer_url" class="form-control" value="{{ old('trailer_url', $show->trailer_url ?? '') }}">
</div>

<div class="grid-2" style="margin-bottom: 1.5rem;">
    <div class="form-group">
        <label class="form-check">
            <input type="hidden" name="is_featured" value="0">
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $show->is_featured ?? false) ? 'checked' : '' }}>
            Featured on Homepage
        </label>
    </div>

    <div class="form-group">
        <label class="form-check">
            <input type="hidden" name="is_published" value="0">
            <input type="checkbox" name="is_published" value="1" {{ old('is_published', $show->is_published ?? true) ? 'checked' : '' }}>
            Published (visible to public)
        </label>
    </div>
</div>
