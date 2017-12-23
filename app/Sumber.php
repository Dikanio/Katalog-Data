<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sumber extends Model
{
    protected $table = 'tbl_sumber_data';
    protected $primaryKey = "id_sumber_data";

    public $timestamps = false;
}
