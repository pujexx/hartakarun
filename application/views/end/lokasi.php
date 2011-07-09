<style type="text/css">

    #mapa {width:100%; height:450px; border:5px solid #DEEBF2;}

    .jimi { margin:0px;}
</style>

<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAA7A7Eu8gZ_mTslgWnRR9TGRQByQgPDcFg0q0wOb9u6rRtBOFyKBQD4QgfPHRxBFGL7JviJdz_jAlHfw" type="text/javascript"></script>

<div style="width:70%;  margin:0px auto;">
    <div id="mapa"></div>
    <div class="eventtext">
        <script type="text/javascript">
            function simpan(){
                $(document).ready(function(){
                    $("#simpan").val("Processing....");
                    latitude_kirim= $("#latitude").val();
                    longitude_kirim= $("#longitude").val();
                    nama_tempat=  $("#nama_tempat").val();
                    keterangan=  $("#keterangan").val();
                    //alert(latitude_kirim+longitude_kirim+nama_tempat+keterangan);
                    datakirim = ({
                        "latitude":latitude_kirim,
                        "longitude":longitude_kirim,
                        "nama_tempat":nama_tempat,
                        "keterangan_tempat":keterangan,
                        "ajax":1
                    });
                    if(latitude_kirim==""||longitude_kirim==""||nama_tempat==""||keterangan==""){
                        alert("semua data harus di isi");
                    }
                    else{
                        $.ajax({
                            type:"post",
                            url :"<?php echo site_url('admin/lokasi/tambah') ?>",
                            data : datakirim,
                            success :function(msg){
                                $("#listlokasi").html(msg);
                                $("#latitude").val("");
                                $("#longitude").val("");
                                $("#nama_tempat").val("");
                                $("#keterangan").val("");
                                $("#simpan").val("Simpan");
                            }
                        });
                    }
                    return false;
                });
            }
        </script>
        <div>
            <table border="0">
                <tr>
                    <td>Latidude</td> <td>  <input type="text" id="latitude" style="width:300px; border:1px inset gray;"></td>
                </tr>
                <tr>
                    <td>Longitude</td><td><input type="text" id="longitude" style="width:300px; border:1px inset gray;"> </td>
                </tr>
                <tr>
                    <td>Nama Tempat</td>
                    <td>
                        <input type="text" id="nama_tempat" style="width:300px; border:1px inset gray;">
                    </td>
                </tr>
                <tr>
                    <td>
                        Keterangan
                    </td>
                    <td>
                        <textarea name="keterangan" id="keterangan"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input type="button" value="Simpan" onclick="simpan()" id="simpan">
                    </td>
                </tr>
            </table>


        </div>

    </div>
</div>
<div id="listlokasi">
    <table>
        <tr>
            <td>Latitude</td>
            <td>Longitude</td>
            <td>Nama Tempat</td>
            <td>Keteranga</td>
            <td>pertanyaan</td>
            <td>Aksi</td>
        </tr>
        <?php foreach ($lokasis as $lokasi): ?>
            <tr>
                <td><?php echo $lokasi['latitude']; ?></td>
                <td><?php echo $lokasi['longitude']; ?></td>
                <td><?php echo $lokasi['nama_tempat']; ?></td>
                <td><?php echo $lokasi['keterangan_tempat']; ?></td>
                <td></td>
                <td></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>



<script type="text/javascript">
    if (GBrowserIsCompatible())
    {
        map = new GMap2(document.getElementById("mapa"));
        map.addControl(new GLargeMapControl());
        map.addControl(new GMapTypeControl(3));
        map.setCenter( new GLatLng(-7.795868,110.352874), 16,0);

        GEvent.addListener(map,'mousemove',function(point)
        {
            document.getElementById('latspan').innerHTML = point.lat()
            document.getElementById('lngspan').innerHTML = point.lng()
            document.getElementById('latlong').innerHTML = point.lat() + ', ' + point.lng()
        });

        GEvent.addListener(map,'click',function(overlay,point)
        {
            document.getElementById('latitude').value = point.lat();
            document.getElementById('longitude').value =  point.lng();
             
        });
    }
</script>

<br />


<script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
    var pageTracker = _gat._getTracker("UA-5776689-2");
    pageTracker._initData();
    pageTracker._trackPageview();
</script>
<script type="text/javascript"><!--
    google_ad_client = "pub-2494408876184900";
    /* 468x60, created 4/20/11 Programming Bottom */
    google_ad_slot = "8492987944";
    google_ad_width = 468;
    google_ad_height = 60;
    //-->
</script>
