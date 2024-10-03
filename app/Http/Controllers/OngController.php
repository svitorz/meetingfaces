<?php

namespace App\Http\Controllers;

use App\Models\Morador;
use App\Models\Ong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OngController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authUser = Auth::user()->id;
        $ongId = Ong::where('id_usuario', $authUser)->first()->id;
        $moradores = Morador::where('id_ong', $ongId)->paginate(12);
        $link_morador = true;
        return view('dashboard', ['moradores' => $moradores, 'link_morador' => $link_morador]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
    }

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
