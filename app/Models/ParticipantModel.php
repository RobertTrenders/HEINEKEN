<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParticipantModel extends Model
{

  use SoftDeletes;

  protected $table = 'participant';

  protected $fillable = [
    'name',
    'last_name',
    'dni',
    'phone',
    'team',
    'objective',
    'created_at',
    'updated_at',
  ];

  protected $dates = ['deleted_at'];
}
