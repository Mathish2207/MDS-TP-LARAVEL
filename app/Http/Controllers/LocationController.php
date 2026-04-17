<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Jobs\ProcessUpvote;
use App\Models\Film;
use App\Models\Location;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $locations = Location::paginate();

        return view('location.index', compact('locations'))
            ->with('i', ($request->input('page', 1) - 1) * $locations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $location = new Location;
        $films = Film::all();

        return view('location.create', compact('location', 'films'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['upvotes_count'] = 0;

        Location::create($data);

        return Redirect::route('locations.index')
            ->with('success', 'Location created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $location = Location::find($id);

        return view('location.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $location = Location::findOrFail($id);
        $films = Film::all();

        return view('location.edit', compact('location', 'films'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request, $id): RedirectResponse
    {
        $location = Location::findOrFail($id);
        $location->update($request->validated());

        return Redirect::route('locations.index')
            ->with('success', 'Location updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Location::find($id)->delete();

        return Redirect::route('locations.index')
            ->with('success', 'Location deleted successfully');
    }

    public function upvote($id): RedirectResponse
    {
        $user = Auth::user();

        ProcessUpvote::dispatch($user->id, $id);

        return Redirect::back()
            ->with('success', 'Votre vote a été enregistré!');
    }
}
