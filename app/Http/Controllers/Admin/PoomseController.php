<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PoomseFormRequest;
use App\Models\Poomse;
use App\Models\Technique;
use Illuminate\Http\Request;

class PoomseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.poomses.index', [
            'poomses' => Poomse::with('techniques')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $poomse = new Poomse();
        $poomse->fill([
            'codified_fight' => 'Poomsae 1',
            'name' => 'Taegeuk Il Jang',
        ]);
        return view('admin.poomses.form', [
            'poomse' => $poomse,
            // 'techniques' => Technique::select('id', 'name')->get()
            'techniques' => Technique::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PoomseFormRequest $request)
    {
        $poomse = Poomse::create($request->validated());
        $poomse->techniques()->sync($request->validated('techniques'));
        return to_route('admin.poomse.index')->with('success', 'Poomse was created 🚀');
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
    public function edit(Poomse $poomse)
    {
        return view('admin.poomses.form', [
            'poomse' => $poomse,
            //'techniques' => Technique::select('id', 'name')->get()
            'techniques' => Technique::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PoomseFormRequest $request, Poomse $poomse)
    {
        $poomse->update($request->validated());
        $poomse->techniques()->sync($request->validated('techniques'));
        return to_route('admin.poomse.index')->with('success', 'Poomse was updated 🚀');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poomse $poomse)
    {
        $poomse->delete();
        return to_route('admin.poomse.index')->with('success', 'Technique was deleted 🚀');
    }
}
