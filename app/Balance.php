<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
  protected $primaryKey = 'balance_id';
  protected $fillable =['amount'];
}
