@extends('index')

@section('css')
<style>
    .form-title {
        text-align: center;  
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }
    
    /* Hide all steps by default: */
    .tab {
        display: none;
    }
    
    /* Make circles that indicate the steps of the form: */
    .step {
        height: 11px;
        width: 11px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;  
        border-radius: 50%;
        display: inline-block;
        opacity: 0.7;
    }
    
    .step.active {
        opacity: 1;
    }
    
    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #4CAF50;
    }

    .form-group.required .control-label:after{
        content:"*";
        color:red;
        font-size: 20px;
    }

    .tab.panel-group .control-label:after{
        content:"*";
        color:red;
        font-size: 20px;
    }

    .label-required{
        color:red;
        font-size: 11px;
        /*font-style: italic;*/
    }

    bintang{
        color:red;
        font-size: 22px;
        font-weight: bold;
    }

    .text-danger{
        color: red;
        font-style: italic;
    }
</style>
@endsection

@section('panel-title')
    <span>Create Data</span>
@endsection

@section('content')
<form id="regForm" action="{{url('/data/store')}}" method="POST">
    <!-- Error expired page solver -->
    {{csrf_field()}}

  <!-- One "tab" for each step in the form: -->
  <div class="tab">
    <div class="form-group required required">
        <label for="judulData" class="control-label">Judul Data</label>
        <input class="form-control" placeholder="Judul Data" type="text" name="judulData">
        @if ($errors->has('judulData'))

            <span class="text-danger">The 'judul data' field is required.</span>

        @endif
    </div>
    <div class="form-group required">
        <label for="jenisData" class="control-label">Jenis Data</label>
        <select class="form-control" name="jenisData">
            <option disabled selected>Pilih Jenis Data</option>
    		<option value="Data Master">Data Master</option>
    		<option value="Data Agregat">Data Agregat</option>
    		<option value="Data Transaksi">Data Transaksi</option>
    		<option value="Log Data">Log Data</option>
    		<option value="Data Laporan">Data Laporan</option>
    	</select>
        @if ($errors->has('jenisData'))

            <span class="text-danger">The 'jenis data' field is required.</span>

        @endif
    </div>

    <div class="form-group required">
        <label for="sektorData" class="control-label">Sektor Data</label>
        <select name="sektorData" id="" class="form-control">
            <option disabled selected>Pilih Sektor Data</option>
            <option>Bidang Kesehatan</option>
            <option>Bidang Pekerjaan Umum Dan Penataan Ruang</option>
            <option>Bidang Perumahan Dan Kawasan Permukiman</option>
            <option>Bidang Ketenteraman Dan Ketertiban Umum Serta Perlindungan</option>
            <option>Bidang Sosial</option>
            <option>Bidang Tenaga Kerja</option>
            <option>Bidang Pemberdayaan Perempuan Dan Pelindungan Anak</option>
            <option>Bidang Pangan</option>
            <option>Bidang Pertanahan</option>
            <option>Bidang Lingkungan Hidup</option>
            <option>Bidang Administrasi Kependudukan Dan Pencatatan Sipil</option>
            <option>Bidang Pemberdayaan Masyarakat Dan Desa</option>
            <option>Bidang Pengendalian Penduduk Dan Keluarga Berencana</option>
            <option>Bidang Perhubungan</option>
            <option>Bidang Komunikasi Dan Informatika</option>
            <option>Bidang Koperasi, Usaha Kecil, Dan Menengah</option>
            <option>Bidang Penanaman Modal</option>
            <option>Bidang Kepemudaan dan Olahraga</option>
            <option>Bidang Statistik</option>
            <option>Bidang Persandian</option>
            <option>Bidang Kebudayaan</option>
            <option>Bidang Perpustakaan</option>
            <option>Bidang Kearsipan</option>
            <option>Bidang Pariwisata</option>
            <option>Bidang Pertanian</option>
            <option>Bidang Kehutanan</option>
            <option>Bidang Perdagangan</option>
            <option>Bidang Perindustrian</option>
            <option>Bidang Transmigrasi</option>
            <option>Bidang Otonomi Daerah, Pemerintahan Umum, Administrasi Keuangan Daerah, Perangkat Daerah, Kepegawaian, Persandian</option>
       
        </select>
        @if ($errors->has('sektorData'))

            <span class="text-danger">The 'sektor data' field is required.</span>

        @endif
    </div>

    <div class="form-group required">
        <label for="dataDasar" class="control-label">Data Dasar</label>
        <input class="form-control" placeholder="Data Dasar" type="text" name="dataDasar">
        @if ($errors->has('dataDasar'))

            <span class="text-danger">The 'data dasar' field is required.</span>

        @endif
    </div>

    <div class="form-group required">
        <label for="deskripsiData" class="control-label">Deskripsi Data</label>
        <textarea class="form-control" placeholder="Deskripsi Data" name="deskripsiData"></textarea>
        @if ($errors->has('deskripsiData'))

            <span class="text-danger">The 'deskripsi data' field is required.</span>

        @endif
    </div>
  </div>

