<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Data;
use App\Pengelola;
use App\Pengumpulan;
use App\Sumber;
use App\Wali;
use App\Kedinasan;
use Response;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Data::All();
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
        return view('create',['data'=>$data]);
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
            'dataDasar' => 'required',
            'deskripsiData' => 'required',
            'caraPengumpulanData' => 'required',
            'tipeData' => 'required',
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

        $id_wali = $request->input('wldinas');
        $wali->nama_dinas = Kedinasan::distinct()->select('nama_dinas')->where('id_nama_dinas', $id_wali)->get();
        
        $wali->bidang_kedinasan = $request->input('wlbidang');
        $wali->seksi_kedinasan = $request->input('wlseksi');

        $pengelola->nama_dinas = $request->input('pldinas');
        $pengelola->bidang_kedinasan = $request->input('plbidang');
        $pengelola->seksi_kedinasan = $request->input('plseksi');

        $sumber->nama_dinas = $request->input('sbdinas');
        $sumber->bidang_kedinasan = $request->input('sbbidang');
        $sumber->seksi_kedinasan = $request->input('sbseksi');

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
        // return $data;
        return view('edit', compact('data'));
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

        $data = Data::find(base64_decode($id));
        // $data = Data::where('id_data', base64_decode($id))->get();
        // return $data->pengelola->id_pengelola_data;

        $pengelola = Pengelola::find($data->id_pengelola_data);
        $pengumpulan = Pengumpulan::find($data->id_cara_pengumpulan_data);
        $sumber = Sumber::find($data->id_sumber_data);
        $wali = Wali::find($data->id_wali_data);

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
        
        $wali->nama_dinas = $request->input('wldinas');
        $wali->bidang_kedinasan = $request->input('wlbidang');
        $wali->seksi_kedinasan = $request->input('wlseksi');

        $pengelola->nama_dinas = $request->input('pldinas');
        $pengelola->bidang_kedinasan = $request->input('plbidang');
        $pengelola->seksi_kedinasan = $request->input('plseksi');

        $sumber->nama_dinas = $request->input('sbdinas');
        $sumber->bidang_kedinasan = $request->input('sbbidang');
        $sumber->seksi_kedinasan = $request->input('sbseksi');

        if($request->input('caraPengumpulanData') == "sistem") {
            $pengumpulan->nama_sistem = $request->input('namaSistem');
            $pengumpulan->url_sistem = $request->input('alamatSistem');
            $pengumpulan->pemilik_sistem = $request->input('pemilikSistem');
            $pengumpulan->lembaga_survey = "";
            $pengumpulan->waktu_survey = "";
        }

        else if($request->input('caraPengumpulanData') == "survey") {
            $pengumpulan->nama_sistem = null;
            $pengumpulan->url_sistem = null;
            $pengumpulan->pemilik_sistem = "";
            $pengumpulan->lembaga_survey = $request->input('lembagaSurvey');
            $pengumpulan->waktu_survey = $request->input('waktuSurvey');
        }

        $wali->save();
        $pengelola->save();
        $sumber->save();
        $pengumpulan->save();

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

}
