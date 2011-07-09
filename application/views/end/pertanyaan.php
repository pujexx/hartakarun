<script type="text/javascript">
    function simpan_pertanyaan(){
        $(document).ready(function(){
            $("#simpan").val("simpaan....");
            id_lokasi = $("#id_lokasi").val();
            pertanyaan = $("#pertanyaan").val();
            jawaban_a = $("#jawaban_a").val();
            jawaban_b = $("#jawaban_b").val();
            jawaban_c = $("#jawaban_c").val();
            jawaban_d = $("#jawaban_d").val();
            kunci = $("#kunci").val();
            kirim = ({"id_lokasi":id_lokasi,"pertanyaan":pertanyaan,"jawaban_a":jawaban_a, "jawaban_b":jawaban_b,"jawaban_c":jawaban_c,"jawaban_d":jawaban_d,"kunci":kunci,"ajax":1});
            //alert(kirim);
            $.ajax({
                type:"post",
                url:"<?php echo site_url('admin/pertanyaan/tambah'); ?>",
                data :kirim,
                success: function(msg){
                   //alert(msg);
                   $("#list_pertanyaan").html(msg);
                    $("#pertanyaan").val("");
                    $("#jawaban_a").val("");
                    $("#jawaban_b").val("");
                    $("#jawaban_c").val("");
                    $("#jawaban_d").val("");
                    $("#simpan").val("Simpan");
                }
            });
        });
    }
</script>

<table border="0">
    <tr>
        <td>Pertanyaan Untuk Tempat</td>
        <td>  <select name="id_lokasi" id="id_lokasi">
                <?php foreach ($lokasis as $lokasi): ?>
                    <option value="<?php echo $lokasi['id'] ?>"><?php echo $lokasi['nama_tempat'] ?></option>
                <?php endforeach; ?>
                </select></td>
        </tr>
        <tr>
            <td>pertanyaan</td>
            <td><textarea name="pertanyaan" id="pertanyaan"></textarea></td>
        </tr>

        <tr>
            <td>jawaban a</td>
            <td><textarea name="jawaban_a" id="jawaban_a" ></textarea></td>
        </tr>
        <tr>
            <td>jawaban b</td>
            <td><textarea name="jawaban_b" id="jawaban_b" ></textarea></td>
        </tr>
        <tr>
            <td>jawaban c</td>
            <td><textarea name="jawaban_c" id="jawaban_c" ></textarea></td>
        </tr>
        <tr>
            <td>jawaban d</td>
            <td><textarea name="jawaban_d" id="jawaban_d" ></textarea></td>
        </tr>

        <tr>
            <td>kunci</td>
            <td><select name="kunci" id="kunci">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="button" value="Simpan" id="simpan" onclick="simpan_pertanyaan()"></td>
        </tr>

    </table>
    <div id="list_pertanyaan">

        <table border="1">


            <tr>

                <td>id</td>


                <td>pertanyaan</td>

                <td>jawaban_a</td>

                <td>jawaban_b</td>

                <td>jawaban_c</td>

                <td>jawaban_d</td>

                <td>kunci</td>

                <td>gambar</td>

                <td>id_lokasi</td>



            </tr>
        <?php foreach ($h_pertanyaans as $h_pertanyaan) {
 ?>

                        <tr>
                            <td><?php echo $h_pertanyaan['id']; ?></td>


                            <td><?php echo $h_pertanyaan['pertanyaan']; ?></td>

                            <td><?php echo $h_pertanyaan['jawaban_a']; ?></td>

                            <td><?php echo $h_pertanyaan['jawaban_b']; ?></td>

                            <td><?php echo $h_pertanyaan['jawaban_c']; ?></td>

                            <td><?php echo $h_pertanyaan['jawaban_d']; ?></td>

                            <td><?php echo $h_pertanyaan['kunci']; ?></td>

                            <td><?php echo $h_pertanyaan['gambar']; ?></td>

                            <td><?php echo $h_pertanyaan['id_lokasi']; ?></td>


                        </tr>

<?php } ?>
    </table>
</div>
