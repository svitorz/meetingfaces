<?php

namespace App\Http\Controllers;

use App\Models\Morador;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;

class MoradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard', ['moradores' => Morador::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return view('ShowMoradorAndCreateComentario',['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Morador $morador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Morador $morador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Morador $morador)
    {
        //
    }
}
