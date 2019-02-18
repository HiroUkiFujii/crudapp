<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
  public $table = 'members';
  protected $fillable = ['id' ,'name', 'email', 'tel'];
  protected $primarykey = 'id';
}