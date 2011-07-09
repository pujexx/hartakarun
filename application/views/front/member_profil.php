<script type="text/javascript">
    $(document).ready(function(){
        $("#update_gan").click(function(){
            $("#nama").html('<input name="nama" type="text" value="<?php echo $member['nama'] ?>" />');
            $("#username").html('<input name="username" type="text"  value="<?php echo $member['username'] ?>" />');
            jenis =<?php echo $member['jenis_kelamin'] ?>;
            if(jenis==1){
                $("#jenis").html('<input name="jenis_kelamin" type="radio" checked value="1" />Laki-Laki</br><input name="jenis_kelamin" type="radio" value="0" />Perempuan');
            }
            else {
                $("#jenis").html('<input name="jenis_kelamin" type="radio" value="1" />Laki-Laki</br><input name="jenis_kelamin" type="radio" value="0" checked/>Perempuan');
            }
            // $("#jenis").html('<input name="jenis_kelamin" value="<?php echo $member['jenis_kelamin'] ?>" />');
            $("#alamat").html('<textarea name="alamat" ><?php echo $member['alamat'] ?> </textarea>');
            $("#submit_profil").html('<input type="submit" value="Ubah profil" id="ubah">');
        });

        $("#ubah").submit(function(){
           input = $("input").val();
           if(input==""){
               alert("tidak Boleh Kosong");
           }
        });
    });
</script>

<?php echo form_open('members/dashboard/update_profil'); ?>
<table border="0">
    <tr>
        <td>Nama</td><td id="nama"><?php echo $member['nama'] ?></td>

    </tr>
    <tr>
        <td>Username</td><td id="username"><?php echo $member['username'] ?></td>

    </tr>
    <tr>
        <td>Jenis Kelamin</td><td id="jenis"><?php
if ($member['jenis_kelamin'] == 1) {
    echo "Laki-laki";
} else {
    echo "Perempuan";
}
?></td>

    </tr>
    <tr>
        <td>Alamat</td><td id="alamat"><?php echo $member['alamat'] ?></td>
    </tr>
    <tr>
        <td></td><td id="submit_profil"><a href="#" id="update_gan" >Ubah Profil</a></td>
    </tr>
</table>
<?php echo form_close(); ?>