<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function index(Request $request)
     {
         $category = $request->query('category'); // Récupérer la catégorie sélectionnée depuis la requête

         $query = Job::online()->latest(); // Commencer avec la requête de base

         if ($category) {
             $query->where('category', $category); // Ajouter la condition de catégorie si sélectionnée
         }

         $jobs = $query->paginate(5);

         return view('jobs.index', [
             'jobs' => $jobs,
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $id)
    {

        return view('jobs.show', [
            'job' => $id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::findOrFail($id);


        return view('jobs.edit', [
            'job' => $job,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $job = Job::find($id);

        if ($request->has('title')) {
            $job->title = $request->input('title');
        }

        if ($request->has('description')) {
            $job->description = $request->input('description');
        }

        if ($request->has('price')) {
            $job->price = $request->input('price');
        }

        if ($request->has('category')) {
            $job->category = $request->input('category');
        }

        $job->save();

        return redirect()->route('Jobs.show', $job->id)->with('successupdate', 'Votre demande a bien été modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::findOrFail($id);

        $proposals = $job->proposals;

        foreach ($proposals as $proposal) {
           $coverLetter = $proposal->coverLetter;
              if ($coverLetter) {
                $coverLetter->delete();
              }
        }

        $job->proposals()->delete();
        $job->delete();


        return redirect()->route('Jobs.index')->with('successdelete', 'Votre demande a bien été supprimée !');
    }
}
