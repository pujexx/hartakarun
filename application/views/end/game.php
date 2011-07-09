<script type="text/javascript">
    function simpan(){
        $(document).ready(function(){
            $("#simpan").val("process ....");
            lokasi_1 = $("#lokasi_1").val();
            lokasi_2 = $("#lokasi_2").val();
            lokasi_3 = $("#lokasi_3").val();
            keterangan = $("#keterangan").val();
            data = ({"lokasi_1":lokasi_1,"lokasi_2":lokasi_2,"lokasi_3":lokasi_3,"keterangan":keterangan,"ajax":1});
            if(keterangan==""){
                alert("keterangan harus di isi");
            }
            else{

                $.ajax({
                    type :"post",
                    url :"<?php echo site_url('admin/game/tambah'); ?>",
                    data : data,
                    success :function(msg){
                        $("#list_game").html(msg);
                        $("#lokasi_1").val("");
                        $("#lokasi_2").val("");
                        $("#lokasi_3").val("");
                        $("#keterangan").val("");
                        $("#simpan").val("Simpan");
                    }
                
                });
            }
        });
    }
    function refresh(){

        $.ajax({
            type :"post",
            url :"<?php echo site_url('admin/game/lihat'); ?>",

            success :function(msg){
                $("#list_game").html(msg);
                    
            }

        });

    }
  
</script>

<p>
    Lokasi Pertama :
    <select name="lokasi_1" id="lokasi_1">
        <?php foreach ($lokasis as $lokasi): ?>
            <option value="<?php echo $lokasi['id'] ?>"><?php echo $lokasi['nama_tempat'] ?></option>
        <?php endforeach; ?>
        </select>
        Lokasi Kedua :<select name="lokasi_2" id="lokasi_2">
        <?php foreach ($lokasis as $lokasi): ?>
                <option value="<?php echo $lokasi['id'] ?>"><?php echo $lokasi['nama_tempat'] ?></option>
        <?php endforeach; ?>
            </select>
            Lokasi Lokasi Ketiga :<select name="lokasi_3" id="lokasi_3">
        <?php foreach ($lokasis as $lokasi): ?>
                    <option value="<?php echo $lokasi['id'] ?>"><?php echo $lokasi['nama_tempat'] ?></option>
        <?php endforeach; ?>
                </select>
            </p>
            <p>
                <textarea name="keterangan" id="keterangan"></textarea> <input type="button" value="Simpan" id="simpan" onclick="simpan();"/>
            </p>
            <div id="list_game">
            <table>
                <tr>
                    <td>id game</td>
                    <td>Lokasi Pertama</td>
                    <td>Lokasi Kedua</td>
                    <td>Lokasi Ketiga</td>
                    <td>Keterngan Game</td>
                    <td>Edit</td>
             
                </tr>
    <?php foreach ($games as $game) {
    ?>
                        <tr id="game<? echo $game['id_game'] ?>">
                            <td><?php echo $game['id_game'] ?></td>
                            <td><?php
                        $lokasi_1 = $this->h_lokasi_model->get_one($game['lokasi_1']);
                        echo $lokasi_1['nama_tempat']
    ?></td>
                    <td><?php
                        $lokasi_2 = $this->h_lokasi_model->get_one($game['lokasi_2']);
                        echo $lokasi_2['nama_tempat'] ?></td>
                    <td><?php
                        $lokasi_3 = $this->h_lokasi_model->get_one($game['lokasi_3']);
                        echo $lokasi_3['nama_tempat']
    ?></td>
                    <td><?php echo $game['keterangan'] ?></td>
                    <td></td>
                  
                </tr>
    <?php } ?>
</table>
</div>