<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengelola extends Model
{
    protected $table = 'tbl_pengelola_data';
    protected $primaryKey = "id_pengelola_data";

    public $timestamps = false;
}
