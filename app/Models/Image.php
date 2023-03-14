<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\ApiTrait;

class Image extends Model {
  use HasFactory, ApiTrait;

  protected $fillable = ['url'];

  // Relation morphs
  public function imageable() {
    return $this->morphTo();
  }
}