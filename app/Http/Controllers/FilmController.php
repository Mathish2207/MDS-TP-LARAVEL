<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\FilmRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $films = Film::paginate();

        return view('film.index', compact('films'))
            ->with('i', ($request->input('page', 1) - 1) * $films->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $film = new Film();

        return view('film.create', compact('film'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FilmRequest $request): RedirectResponse
    {
        Film::create($request->validated());

        return Redirect::route('films.index')
            ->with('success', 'Film created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $film = Film::find($id);

        return view('film.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $film = Film::find($id);

        return view('film.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FilmRequest $request, Film $film): RedirectResponse
    {
        $film->update($request->validated());

        return Redirect::route('films.index')
            ->with('success', 'Film updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Film::find($id)->delete();

        return Redirect::route('films.index')
            ->with('success', 'Film deleted successfully');
    }
}
