// ================== for chained selection ======================

    $(document).ready(function(){

    var host = window.location.href;    

    $("#walDinas").change(function() {

            $.getJSON(host + "/getBidang/" + $("#walDinas option:selected").val(), function(data) {
             //console.log(data);            
                var temp = [];
                //CONVERT INTO ARRAY
                $.each(data, function(key, value) {
                    temp.push({v:value, k: key});
                });
                //SORT THE ARRAY
                temp.sort(function(a,b){
                   if(a.v > b.v){ return 1}
                    if(a.v < b.v){ return -1}
                      return 0;
                });
                //APPEND INTO SELECT BOX
                $('#walBidang').empty();
                $('#walBidang').append('<option disabled selected>Pilih Bidang Kedinasan</option>');
                $('#walSeksi').empty();
                $('#walSeksi').append('<option disabled selected>Pilih Seksi Kedinasan</option>');
                $.each(temp, function(key, obj) {
                    $('#walBidang').append('<option value="' + obj.k +'">' + obj.v + '</option>');
                });
            });                
            
        }); 

        $("#walBidang").change(function() {

            $.getJSON(host + "/getSeksi/" + $("#walBidang option:selected").val(), function(data) {
                //console.log(data);
                var temp = [];
                //CONVERT INTO ARRAY
                $.each(data, function(key, value) {
                    temp.push({v:value, k: key});
                });
                //SORT THE ARRAY
                temp.sort(function(a,b){
                   if(a.v > b.v){ return 1}
                    if(a.v < b.v){ return -1}
                      return 0;
                });
                //APPEND INTO SELECT BOX
                $('#walSeksi').empty();
                $('#walSeksi').append('<option disabled selected>Pilih Seksi Kedinasan</option>');
                $.each(temp, function(key, obj) {
                    $('#walSeksi').append('<option value="' + obj.k +'">' + obj.v + '</option>');           
                });            
            });
            
        });

        // ================= Pengelola Data =====================

        $("#pelDinas").change(function() {

            $.getJSON(host + "/getBidang/" + $("#pelDinas option:selected").val(), function(data) {
             //console.log(data);            
                var temp = [];
                //CONVERT INTO ARRAY
                $.each(data, function(key, value) {
                    temp.push({v:value, k: key});
                });
                //SORT THE ARRAY
                temp.sort(function(a,b){
                   if(a.v > b.v){ return 1}
                    if(a.v < b.v){ return -1}
                      return 0;
                });
                //APPEND INTO SELECT BOX
                $('#pelBidang').empty();
                $('#pelBidang').append('<option disabled selected>Pilih Bidang Kedinasan</option>');
                $('#pelSeksi').empty();
                $('#pelSeksi').append('<option disabled selected>Pilih Seksi Kedinasan</option>');
                $.each(temp, function(key, obj) {
                    $('#pelBidang').append('<option value="' + obj.k +'">' + obj.v + '</option>');
                });
            });                
            
        }); 

        $("#pelBidang").change(function() {

            $.getJSON(host + "/getSeksi/" + $("#pelBidang option:selected").val(), function(data) {
                //console.log(data);
                var temp = [];
                //CONVERT INTO ARRAY
                $.each(data, function(key, value) {
                    temp.push({v:value, k: key});
                });
                //SORT THE ARRAY
                temp.sort(function(a,b){
                   if(a.v > b.v){ return 1}
                    if(a.v < b.v){ return -1}
                      return 0;
                });
                //APPEND INTO SELECT BOX
                $('#pelSeksi').empty();
                $('#pelSeksi').append('<option disabled selected>Pilih Seksi Kedinasan</option>');
                $.each(temp, function(key, obj) {
                    $('#pelSeksi').append('<option value="' + obj.k +'">' + obj.v + '</option>');           
                });            
            });
            
        }); 

        // ================= Sumber Data =====================

        $("#subDinas").change(function() {

            $.getJSON(host + "/getBidang/" + $("#subDinas option:selected").val(), function(data) {
             //console.log(data);            
                var temp = [];
                //CONVERT INTO ARRAY
                $.each(data, function(key, value) {
                    temp.push({v:value, k: key});
                });
                //SORT THE ARRAY
                temp.sort(function(a,b){
                   if(a.v > b.v){ return 1}
                    if(a.v < b.v){ return -1}
                      return 0;
                });
                //APPEND INTO SELECT BOX
                $('#subBidang').empty();
                $('#subBidang').append('<option disabled selected>Pilih Bidang Kedinasan</option>');
                $('#subSeksi').empty();
                $('#subSeksi').append('<option disabled selected>Pilih Seksi Kedinasan</option>');
                $.each(temp, function(key, obj) {
                    $('#subBidang').append('<option value="' + obj.k +'">' + obj.v + '</option>');
                });
            });                
            
        }); 

        $("#subBidang").change(function() {

            $.getJSON(host + "/getSeksi/" + $("#subBidang option:selected").val(), function(data) {
                //console.log(data);
                var temp = [];
                //CONVERT INTO ARRAY
                $.each(data, function(key, value) {
                    temp.push({v:value, k: key});
                });
                //SORT THE ARRAY
                temp.sort(function(a,b){
                   if(a.v > b.v){ return 1}
                    if(a.v < b.v){ return -1}
                      return 0;
                });
                //APPEND INTO SELECT BOX
                $('#subSeksi').empty();
                $('#subSeksi').append('<option disabled selected>Pilih Seksi Kedinasan</option>');
                $.each(temp, function(key, obj) {
                    $('#subSeksi').append('<option value="' + obj.k +'">' + obj.v + '</option>');           
                });            
            });
            
        }); 

    });//end of document ready