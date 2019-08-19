<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
  protected $primaryKey = 'trip_id';
  protected $fillable = [
    'origin',
    'origin_code',
    'origin_value',
    'destination',
    'destination_code',
    'destination_value',
    'fare'
  ];
}
