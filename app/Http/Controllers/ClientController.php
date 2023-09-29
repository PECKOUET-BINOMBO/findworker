<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\prestataire;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $category = $request->query('category'); // Récupérer la catégorie sélectionnée depuis la requête

        $query = Client::latest(); // Commencer avec la requête de base

        if ($category) {
            $query->where('category', $category); // Ajouter la condition de catégorie si sélectionnée
        }

        $clients = $query->paginate(5);

        return view('jobs.prestataire', [
            'clients' => $clients,
            'selectedCategory' => $category, // Passer la catégorie sélectionnée à la vue
        ]);
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
    public function store(prestataire $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'min:4',
                'regex:/^[A-Z].*$/'
            ],

            'email' => [
                'required',
            ],

            'tel' => [
                'required',
                'regex:/^\d+$/'
            ],

            'tel2' => [

                'regex:/^\d+$/'
            ],

            'service' => [
                'required',
                'regex:/^[A-Z].*$/'
            ],

            'description' => [
                'required',
                'regex:/^[A-Z].*$/'
            ],

            'category' => 'required',


        ]);

        $data['user_id'] = auth()->user()->id;
        $prestataire = Client::create($data);
        return redirect()->route('Jobs.prestataire', $prestataire->id)->with('message', 'Votre service a été publiée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $id)
    {

        return view('jobs.showprestataire', [
            'client' => $id,

        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $client = Client::findOrFail($id);

        return view('jobs.edit2', [
            'client' => $client,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::find($id);

        if ($request->has('name')) {
            $client->name = $request->input('name');
        }

        if ($request->has('email')) {
            $client->email = $request->input('email');
        }

        if ($request->has('tel')) {
            $client->tel = $request->input('tel');
        }

        if ($request->has('tel2')) {
            $client->tel2 = $request->input('tel2');
        }

        if ($request->has('service')) {
            $client->service = $request->input('service');
        }

        if ($request->has('description')) {
            $client->description = $request->input('description');
        }

        if ($request->has('category')) {
            $client->category = $request->input('category');
        }


        $client->save();

        return redirect()->route('Jobs.prestataire.show', $client->id)->with('successupdate', 'Votre offre a bien été modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);

        // $proposals = $job->proposals;

        // foreach ($proposals as $proposal) {
        //    $coverLetter = $proposal->coverLetter;
        //       if ($coverLetter) {
        //         $coverLetter->delete();
        //       }
        // }
        // $job->proposals()->delete();

        $client->delete();


        return redirect()->route('Jobs.prestataire')->with('successdelete', 'Votre offre a bien été supprimée !');
    }
}
