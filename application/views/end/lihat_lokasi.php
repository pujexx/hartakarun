<table>
    <tr>
        <td>Latitude</td>
        <td>Longitude</td>
        <td>Nama Tempat</td>
        <td>Keterangan</td>
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