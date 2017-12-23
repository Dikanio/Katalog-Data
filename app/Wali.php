<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    protected $table = 'tbl_wali_data';
    protected $primaryKey = "id_wali_data";

    public $timestamps = false;
}
