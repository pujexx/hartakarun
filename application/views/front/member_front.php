<?php
echo "Selamat datang : " . $this->session->userdata('nama');
?>
<script type="text/javascript">
    function bikinstatus(){
        $(document).ready(function(){
            status= $("#status").val();
            $("#post").val('update status');
            kirim = ({'post':status,'ajax':1});
            $.ajax({
                type:"post",
                url:"<?php echo site_url('members/dashboard/poststatus') ?>",
                data :kirim,
                success :function (msg){
                    $("#statuslist").html(msg);
                    $("#status").val("");
                    $("#post").val('post');
                }
            });
        });
    }
   
    $(document).ready(function(){
        $("html").load(function(){$.ajax({
                type:"post",
                url:"<?php echo site_url('members/dashboard/liststatus') ?>",
                data : "ajax ="+1,
                success :function (msg){
                    $("#statuslist").html(msg);
                }
            });
        });
    });
    
</script>
<br>
<textarea cols="80" rows="4" id="status"></textarea>
<br>
<style>
    .statusitem{
        width: 100%;
        border: 1px solid #cccccc;


    }
    .statusitem p{
        padding: 20px;
    }
</style>
<input type="button" value="Post" id="post" onclick="bikinstatus()" >
<div id="statuslist"  style="width: 100%">



</div>