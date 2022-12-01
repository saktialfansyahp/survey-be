<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $table = 'results';
    protected $primaryKey = 'id';
    protected $fillable = [
        'point',
        'survey_id',
        'question_id',
    ];
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
