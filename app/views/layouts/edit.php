<?php include 'app/views/header.php'?>
<body>
<div class='banner'>
        <div class="dropdown">
            <button class="dropbtn"><?php echo $_SESSION['user']['user']?></button>
            <div class="dropdown-content">
            <a href="?c=user&a=getviewadd">Add</a>
            <a href="?c=Logout">logout</a>
            <a href="?c=user&a=index">quản lý người dùng</a>
            </div>
        </div>
</div>
    
        <?php if (isset($_SESSION['error'])): ?>
        <div class='alert-danger' style='text-align:center'>
                <li><?=$_SESSION['error']?></li>
                <?php unset($_SESSION['error'])?>
        </div>
        <?php endif?>
     
      
    <div class='login'>
        <div>
        update người dùng
        <br><br>
        </div>
        <form action="?c=user&a=update&id=<?= $data['id']?>" method="post" id='form-register'>
            <table style ='border-style:hidden'>
                <tr>
                    <td><label for="username">name</label></td>
                    <td><input type="text" id='username' name='username' value=<?php
                    echo isset($data['name'])?$data['name']:'';?>></td>
                   
                </tr>
                <tr>
                    
                </tr>
                <tr>
                    <td><label for="email">email</label></td>
                    <td><input type="email" id='email' name='email' value=<?php
                      echo isset($data['email'])?$data['email']:'';?>></td>
                </tr>
                <tr>
                   
                </tr>
                <tr>
                    <td colspan=2 style='text-align:center'>
                    <input type="submit" value='EDIT' name='edit' class='button'>
                    </td>
                </tr>
              
            </table>
        </form>
           
   </div>
   <script type="text/javascript">
$(function(){
$("#form-register").validate({
   rules:{
         username:{   
                  required:true,
                 },
      
         email:{
               required:true,
               email:true,
         }
   },
   messages:{
         username:{
                  required:"vui lòng nhập username",
                  minlength:"vui lòng tạo username nhiều hơn 3 ký tự",
                  
         },
        
         email:{
               required:"vui lòng nhập email",
               email:"vui lòng nhập đúng định dạng email"
         }
   },
   


});



})
</script>
    
</body>
<?php include 'app/views/footer.php'?>