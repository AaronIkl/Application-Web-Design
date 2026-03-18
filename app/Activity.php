<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['subject_id', 'type', 'grade', 'date', 'notes'];

    public function subject() {
        return $this->belongsTo(Subject::class);
    }
}