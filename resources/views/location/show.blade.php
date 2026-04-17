@extends('layouts.app')

@section('template_title')
    {{ $location->name ?? __('Show') . " " . __('Location') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Location</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('locations.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $location->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>City:</strong>
                                    {{ $location->city }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Country:</strong>
                                    {{ $location->country }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Description:</strong>
                                    {{ $location->description }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Upvotes Count:</strong>
                                    {{ $location->upvotes_count }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Film Id:</strong>
                                    {{ $location->film_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $location->user_id }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <form action="{{ route('locations.upvote', $location->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">👍 Upvote ({{ $location->upvotes_count }})</button>
                                    </form>
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
