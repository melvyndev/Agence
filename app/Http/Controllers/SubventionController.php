<?php

namespace App\Http\Controllers;

use App\Models\Subvention;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SubventionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SubventionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $subventions = Subvention::paginate();

        return view('subvention.index', compact('subventions'))
            ->with('i', ($request->input('page', 1) - 1) * $subventions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $subvention = new Subvention();

        return view('subvention.create', compact('subvention'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubventionRequest $request): RedirectResponse
    {
        Subvention::create($request->validated());

        return Redirect::route('subventions.index')
            ->with('success', 'Subvention created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $subvention = Subvention::find($id);

        return view('subvention.show', compact('subvention'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $subvention = Subvention::find($id);

        return view('subvention.edit', compact('subvention'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubventionRequest $request, Subvention $subvention): RedirectResponse
    {
        $subvention->update($request->validated());

        return Redirect::route('subventions.index')
            ->with('success', 'Subvention updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Subvention::find($id)->delete();

        return Redirect::route('subventions.index')
            ->with('success', 'Subvention deleted successfully');
    }
}