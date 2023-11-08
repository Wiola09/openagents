<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function agent()
  {
    return $this->belongsTo(Agent::class);
  }

  public function artifacts()
  {
    return $this->hasMany(Artifact::class);
  }
}
