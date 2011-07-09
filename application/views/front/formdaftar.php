<script type="text/javascript">
    $(document).ready(function(){
        
        $("#username").change(function(){
          //  alert($("#username").val());
            $.ajax({
            type :"POST",
            url  :"<?php echo site_url('daftar/cekusername');?>",
            data :"username :"+$("#username").val(),
            succces :function(msg){
                $("#cekusername").html(msg);
                if(msg=="ada"){
                    $("#cekusername").html('Username Sudah ada');
                }
            }
            });
        });
    });
</script>

<?php echo form_open('daftar/index'); ?>

<table border="0">



    <tr>
        <td>nama</td>
        <td><input type="text" name="nama" /><i id=""><?php echo form_error('nama'); ?></i></td>
    </tr>

    <tr>
        <td>username</td>
        <td><input type="text" name="username" id="username"/><i id="cekusername" > <?php echo form_error('username'); ?></i></td>
    </tr>

    <tr>
        <td>password</td>
        <td><input type="password" name="password"  /><i><?php echo form_error('password'); ?></i></td>
    </tr>

    <tr>
        <td>jenis_kelamin</td>
        <td><input type="radio" name="jenis_kelamin" value="1"/>Laki -Laki<input type="radio" name="jenis_kelamin"  value="0"/>Perempuan<i><?php echo form_error('jenis_kelamin'); ?></i> </td>
    </tr>

    <tr>
        <td>alamat</td>
        <td><textarea name="alamat" ></textarea><i><?php echo form_error('alamat'); ?></i></td>
    </tr>


    <tr>
        <td></td>
        <td>


            <input type="submit" name="update" value="Daftar" />


        </td>
    </tr>
</table>




</form>