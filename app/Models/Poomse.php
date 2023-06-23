<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Poomse extends Model
{
    use HasFactory;

    protected $fillable = [
        'codified_fight',
        'name',
    ];

    public function techniques (): BelongsToMany {
        return $this->belongsToMany(Technique::class);
    }
}
