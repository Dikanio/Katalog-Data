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
</style>
@endsection

@section('panel-title')
    <span>Detail Data - <i>{{$data->judul_data}} - {{$data->pengelola->nama_dinas}} </i></span>
@endsection

@section('content')
<form id="regForm">
    <!-- Error expired page solver -->
    {{csrf_field()}}


  <!-- One "tab" for each step in the form: -->
  <div class="tab">
    <div class="form-group">
        <label for="judulData">Judul Data</label>
        <input class="form-control" placeholder="Judul Data" type="text" name="judulData" value="{{$data->judul_data}}" readonly>
    </div>
    
    <div class="form-group">
        <label for="jenisData">Jenis Data</label>
        <input class="form-control" placeholder="Jenis Data" type="text" name="judulData" value="{{$data->jenis_data}}" readonly>
    </div>

    <div class="form-group">
        <label for="sektorData">Sektor Data</label>
        <input class="form-control" placeholder="Sektor Data" type="text" name="sektorData" value="{{$data->sektor_data}}" readonly>
    </div>

    <div class="form-group">
        <label for="dataDasar">Data Dasar</label>
        <input class="form-control" placeholder="Data Dasar" type="text" name="dataDasar" value="{{$data->data_dasar}}" readonly>
    </div>

    <div class="form-group">
        <label for="dataDasar">Deskripsi Data</label>
        <textarea class="form-control" placeholder="Deskripsi Data" name="deskripsiData" readonly>{{$data->deskripsi_data}}</textarea>
    </div>
  </div>

