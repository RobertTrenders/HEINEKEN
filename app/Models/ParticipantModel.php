<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParticipantModel extends Model
{

  use SoftDeletes, HasFactory;

  protected $table = 'participant';

  protected $fillable = [
    'name',
    'last_name',
    'dni',
    'phone',
    'team_id',
    'objective',
    'created_at',
    'updated_at',
  ];

  protected $dates = ['deleted_at'];
}
