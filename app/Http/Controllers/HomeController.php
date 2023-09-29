<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Job;
use App\Models\User;
use App\Models\Proposal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $clients = auth()->user()->clients;
    $proposals = auth()->user()->proposals;
    $jobs = auth()->user()->jobs;
    return view('home', compact('proposals', 'jobs', 'clients'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proposal = Proposal::findOrFail($id);

        // Supprimer les lettres de motivation associées à cette proposition
        $proposal->coverLetter()->delete();

        // Supprimer la proposition de la base de données
        $proposal->delete();

        return redirect()->route('home')->with('success', 'Candidature abandonnée avec succès.');
    }



}
