<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'category',
    ];
    public function question()
    {
        return $this->hasMany(Question::class);
    }
}
