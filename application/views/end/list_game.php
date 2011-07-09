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