<?php include 'app/views/header.php'?>
<!-- đưa ra form thông báo sửa thành công hay thất bạibại -->
<?php if (isset($_SESSION['edit'])): ?>
            <script>
            <?php 
            echo "var session1 = '". $_SESSION['edit'] ."';\n";
            ?>
                confirm(session1);
            </script>
            <?php
            unset($_SESSION['edit']);
            ?>
<?php endif?>
<!-- kết thúc form thông báo -->

<body class>
        <div class="load">
            <img src="public/img/giphy.gif">
        </div>

        <div class="content">
            <div class='banner'>
                <div class="dropdown">
                    <button class="dropbtn" id='session'><?php echo $_SESSION['user']['user'] ?></button>
                    <div class="dropdown-content">
                        <a href="?c=user&a=getviewadd">Add</a>
                        <a href="?c=Logout">logout</a>
                        <a href="?c=user&a=index">quản lý người dùng</a>
                    </div>
                </div>
                <table id="table2">
                 <thead>
                <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>email</th>
                    <th>Edit</th>
                    <th>delete  </th>
                </tr>
                </thead>
                </table>
            </div>
<?php if(isset($_SESSION['delete'])):?>
            <div class="modal" id="dialog2" role="dialog" >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    
                        <div class="modal-header">
                            <h5 class="modal-title">Thông báo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <?= $_SESSION['delete'];?>
                        </div>
                        <?php unset($_SESSION['delete'])?>
                        <div class="modal-footer">
                            <button type="button"  id ='btn 'class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        
                        </div>
                        
                    </div>
                </div>
</div>
            <script>
                $('#dialog2').modal('show')
            </script>
<?php endif?>                
          
            <script>
         
              
                $('.load').delay(3000).fadeOut('slow');
              
              $("#btn").click(function(){
              $('.load').show().delay(3000).fadeOut('slow');
              });
           </script>
    </body>
<script type='text/javascript'>
<?php
echo "var session = '". $_SESSION['user']['user'] ."';\n";
$js_array = json_encode($data);
echo "var javascript_array = ". $js_array . ";\n";
?>

$('#table2').DataTable({
    data:javascript_array,
    "pageLength": 7,

 "aoColumnDefs": [
   {
        "aTargets": [3],
        "mData": null,
        "mRender": function (data, type, full) {
            return  "<button class='btn btn-primary' id='btn'><a  style='color:white' href='?c=user&a=getviewedit&id="+ full[0]+"'>Edit</a></button>";
             }
    },
    {
        "aTargets": [4],
        "mData": null,
        "mRender": function (data, type, full) {
            return (full[1]!==session)?  
            " <button class='btn btn-primary button1'  data-tip="+full[1]+" data-info="+full[0]+">Delete</button>"
            :"";
             }
    }
 ],

});
$('.button1').click(function(e) {
   e.preventDefault();
   id = $(this).attr('data-info');
   username = $(this).attr('data-tip');
   $('#delete').html('bạn có muốn xóa user  '+username);
  $('#dialog3').modal('show');
  $('.button2').click(function(e){
    location.href = "?c=user&a=delete&id="+id;
  })
});
</script>
<div class="modal" id="dialog3" role="dialog" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
            <div class="modal-header">
                <h5 class="modal-title">Thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body" id='delete' style=' font-weight: bold;'>
           
            </div>
           
            <div class="modal-footer">
                <button type="button"  id ='btn 'class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button class='btn btn-primary button2' >Delete</a></button>
            </div>
            
        </div>
    </div>
</div>
    <?php include 'app/views/footer.php';?>

  