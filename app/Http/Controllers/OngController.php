<?php

namespace App\Http\Controllers;

use App\Livewire\Ongs\Show;
use App\Models\Ong;
use Illuminate\Http\Request;

class OngController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ongs.OngDashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ong $ong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ong $ong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ong $ong)
    {
        //
    }
}
