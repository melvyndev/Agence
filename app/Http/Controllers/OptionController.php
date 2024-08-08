<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OptionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $options = Option::paginate();

        return view('option.index', compact('options'))
            ->with('i', ($request->input('page', 1) - 1) * $options->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $option = new Option();

        return view('option.create', compact('option'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionRequest $request): RedirectResponse
    {
        Option::create($request->validated());

        return Redirect::route('options.index')
            ->with('success', 'Option created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $option = Option::find($id);

        return view('option.show', compact('option'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $option = Option::find($id);

        return view('option.edit', compact('option'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionRequest $request, Option $option): RedirectResponse
    {
        $option->update($request->validated());

        return Redirect::route('options.index')
            ->with('success', 'Option updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Option::find($id)->delete();

        return Redirect::route('options.index')
            ->with('success', 'Option deleted successfully');
    }
}
