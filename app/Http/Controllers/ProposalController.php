<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Job;
use App\Models\Proposal;
use App\Models\CoverLetter;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    public function store(Request $request, Job $job)
    {

       $proposal = Proposal::create([
           'job_id' => $job->id,
           'validated' => false
       ]);


        CoverLetter::create([
            'proposal_id' => $proposal->id,
            'content' => $request->input('content'),
            'tel' => $request->input('tel'),
            'tel2' => $request->input('tel2'),
            'email' => $request->input('email'),


        ]);

        return redirect()->route('Jobs.index') ->with('success', 'Votre proposition a bien été soumise.');
    }

    public function confirm(Request $request)
    {
        $proposal = Proposal::findOrFail($request->proposal);

        if($proposal->job->user->id != auth()->user()->id)
        {
            return redirect()->route('Jobs.index');
        }

        $proposal->fill(['validated' => 1]);

        if($proposal->isDirty())
        {
            $proposal->save();

           $conversation = Conversation::create([
                'from' => auth()->user()->id,
                'to' => $proposal->user->id,
                'job_id' => $proposal->job_id
            ]);

            Message::create([
                'user_id' => auth()->user()->id,
                'conversation_id' => $conversation->id,
                'content' => 'Bonjour, je suis intéressé par votre offre.'
            ]);

            return redirect()->route('Jobs.index');

        }
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
    
}

}
