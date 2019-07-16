<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{
    protected $table ='Pets';
    protected $fillable = ['nama', 'jenis', 'pemilik', 'image', 'created_at', 'updated_at'];
}
