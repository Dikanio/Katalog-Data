<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Data;
use App\Pengelola;
use App\Pengumpulan;
use App\Sumber;
use App\Wali;
use App\Kedinasan;
use DB;
//use Validator;
use Response;

class DataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Data::paginate(5);
        return view('table-view', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Kedinasan::distinct()->select('id_nama_dinas', 'nama_dinas')->get();
        $sektor = DB::select('select * from sektor_data');
        $jenis = DB::select('select * from jenis_data');
        $periode = DB::select('select * from periode_kemunculan_data');
        $tipe = DB::select('select * from tipe_data');
        $geo = DB::select('select * from level_penyajian_data_secara_geografis');
        return view('create',['data'=>$data, 'sektor'=>$sektor, 'jenis'=>$jenis, 'periode'=>$periode, 'tipe'=>$tipe, 'geo'=>$geo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judulData' => 'required',
            'jenisData' => 'required',
            'dataDasar' => 'required',
            'deskripsiData' => 'required',
            'jenisData' => 'required|not_in:Pilih Jenis Data',
            'sektorData' => 'required|not_in:Pilih Sektor Data',
            'wldinas' => 'required|not_in:Pilih Dinas/Instansi',
            'wlbidang' => 'required|not_in:Pilih Bidang Kedinasan',
            'wlseksi' => 'required|not_in:Pilih Seksi Kedinasan',
            'pldinas' => 'required|not_in:Pilih Dinas/Instansi',
            'plbidang' => 'required|not_in:Pilih Bidang Kedinasan',
            'plseksi' => 'required|not_in:Pilih Seksi Kedinasan',
            'sbdinas' => 'required|not_in:Pilih Dinas/Instansi',
            'sbbidang' => 'required|not_in:Pilih Bidang Kedinasan',
            'sbseksi' => 'required|not_in:Pilih Seksi Kedinasan',
            'kemunculanData' => 'required|not_in:Pilih Periode',
            'tipeData' => 'required|not_in:Pilih Tipe Data',
            'levelGeo' => 'required|not_in:Pilih Level Penyajian Data Secara Geografis',
            //'caraPengumpulanData' => 'required',
            //'namaSistem' => 'required',
            //'alamatSistem' => 'required',
            //'lembagaSurvey' => 'required',
            //'waktuSurvey' => 'required',
            'tahunTersedia' => 'required',
            //'tipeData' => 'required',
            'penanggungJawab' => 'required',
            'kontak' => 'required'
        ]);


        $data = new Data;
        $pengelola = new Pengelola;
        $pengumpulan = new Pengumpulan;
        $sumber = new Sumber;
        $wali = new Wali;

        // return $request;

        $data->judul_data = $request->input('judulData');
        $data->jenis_data = $request->input('jenisData');
        $data->data_dasar = $request->input('dataDasar');
        $data->deskripsi_data = $request->input('deskripsiData');
        $data->sektor_data = $request->input('sektorData');
        $data->periode_kemunculan_data = $request->input('kemunculanData');
        $data->tahun_mulai_tersedia = $request->input('tahunTersedia');
        $data->tipe_data = $request->input('tipeData');
        $data->level_penyajian_data = $request->input('levelGeo');
        $data->penglevelan_kategori_lain = $request->input('level');
        $data->penanggung_jawab_data = $request->input('penanggungJawab');
        $data->kontak_penanggung_jawab = $request->input('kontak');

        // Mengambil data dari wali
        $id_wali_1 = $request->input('wldinas');
        $wali_1 = DB::select("select distinct nama_dinas from tbl_kedinasan where id_nama_dinas = '$id_wali_1'");
        foreach($wali_1 as $w) {
            $wali->nama_dinas = $w->nama_dinas;
        }

        $id_wali_2 = $request->input('wlbidang');
        $wali_2 = DB::select("select distinct bidang_kedinasan from tbl_kedinasan where id_bidang_kedinasan = '$id_wali_2'");
        foreach($wali_2 as $w) {
            $wali->bidang_kedinasan = $w->bidang_kedinasan;
        }

        $id_wali_3 = $request->input('wlseksi');
        $wali_3 = DB::select("select distinct seksi_kedinasan from tbl_kedinasan where id_seksi_kedinasan = '$id_wali_3'");
        foreach($wali_3 as $w) {
            $wali->seksi_kedinasan = $w->seksi_kedinasan;
        }

        // Mengambil data dari pengelola

        $id_pengelola = $request->input('pldinas');
        $pengelolanya = DB::select("select distinct nama_dinas from tbl_kedinasan where id_nama_dinas = '$id_pengelola'");
        foreach($pengelolanya as $p) {
            $pengelola->nama_dinas = $p->nama_dinas;
        }

        $id_pengelola = $request->input('plbidang');
        $pengelolanya = DB::select("select distinct bidang_kedinasan from tbl_kedinasan where id_bidang_kedinasan = '$id_pengelola'");
        foreach($pengelolanya as $p) {
            $pengelola->bidang_kedinasan = $p->bidang_kedinasan;
        }

        $id_pengelola = $request->input('plseksi');
        $pengelolanya = DB::select("select distinct seksi_kedinasan from tbl_kedinasan where id_seksi_kedinasan = '$id_pengelola'");
        foreach($pengelolanya as $p) {
            $pengelola->seksi_kedinasan = $p->seksi_kedinasan;
        }

        $id_sumber = $request->input('sbdinas');
        $sumbernya = DB::select("select distinct nama_dinas from tbl_kedinasan where id_nama_dinas = '$id_sumber'");
        foreach($sumbernya as $s) {
            $sumber->nama_dinas = $s->nama_dinas;
        }

        $id_sumber = $request->input('sbbidang');
        $sumbernya = DB::select("select distinct bidang_kedinasan from tbl_kedinasan where id_bidang_kedinasan = '$id_sumber'");
        foreach($sumbernya as $s) {
            $sumber->bidang_kedinasan = $s->bidang_kedinasan;
        }

        $id_sumber = $request->input('sbseksi');
        $sumbernya = DB::select("select distinct seksi_kedinasan from tbl_kedinasan where id_seksi_kedinasan = '$id_sumber'");
        foreach($sumbernya as $s) {
            $sumber->seksi_kedinasan = $s->seksi_kedinasan;
        }

        if($request->input('caraPengumpulanData') == "sistem") {
            $pengumpulan->nama_sistem = $request->input('namaSistem');
            $pengumpulan->url_sistem = $request->input('alamatSistem');
            $pengumpulan->pemilik_sistem = $request->input('pemilikSistem');
        }

        else if($request->input('caraPengumpulanData') == "survey") {
            $pengumpulan->lembaga_survey = $request->input('lembagaSurvey');
            $pengumpulan->waktu_survey = $request->input('waktuSurvey');
        }

        $wali->save();
        $pengelola->save();
        $sumber->save();
        $pengumpulan->save();

        $data->id_wali_data = $wali->id_wali_data;
        $data->id_pengelola_data = $pengelola->id_pengelola_data;
        $data->id_sumber_data = $sumber->id_sumber_data;
        $data->id_cara_pengumpulan_data = $pengumpulan->id_cara_pengumpulan_data;

        date_default_timezone_set("Asia/Bangkok");
        $data->save();

        return redirect('/')->with('success', 'Data Ditambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Data::find(base64_decode($id));
        
        return view('detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Data::find(base64_decode($id));

        $dinas = Kedinasan::distinct()->select('id_nama_dinas', 'nama_dinas')->get();

        $bidang_wali = DB::select("select distinct id_bidang_kedinasan, bidang_kedinasan from tbl_kedinasan where nama_dinas = '".$data->wali->nama_dinas."'");
        $seksi_wali = DB::select("select distinct id_seksi_kedinasan, seksi_kedinasan from tbl_kedinasan where bidang_kedinasan = '".$data->wali->bidang_kedinasan."'");

        $bidang_pengelola = DB::select("select distinct id_bidang_kedinasan, bidang_kedinasan from tbl_kedinasan where nama_dinas = '".$data->pengelola->nama_dinas."'");
        $seksi_pengelola = DB::select("select distinct id_seksi_kedinasan, seksi_kedinasan from tbl_kedinasan where bidang_kedinasan = '".$data->pengelola->bidang_kedinasan."'");

        $bidang_sumber = DB::select("select distinct id_bidang_kedinasan, bidang_kedinasan from tbl_kedinasan where nama_dinas = '".$data->sumber->nama_dinas."'");
        $seksi_sumber = DB::select("select distinct id_seksi_kedinasan, seksi_kedinasan from tbl_kedinasan where bidang_kedinasan = '".$data->sumber->bidang_kedinasan."'");

        $sektor = DB::select('select nama_sektor from sektor_data');
        $sektorTerpilih = $data->sektor_data;

        $periode = DB::select('select periode_kemunculan from periode_kemunculan_data');
        $tipe_data = DB::select('select tipe_data from tipe_data');
        $level_penyajian = DB::select('select level_penyajian from level_penyajian_data_secara_geografis');

        return view('edit', compact('data', 'dinas', 'bidang_wali', 'seksi_wali', 'bidang_pengelola', 'seksi_pengelola', 'bidang_sumber', 'seksi_sumber', 'sektor', 'sektorTerpilih', 'periode', 'tipe_data', 'level_penyajian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'judulData' => 'required',
            'jenisData' => 'required',
            'dataDasar' => 'required',
            'deskripsiData' => 'required',
            'jenisData' => 'required|not_in:Pilih Jenis Data',
            'sektorData' => 'required|not_in:Pilih Sektor Data',
            'wldinas' => 'required|not_in:Pilih Dinas/Instansi',
            'wlbidang' => 'required|not_in:Pilih Bidang Kedinasan',
            'wlseksi' => 'required|not_in:Pilih Seksi Kedinasan',
            'pldinas' => 'required|not_in:Pilih Dinas/Instansi',
            'plbidang' => 'required|not_in:Pilih Bidang Kedinasan',
            'plseksi' => 'required|not_in:Pilih Seksi Kedinasan',
            'sbdinas' => 'required|not_in:Pilih Dinas/Instansi',
            'sbbidang' => 'required|not_in:Pilih Bidang Kedinasan',
            'sbseksi' => 'required|not_in:Pilih Seksi Kedinasan',
            'kemunculanData' => 'required|not_in:Pilih Periode',
            'tipeData' => 'required|not_in:Pilih Tipe Data',
            'levelGeo' => 'required|not_in:Pilih Level Penyajian Data Secara Geografis',
            //'caraPengumpulanData' => 'required',
            //'namaSistem' => 'required',
            //'alamatSistem' => 'required',
            //'lembagaSurvey' => 'required',
            //'waktuSurvey' => 'required',
            'tahunTersedia' => 'required',
            //'tipeData' => 'required',
            'penanggungJawab' => 'required',
            'kontak' => 'required'
        ]);


        $data = Data::find(base64_decode($id));
        // $data = Data::where('id_data', base64_decode($id))->get();
        // return $data->pengelola->id_pengelola_data;

        $pengelola = Pengelola::find($data->id_pengelola_data);
        $pengumpulan = Pengumpulan::find($data->id_cara_pengumpulan_data);
        $sumber = Sumber::find($data->id_sumber_data);
        $wali = Wali::find($data->id_wali_data);

        // return $request;

        $data->judul_data = $request->input('judulData');
        $data->jenis_data = $request->input('jenisData');
        $data->data_dasar = $request->input('dataDasar');
        $data->deskripsi_data = $request->input('deskripsiData');
        $data->sektor_data = $request->input('sektorData');
        $data->periode_kemunculan_data = $request->input('kemunculanData');
        $data->tahun_mulai_tersedia = $request->input('tahunTersedia');
        $data->tipe_data = $request->input('tipeData');
        $data->level_penyajian_data = $request->input('levelGeo');
        $data->penglevelan_kategori_lain = $request->input('level');
        $data->penanggung_jawab_data = $request->input('penanggungJawab');
        $data->kontak_penanggung_jawab = $request->input('kontak');

        // Mengambil data dari wali
        $id_wali_1 = $request->input('wldinas');
        $wali_1 = DB::select("select distinct nama_dinas from tbl_kedinasan where id_nama_dinas = '$id_wali_1'");
        foreach($wali_1 as $w) {
            $wali->nama_dinas = $w->nama_dinas;
        }

        $id_wali_2 = $request->input('wlbidang');
        $wali_2 = DB::select("select distinct bidang_kedinasan from tbl_kedinasan where id_bidang_kedinasan = '$id_wali_2'");
        foreach($wali_2 as $w) {
            $wali->bidang_kedinasan = $w->bidang_kedinasan;
        }

        $id_wali_3 = $request->input('wlseksi');
        $wali_3 = DB::select("select distinct seksi_kedinasan from tbl_kedinasan where id_seksi_kedinasan = '$id_wali_3'");
        foreach($wali_3 as $w) {
            $wali->seksi_kedinasan = $w->seksi_kedinasan;
        }

        // Mengambil data dari pengelola

        $id_pengelola = $request->input('pldinas');
        $pengelolanya = DB::select("select distinct nama_dinas from tbl_kedinasan where id_nama_dinas = '$id_pengelola'");
        foreach($pengelolanya as $p) {
            $pengelola->nama_dinas = $p->nama_dinas;
        }

        $id_pengelola = $request->input('plbidang');
        $pengelolanya = DB::select("select distinct bidang_kedinasan from tbl_kedinasan where id_bidang_kedinasan = '$id_pengelola'");
        foreach($pengelolanya as $p) {
            $pengelola->bidang_kedinasan = $p->bidang_kedinasan;
        }

        $id_pengelola = $request->input('plseksi');
        $pengelolanya = DB::select("select distinct seksi_kedinasan from tbl_kedinasan where id_seksi_kedinasan = '$id_pengelola'");
        foreach($pengelolanya as $p) {
            $pengelola->seksi_kedinasan = $p->seksi_kedinasan;
        }

        $id_sumber = $request->input('sbdinas');
        $sumbernya = DB::select("select distinct nama_dinas from tbl_kedinasan where id_nama_dinas = '$id_sumber'");
        foreach($sumbernya as $s) {
            $sumber->nama_dinas = $s->nama_dinas;
        }

        $id_sumber = $request->input('sbbidang');
        $sumbernya = DB::select("select distinct bidang_kedinasan from tbl_kedinasan where id_bidang_kedinasan = '$id_sumber'");
        foreach($sumbernya as $s) {
            $sumber->bidang_kedinasan = $s->bidang_kedinasan;
        }

        $id_sumber = $request->input('sbseksi');
        $sumbernya = DB::select("select distinct seksi_kedinasan from tbl_kedinasan where id_seksi_kedinasan = '$id_sumber'");
        foreach($sumbernya as $s) {
            $sumber->seksi_kedinasan = $s->seksi_kedinasan;
        }

        if($request->input('caraPengumpulanData') == "sistem") {
            $pengumpulan->nama_sistem = $request->input('namaSistem');
            $pengumpulan->url_sistem = $request->input('alamatSistem');
            $pengumpulan->pemilik_sistem = $request->input('pemilikSistem');
        }

        else if($request->input('caraPengumpulanData') == "survey") {
            $pengumpulan->lembaga_survey = $request->input('lembagaSurvey');
            $pengumpulan->waktu_survey = $request->input('waktuSurvey');
        }

        $wali->save();
        $pengelola->save();
        $sumber->save();
        $pengumpulan->save();

        $data->id_wali_data = $wali->id_wali_data;
        $data->id_pengelola_data = $pengelola->id_pengelola_data;
        $data->id_sumber_data = $sumber->id_sumber_data;
        $data->id_cara_pengumpulan_data = $pengumpulan->id_cara_pengumpulan_data;

        date_default_timezone_set("Asia/Bangkok");
        $data->save();
        
        return redirect('/')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getBidang($param){
      //GET THE ACCOUNT BASED ON TYPE
      $bidang = Kedinasan::where('id_nama_dinas','=',$param)->get();
      //CREATE AN ARRAY 
      $options = array();      
      foreach ($bidang as $arrayForEach) {
                $options += array($arrayForEach->id_bidang_kedinasan => $arrayForEach->bidang_kedinasan);                
            }
      
      // echo json_encode($option);
      // die();
      return Response::json($options);

    }

    public function getSeksi($param){
      //GET THE ACCOUNT BASED ON TYPE
      $seksi = Kedinasan::where('id_bidang_kedinasan','=',$param)->get();
      //CREATE AN ARRAY 
      $options = array();      
      foreach ($seksi as $arrayForEach) {
                $options += array($arrayForEach->id_seksi_kedinasan => $arrayForEach->seksi_kedinasan);                
            }
      
      return Response::json($options);

    }

    public function getBidang2($id, $param){
      //GET THE ACCOUNT BASED ON TYPE
      $bidang = Kedinasan::where('id_nama_dinas','=',$param)->get();
      //CREATE AN ARRAY 
      $options = array();      
      foreach ($bidang as $arrayForEach) {
                $options += array($arrayForEach->id_bidang_kedinasan => $arrayForEach->bidang_kedinasan);                
            }
      
      // echo json_encode($option);
      // die();
      return Response::json($options);

    }

    public function getSeksi2($id, $param){
      //GET THE ACCOUNT BASED ON TYPE
      $seksi = Kedinasan::where('id_bidang_kedinasan','=',$param)->get();
      //CREATE AN ARRAY 
      $options = array();      
      foreach ($seksi as $arrayForEach) {
                $options += array($arrayForEach->id_seksi_kedinasan => $arrayForEach->seksi_kedinasan);                
            }
      
      return Response::json($options);

    }

}
