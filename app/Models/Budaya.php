<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Aktivitas;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Budaya extends Model
{
    use HasFactory;

    public function aktivitas(): HasMany{
        return $this->hasMany(Aktivitas::class);
    }

}