<div class="tab panel-group">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <label>Wali Data</label>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <input placeholder="Nama Dinas / Instansi" name="waliData" class="form-control" value="{{$data->wali->nama_dinas}}" readonly>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Bidang Kedinasan" type="text" value="{{$data->wali->bidang_kedinasan}}" readonly>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Seksi Kedinasan" type="text" value="{{$data->wali->seksi_kedinasan}}" readonly>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <label>Pengelola Data</label>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <input placeholder="Nama Dinas / Instansi" name="pengelolaData" class="form-control" value="{{$data->pengelola->nama_dinas}}" readonly>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Bidang Kedinasan" type="text" value="{{$data->pengelola->bidang_kedinasan}}" readonly>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Seksi Kedinasan" type="text" value="{{$data->pengelola->seksi_kedinasan}}" readonly>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <label>Sumber Data</label>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <input placeholder="Nama Dinas / Instansi" name="sumberData" class="form-control" value="{{$data->sumber->nama_dinas}}" readonly>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Bidang Kedinasan" type="text" value="{{$data->sumber->bidang_kedinasan}}" readonly>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Seksi Kedinasan" type="text" value="{{$data->sumber->seksi_kedinasan}}" readonly>
            </div>
        </div>
    </div>
  </div>
  
  <div class="tab">
    <div class="form-group">
        <label for="caraPengumpulanData">Cara Pengumpulan Data</label>
        <br>

        @if($data->pengumpulan->nama_sistem != null)
        <label for="" class="radio-inline">
            <input type="radio" name="caraPengumpulanData" id="sistem" value="sistem" class="radio" onclick="ShowHideDiv()" checked disabled>Sistem
        </label>
        <label for="" class="radio-inline">
            <input type="radio" name="caraPengumpulanData" id="manual" value="manual" class="radio" onclick="ShowHideDiv()" disabled>Manual
        </label>
        <label for="" class="radio-inline">
            <input type="radio" name="caraPengumpulanData" id="survey" value="survey" class="radio" onclick="ShowHideDiv()" disabled>Survey
        </label>
        @elseif($data->pengumpulan->lembaga_survey != null)
        <label for="" class="radio-inline">
            <input type="radio" name="caraPengumpulanData" id="sistem" value="sistem" class="radio" onclick="ShowHideDiv()" disabled>Sistem
        </label>
        <label for="" class="radio-inline">
            <input type="radio" name="caraPengumpulanData" id="manual" value="manual" class="radio" onclick="ShowHideDiv()" disabled>Manual
        </label>
        <label for="" class="radio-inline">
            <input type="radio" name="caraPengumpulanData" id="survey" value="survey" class="radio" onclick="ShowHideDiv()"  checked disabled>Survey
        </label>
        @else
        <label for="" class="radio-inline">
            <input type="radio" name="caraPengumpulanData" id="sistem" value="sistem" class="radio" onclick="ShowHideDiv()" disabled>Sistem
        </label>
        <label for="" class="radio-inline">
            <input type="radio" name="caraPengumpulanData" id="manual" value="manual" class="radio" onclick="ShowHideDiv()" checked disabled>Manual
        </label>
        <label for="" class="radio-inline">
            <input type="radio" name="caraPengumpulanData" id="survey" value="survey" class="radio" onclick="ShowHideDiv()" disabled>Survey
        </label>
        @endif
    </div>
    

    @if($data->pengumpulan->nama_sistem != null)
    <div id="tabSistem" class="panel panel-primary">
    @else
    <div id="tabSistem" class="panel panel-primary" style="display: none">
    @endif
        <div class="panel-heading">
            <label for="">Keterangan Sumber Data</label>
        </div>

        <div class="panel-body">
            <div class="form-group">
                <label for="namaSistem">Nama Sistem</label>
                <input type="text" name="namaSistem" placeholder="Nama Sistem" class="form-control" value="{{$data->pengumpulan->nama_sistem}}" readonly>
            </div>

            <div class="form-group">
                <label for="alamatSistem">URL / Alamat Sistem</label>
                <input type="text" name="alamatSistem" placeholder="http://example.com" class="form-control" value="{{$data->pengumpulan->url_sistem}}" readonly>
            </div>

            <div class="form-group">
                <label for="pemilikSistem">Pemilik Sistem</label>
                <br>
                @if($data->pengumpulan->pemilik_sistem == 'pusat')
                <label class="radio-inline">
                    <input type="radio" name="pemilikSistem" id="pusat" value="pusat" class="radio" checked disabled>Pusat
                </label>
                <label for="" class="radio-inline">
                    <input type="radio" name="pemilikSistem" id="kota" value="kota" class="radio" disabled>Kota
                </label>
                <label for="" class="radio-inline">
                    <input type="radio" name="pemilikSistem" id="lainnya" value="lainnya" class="radio" disabled>Lainnya
                </label>                    
                    
                @elseif($data->pengumpulan->pemilik_sistem != 'kota')
                <label class="radio-inline">
                    <input type="radio" name="pemilikSistem" id="pusat" value="pusat" class="radio" disabled>Pusat
                </label>
                <label for="" class="radio-inline">
                    <input type="radio" name="pemilikSistem" id="kota" value="kota" class="radio" checked disabled>Kota
                </label>
                <label for="" class="radio-inline">
                    <input type="radio" name="pemilikSistem" id="lainnya" value="lainnya" class="radio" disabled>Lainnya
                </label>

                @else
                <label class="radio-inline">
                    <input type="radio" name="pemilikSistem" id="pusat" value="pusat" class="radio" disabled>Pusat
                </label>
                <label for="" class="radio-inline">
                    <input type="radio" name="pemilikSistem" id="kota" value="kota" class="radio" checked disabled>Kota
                </label>
                <label for="" class="radio-inline">
                    <input type="radio" name="pemilikSistem" id="lainnya" value="lainnya" class="radio" checked disabled>Lainnya
                </label>

                @endif
            </div>
        </div>
    </div>

    @if($data->pengumpulan->lembaga_survey != null)
    <div id="tabSurvey" class="panel panel-primary">
    @else
    <div id="tabSurvey" class="panel panel-primary" style="display: none">
    @endif
        <div class="panel-heading">
            <label for="">Keterangan Sumber Data</label>
        </div>

        <div class="panel-body">
            <div class="form-group">
                <label for="lembagaSurvey">Lembaga Survey</label>
                <input type="text" name="lembagaSurvey" placeholder="Lembaga Survey" class="form-control" value="{{$data->pengumpulan->lembaga_survey}}" readonly>
            </div>

            <div class="form-group">
                <label for="waktuSurvey">Waktu Survey</label>
                <input type="date" name="waktuSurvey" placeholder="31/12/2017" class="form-control" value="{{$data->pengumpulan->waktu_survey}}" readonly>
            </div>
        </div>
    </div>

    <br>
  </div>

  <div class="tab">
    <div class="form-group">
        <label for="kemunculanData">Periode Kemunculan Data</label>
        <input type="text" placeholder="Periode Kemunculan Data" value="{{$data->periode_kemunculan_data}}" class="form-control" readonly>
    </div>
    <div class="form-group">
        <label for="tahunTersedia">Tahun Mulai Tersedia</label>
        <input type="text" class="form-control" placeholder="2017" name="tahunTersedia" value="{{$data->tahun_mulai_tersedia}}" readonly>
    </div>
  </div>


  <div class="tab">
    <h2>Distribusi / Penyajian Data</h2>
    <div class="form-group">
        <label for="tipeData">Tipe Data</label>
        <input type="text" placeholder="Tipe Data" value="{{$data->tipe_data}}" class="form-control" readonly>
    </div>

    <div class="form-group">
        <label for="levelGeo">Level Penyajian Data Secara Geografis</label>
        <input type="text" placeholder="Level Penyajian Data" value="{{$data->level_penyajian_data}}" class="form-control" readonly>
    </div>

    <div class="form-group">
        <label for="level">Penglevelan Kategori Lain</label>
        <input type="text" placeholder="Penglevelan Kategori Lain" value="{{$data->penglevelan_kategori_lain}}" class="form-control" readonly>
    </div>
  </div>

  <div class="tab">
    <div class="form-group">
        <label for="penanggungJawab">Penanggung Jawab Data</label>
        <input placeholder="Penanggung Jawab" name="penanggungJawab" class="form-control" value="{{$data->penanggung_jawab_data}}" readonly>
    </div>

    <div class="form-group">
        <label for="kontak">Kontak Penanggung Jawab</label>
        <input placeholder="Kontak Penanggung Jawab" name="kontak" class="form-control" value="{{$data->kontak_penanggung_jawab}}" readonly>
    </div>
  </div>

  <!-- Data End -->
  <div style="overflow:auto;">
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
    <span class="step"></span>
  </div>
</form>
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
        document.getElementById("nextBtn").innerHTML = "home";
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
        window.location = '/'; 
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