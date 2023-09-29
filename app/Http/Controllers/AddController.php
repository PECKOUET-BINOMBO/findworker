<?php

namespace App\Http\Controllers;

use App\Http\Requests\add;
use App\Http\Requests\AddRequest; // Corrected class name to match the file name
use App\Models\Job;
use Illuminate\Http\Request;
use PhpParser\Node\NullableType;

class AddController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Your implementation here (if required)
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(add $request) // Corrected class name to match the file name
    {
        $data = $request->validate([
            'title' => [
                'required',
                'min:1',
                'regex:/^[A-Z].*$/'
            ],

            'description' => [
                'required',
                'min:10',
                'regex:/^[A-Z].*$/'
            ],

            'price' => [
                'nullable', // Corrected validation rule
                'numeric',
                'min:1'

            ],

            'category' => [
                'required',
            ],

        ]);

        $data['user_id'] = auth()->user()->id;

        $job = Job::create($data);


        return redirect()->route('Jobs.index')->with('message', 'Votre annonce a été publiée avec succès'); // Corrected route name and parameter
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Your implementation here (if required)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Your implementation here (if required)
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Your implementation here (if required)
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $job = Job::findOrFail($id);

    // Delete associated cover letters
    $proposals = $job->proposals;
    foreach ($proposals as $proposal) {
        $coverLetter = $proposal->coverLetter;
        if ($coverLetter) {
            $coverLetter->delete();
        }
    }

    // Delete associated proposals
    $job->proposals()->delete();

   

    // Delete the job
    $job->delete();

    return redirect()->route('home')->with('success2', 'Votre annonce a été supprimée avec succès');
}

}
