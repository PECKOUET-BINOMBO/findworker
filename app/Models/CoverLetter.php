<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoverLetter extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'proposal_id',
        'tel',
        'tel2',
        'email',
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
        

    }
}
