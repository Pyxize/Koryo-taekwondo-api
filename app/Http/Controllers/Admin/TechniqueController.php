<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TechniqueFormRequest;
use App\Models\Technique;
use Illuminate\Http\Request;

class TechniqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.techniques.index', [
           'techniques' => Technique::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technique = new Technique();
        $technique->fill([
            'name' => 'Ale Maki',
            'description' => 'left leg forward, simultaneous block left arm',
        ]);
        return view('admin.techniques.form', [
           'technique' => $technique
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TechniqueFormRequest $request)
    {
        $technique = Technique::create($request->validated());
        return to_route('admin.technique.index')->with('success', 'Technique was created 🚀');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technique $technique)
    {
        return view('admin.techniques.form', [
            'technique' => $technique
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TechniqueFormRequest $request, Technique $technique)
    {
        $technique->update($request->validated());
        return to_route('admin.technique.index')->with('success', 'Technique was updated 🚀');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technique $technique)
    {
        $technique->delete();
        return to_route('admin.technique.index')->with('success', 'Technique was deleted 🚀');
    }
}
