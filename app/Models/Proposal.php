<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proposal extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function submitter(): BelongsTo {
        return $this->belongsTo(User::class, 'submitter_id');
    }

    public function kabag_acceptor(): BelongsTo {
        return $this->belongsTo(User::class, 'kabag_id');
    }

    public function wr_acceptor(): BelongsTo {
        return $this->belongsTo(User::class, 'wr3_id');
    }
}