<div class="tab panel-group">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <label class="control-label">Wali Data</label>
        </div>
        <div class="panel-body">
            <div class="form-group required">
                <select name="wldinas" class="form-control" id="walDinas">
                    <option disabled selected>Pilih Dinas/Instansi</option>
                    @foreach($data as $ids)
                        <option value="{{$ids->id_nama_dinas}}"> {{$ids->nama_dinas}} </option>
                    @endforeach                    
                </select>
                @if ($errors->has('wldinas'))

                    <span class="text-danger">The 'nama dinas' field is required.</span>

                @endif
            </div>
            <div class="form-group required">
                <select name="wlbidang" class="form-control" id="walBidang">
                    <option disabled selected value="">Pilih Bidang Kedinasan</option>                    
                </select>
                @if ($errors->has('wlbidang'))

                    <span class="text-danger">The 'bidang kedinasan' field is required.</span>

                @endif
            </div>
            <div class="form-group required">
                <select name="wlseksi" class="form-control" id="walSeksi">
                    <option disabled selected value="">Pilih Seksi Kedinasan</option>
                </select>
                @if ($errors->has('wlseksi'))

                    <span class="text-danger">The 'seksi kedinasan' field is required.</span>

                @endif
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <label class="control-label">Pengelola Data</label>
        </div>
        <div class="panel-body">
            <div class="form-group required">
                <select name="pldinas" class="form-control" id="pelDinas">
                    <option disabled selected>Pilih Dinas/Instansi</option>                    
                    @foreach($data as $ids)
                        <option value="{{$ids->id_nama_dinas}}"> {{$ids->nama_dinas}} </option>
                    @endforeach                    
                </select>
                @if ($errors->has('pldinas'))

                    <span class="text-danger">The 'nama dinas' field is required.</span>

                @endif
            </div>
            <div class="form-group required">
                <select name="plbidang" class="form-control" id="pelBidang">
                    <option disabled selected value="">Pilih Bidang Kedinasan</option>                    
                </select>
                @if ($errors->has('plbidang'))

                    <span class="text-danger">The 'bidang kedinasan' field is required.</span>

                @endif
            </div>
            <div class="form-group required">
                <select name="plseksi" class="form-control" id="pelSeksi">
                    <option disabled selected value="">Pilih Seksi Kedinasan</option>
                </select>
                @if ($errors->has('plseksi'))

                    <span class="text-danger">The 'seksi kedinasan' field is required.</span>

                @endif
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <label class="control-label">Sumber Data</label>
        </div>
        <div class="panel-body">
            <div class="form-group required">
                <select name="sbdinas" class="form-control" id="subDinas">
                    <option disabled selected>Pilih Dinas/Instansi</option>
                    @foreach($data as $ids)
                        <option value="{{$ids->id_nama_dinas}}"> {{$ids->nama_dinas}} </option>
                    @endforeach                    
                </select>
                @if ($errors->has('sbdinas'))

                    <span class="text-danger">The 'nama dinas' field is required.</span>

                @endif
            </div>
            <div class="form-group required">
                <select name="sbbidang" class="form-control" id="subBidang">
                    <option disabled selected value="">Pilih Bidang Kedinasan</option>
                </select>
                @if ($errors->has('sbbidang'))

                    <span class="text-danger">The 'bidang kedinasan' field is required.</span>

                @endif
            </div>
            <div class="form-group required">
                <select name="sbseksi" class="form-control" id="subSeksi">
                    <option disabled selected value="">Pilih Seksi Kedinasan</option>            
                </select>
                @if ($errors->has('sbseksi'))

                    <span class="text-danger">The 'seksi kedinasan' field is required.</span>

                @endif
            </div>
        </div>
    </div>
  </div>
  
  <div class="tab">
    <div class="form-group required">
        <label for="caraPengumpulanData" class="control-label">Cara Pengumpulan Data</label>
        <br>
        <label for="" class="radio-inline">
            <input type="radio" name="caraPengumpulanData" id="sistem" value="sistem" class="radio" onclick="ShowHideDiv()">Sistem
        </label>
        <label for="" class="radio-inline">
            <input type="radio" name="caraPengumpulanData" id="manual" value="manual" class="radio" onclick="ShowHideDiv()" checked>Manual
        </label>
        <label for="" class="radio-inline">
            <input type="radio" name="caraPengumpulanData" id="survey" value="survey" class="radio" onclick="ShowHideDiv()">Survey
        </label>
    </div>
    
    <div id="tabSistem" class="panel panel-primary" style="display: none">
        <div class="panel-heading">
            <label for="">Keterangan Sumber Data</label>
        </div>

        <div class="panel-body">
            <div class="form-group">
                <label for="namaSistem">Nama Sistem</label>
                <input type="text" name="namaSistem" placeholder="Nama Sistem" class="form-control">
                <!-- @if ($errors->has('namaSistem'))

                    <span class="text-danger">{{ $errors->first('namaSistem') }}</span>

                @endif -->
            </div>

            <div class="form-group">
                <label for="alamatSistem">URL / Alamat Sistem</label>
                <input type="text" name="alamatSistem" placeholder="http://example.com" class="form-control">
                <!-- @if ($errors->has('alamatSistem'))

                    <span class="text-danger">{{ $errors->first('alamatSistem') }}</span>

                @endif -->
            </div>

            <div class="form-group required">
                <label for="pemilikSistem" class="control-label">Pemilik Sistem</label>
                <br>
                <label class="radio-inline">
                    <input type="radio" name="pemilikSistem" id="pusat" value="pusat" class="radio">Pusat
                </label>
                <label for="" class="radio-inline">
                    <input type="radio" name="pemilikSistem" id="kota" value="kota" class="radio">Kota
                </label>
                <label for="" class="radio-inline">
                    <input type="radio" name="pemilikSistem" id="lainnya" value="lainnya" class="radio">Lainnya
                </label>
            </div>
        </div>
    </div>

    <div id="tabSurvey" class="panel panel-primary" style="display: none">
        <div class="panel-heading">
            <label for="">Keterangan Sumber Data</label>
        </div>

        <div class="panel-body">
            <div class="form-group">
                <label for="lembagaSurvey">Lembaga Survey</label>
                <input type="text" name="lembagaSurvey" placeholder="Lembaga Survey" class="form-control">
                <!-- @if ($errors->has('lembagaSurvey'))

                    <span class="text-danger">{{ $errors->first('lembagaSurvey') }}</span>

                @endif -->
            </div>

            <div class="form-group">
                <label for="waktuSurvey">Waktu Survey</label>
                <input type="date" name="waktuSurvey" placeholder="31/12/2017" class="form-control">
                <!-- @if ($errors->has('waktuSurvey'))

                    <span class="text-danger">{{ $errors->first('waktuSurvey') }}</span>

                @endif -->
            </div>
        </div>
    </div>

    <br>
  </div>

  <div class="tab">
    <div class="form-group required">
        <label for="kemunculanData" class="control-label">Periode Kemunculan Data</label>
        <select name="kemunculanData" id="" class="form-control">
            <option disabled selected>Pilih Periode</option>
            <option>Harian</option>
            <option>Mingguan</option>
            <option>Bulanan</option>
            <option>Triwulan</option>
            <option>Semesteran</option>
            <option>Tahunan</option>
            <option>Sewaktu-waktu</option>
        </select>
        @if ($errors->has('kemunculanData'))

            <span class="text-danger">The 'periode kemunculan data' field is required.</span>

        @endif
    </div>
    <div class="form-group required">
        <label for="tahunTersedia" class="control-label">Tahun Mulai Tersedia</label>
        <input type="text" class="form-control" placeholder="YYYY" name="tahunTersedia">
        @if ($errors->has('tahunTersedia'))

            <span class="text-danger">The 'tahun mulai tersedia' field is required.</span>

        @endif
    </div>
  </div>


  <div class="tab">
    <h2>Distribusi / Penyajian Data</h2>
    <div class="form-group required">
        <label for="tipeData" class="control-label">Tipe Data</label>
        <select name="tipeData" id="" class="form-control">
            <option disabled selected>Pilih Tipe Data</option>
            <option>Data yang Dikecualikan</option>
            <option>Data yang Diperoleh Serta-merta</option>
            <option>Data yang Diperoleh Berkala</option>        
            <option>Data yang Diperoleh Sewaktu-waktu</option>
        </select>
        @if ($errors->has('tipeData'))

            <span class="text-danger">The 'tipe data' field is required.</span>

        @endif
    </div>

    <div class="form-group required">
        <label for="levelGeo" class="control-label">Level Penyajian Data Secara Geografis</label>
        <select class="form-control" name="levelGeo">
          <option disabled selected>Pilih Level Penyajian Data Secara Geografis</option>  
          <option>RT</option>
          <option>RW</option>
          <option>Kelurahan</option>
          <option>Kecamatan</option>
          <option>Kota</option>
        </select>
        @if ($errors->has('levelGeo'))

            <span class="text-danger">The 'level penyajian data secara geografis' field is required.</span>

        @endif
    </div>

    <div class="form-group">
        <label for="level">Penglevelan Kategori Lain</label>
        <input placeholder="Jika Ada" oninput="this.className = ''" name="level" class="form-control">
    </div>
  </div>

  <div class="tab">
    <div class="form-group required">
        <label for="penanggungJawab" class="control-label">Penanggung Jawab Data</label>
        <input placeholder="Penanggung Jawab" oninput="this.className = ''" name="penanggungJawab" class="form-control">
        @if ($errors->has('penanggungJawab'))

            <span class="text-danger">The 'penanggung jawab' field is required.</span>

        @endif
    </div>

    <div class="form-group required">
        <label for="kontak" class="control-label">Kontak Penanggung Jawab</label>
        <input placeholder="08xxxxxxxxxx" oninput="this.className = ''" name="kontak" class="form-control">
        @if ($errors->has('kontak'))

            <span class="text-danger">The 'kontak penanggung jawab' field is required.</span>

        @endif
    </div>
  </div>

  <!-- Data End -->
  <div style="overflow:auto;">
    <div style="float:left;">
        <span class="text-danger">Note : <bintang>*</bintang> Required</span>
    </div>
    <div style="float:right;">
      <button type="button" class="btn btn-danger" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script type="text/javascript" src='{{URL::asset("js/jquery-1.12.4.min.js")}}'></script>
<script type="text/javascript" src='{{URL::asset("js/chained-selection.js")}}'></script>

@endsection

@section('js')
<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the crurrent tab

    function ShowHideDiv() {
        var tSistem = document.getElementById("tabSistem");
        var tSurvey = document.getElementById("tabSurvey");
        if (document.getElementById("sistem").checked) {
          tSistem.style.display = "block";
          tSurvey.style.display = "none";
        } else if (document.getElementById("survey").checked) {
          tSurvey.style.display = "block";
          tSistem.style.display = "none";
        } else if (document.getElementById("manual").checked) {
          tSurvey.style.display = "none";
          tSistem.style.display = "none";
        }
        
    }

    function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n);

    }

    function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    // if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
    }

    function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
    }

    function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
    }

    

</script>       
@endsection