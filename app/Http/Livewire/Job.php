<?php

namespace App\Http\Livewire;

use App\Models\Job as JobModel;
use Livewire\Component;

class Job extends Component
{
    public $selectedCategory = null;

    public function render()
    {
        $jobs = JobModel::online()
            ->when($this->selectedCategory, function ($query) {
                $query->where('category_id', $this->selectedCategory);
            })
            ->latest()
            ->paginate(9);

        return view('livewire.job', [
            'jobs' => $jobs,
        ]);
    }

    public $job;

    public function deleteJob(){
        if ($this->job) {
            // Supprimer les propositions associées à ce travail
            $this->job->proposals()->delete();

            // Supprimer le travail de la base de données
            $this->job->delete();

            $this->emit('flash', 'Le travail a été supprimé avec succès', 'success');
        }
    }


}
