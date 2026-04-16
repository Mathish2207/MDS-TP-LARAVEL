<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $location?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="city" class="form-label">{{ __('City') }}</label>
            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city', $location?->city) }}" id="city" placeholder="City">
            {!! $errors->first('city', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="country" class="form-label">{{ __('Country') }}</label>
            <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" value="{{ old('country', $location?->country) }}" id="country" placeholder="Country">
            {!! $errors->first('country', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="description" class="form-label">{{ __('Description') }}</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $location?->description) }}" id="description" placeholder="Description">
            {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        @if($location->id)
            <div class="form-group mb-2 mb20">
                <label for="upvotes_count" class="form-label">{{ __('Upvotes Count') }}</label>
                <input type="text" name="upvotes_count" class="form-control @error('upvotes_count') is-invalid @enderror" value="{{ old('upvotes_count', $location?->upvotes_count) }}" id="upvotes_count" placeholder="Upvotes Count">
                {!! $errors->first('upvotes_count', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        @endif

        <div class="form-group mb-2 mb20">
            <label for="film_id" class="form-label">{{ __('Film') }}</label>
            <select name="film_id" class="form-control @error('film_id') is-invalid @enderror" id="film_id">
                <option value="">{{ __('Select a Film') }}</option>
                @foreach($films as $film)
                    <option value="{{ $film->id }}" @selected(old('film_id', $location?->film_id) == $film->id)>
                        {{ $film->title }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('film_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>