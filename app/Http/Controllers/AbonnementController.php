<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    public function modePaiement(string $id)
    {
        $user = User::find($id);

        return view('abonnement.paiement', compact('user'));
    }




    /**
     * Display a listing of the resource.
     */

    public function abonnement(string $id)
    {
        $user = User::findOrfail($id);

        $user = User::where('id', $id)->update([
            'is_active' => true,
            'date_active' => now(),
            'date_inactive' => now()->addDays(31),
        ]);

        return redirect()->route('home')->with('successabonnement', 'Félicitations ! Vous avez souscrit à un abonnement mensuel. C\'est un pas vers une expérience exceptionnelle.');
    }

    public function abonnement2(string $id)
    {
        $user = User::findOrfail($id);

        $user = User::where('id', $id)->update([
            'is_active' => true,
            'date_active' => now(),
            'date_inactive' => now()->addDays(93),
        ]);

        return redirect()->route('home')->with('successabonnement', 'Félicitations ! Vous avez souscrit à un abonnement trimestriel. C\'est un pas vers une expérience exceptionnelle.');
    }

    public function abonnement3(string $id)
    {
        $user = User::findOrfail($id);

        $user = User::where('id', $id)->update([
            'is_active' => true,
            'date_active' => now(),
            'date_inactive' => now()->addDays(186),
        ]);

        return redirect()->route('home')->with('successabonnement', 'Félicitations ! Vous avez souscrit à un abonnement semestriel. C\'est un pas vers une expérience exceptionnelle.');
    }

    public function abonnement4(string $id)
    {
        $user = User::findOrfail($id);

        $user = User::where('id', $id)->update([
            'is_active' => true,
            'date_active' => now(),
            'date_inactive' => now()->addDays(365),
        ]);

        return redirect()->route('home')->with('successabonnement', 'Félicitations ! Vous avez souscrit à un abonnement annuel. C\'est un pas vers une expérience exceptionnelle.');
    }

    public function desabonnement(string $id)
    {
        $user = User::findOrfail($id);

        $user = User::where('id', $id)->update([
            'is_active' => false,
            'date_active' => null,
            'date_inactive' => null,
        ]);

        return view('home')->with('successdesabonnement', 'Votre désabonnement a été effectué avec succès');
    }


    public function index()
    {
        //
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
         $user = User::find($id);

         return view('abonnement.abonnement', compact('user'));
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
        //
    }
}
