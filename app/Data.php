<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'tbl_data';
    protected $primaryKey = "id_data";

    public function pengumpulan() {
        return $this->belongsTo('App\Pengumpulan', 'id_cara_pengumpulan_data');
    }

    public function pengelola() {
        return $this->belongsTo('App\Pengelola', 'id_pengelola_data');
    }

    public function sumber() {
        return $this->belongsTo('App\Sumber', 'id_sumber_data');
    }

    public function wali() {
        return $this->belongsTo('App\Wali', 'id_wali_data');
    }
}
