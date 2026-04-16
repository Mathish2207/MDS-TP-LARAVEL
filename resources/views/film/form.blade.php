<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="title" class="form-label">{{ __('Title') }}</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $film?->title) }}" id="title" placeholder="Title">
            {!! $errors->first('title', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="release_year" class="form-label">{{ __('Release Year') }}</label>
            <input type="text" name="release_year" class="form-control @error('release_year') is-invalid @enderror" value="{{ old('release_year', $film?->release_year) }}" id="release_year" placeholder="Release Year">
            {!! $errors->first('release_year', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="synopsis" class="form-label">{{ __('Synopsis') }}</label>
            <input type="text" name="synopsis" class="form-control @error('synopsis') is-invalid @enderror" value="{{ old('synopsis', $film?->synopsis) }}" id="synopsis" placeholder="Synopsis">
            {!! $errors->first('synopsis', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>