
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