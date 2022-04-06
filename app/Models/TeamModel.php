<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamModel extends Model
{

  use SoftDeletes;

  protected $table = 'team';

  protected $fillable = [
    'name',
    'created_at',
    'updated_at',
  ];

  protected $dates = ['deleted_at'];
}
