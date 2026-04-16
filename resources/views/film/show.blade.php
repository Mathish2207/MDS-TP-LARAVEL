@extends('layouts.app')

@section('template_title')
    {{ $film->name ?? __('Show') . " " . __('Film') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Film</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('films.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Title:</strong>
                                    {{ $film->title }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Release Year:</strong>
                                    {{ $film->release_year }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Synopsis:</strong>
                                    {{ $film->synopsis }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
