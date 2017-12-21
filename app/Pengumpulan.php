<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
    protected $table = 'tbl_cara_pengumpulan_data';
    protected $primaryKey = "id_cara_pengumpulan_data";

    public $timestamps = false;
}
