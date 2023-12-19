<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        "uuid",
        "name",
        "start_date",
        "end_date",
        "response_count"
    ];

    protected $casts = [
        "start_date" => 'datetime',
        "end_date" => 'datetime',
    ];

    public function inputs()
    {
        return $this->hasMany(Input::class);
    }
}
