<?php include 'app/views/header.php'?>
<body class='preloading'>
<div class='banner'>
        <div class="dropdown">
            <button class="dropbtn"><?php echo $_SESSION['user']['user'] ?></button>
            <div class="dropdown-content">
                <a href="?c=user&a=getviewadd">Add</a>
                <a href="?c=Logout">logout</a>
                <a href="?c=user&a=index">quản lý người dùng</a>
            </div>
        </div>

<!-- thông báo lỗi -->
<?php if (isset($_SESSION['error'])): ?>
        <div class='alert-danger' style='text-align:center'>
                <li><?=$_SESSION['error']?></li>
        </div>
<?php endif?>
<!-- hết phần thông báo lỗi -->

<!-- form đăng ký -->
<div class='login'>
        <div>thêm người dùng <br></div>
        <form action="?c=user&a=create" method='post' id="add">
            <table>
                <tr>
                    <td><label for="username">username</label></td>
                    <td> <input type="text" placeholder="username" id='username' name="username" ><br></td>
                </tr>
                <tr></tr>
                <tr>
                    <td>
                        <label for="password">password</label>
                    </td>
                    <td>
                         <input type="password" placeholder="password" id='password' name="password" require><br>
                    </td>
                </tr>
                <tr></tr>
                <tr>
                    <td>
                        <label for="re-password">repassword</label>
                    </td>
                    <td>
                     <input type="password"  placeholder="repassword" id='re_password' name="re_password" require>
                    </td>
                </tr>

                <tr></tr>
                <tr>
                    <td>
                        <label for="email">email</label>
                    </td>
                    <td>
                        <input type="email" placeholder="email" id='email' name="email" require><br>

                    </td>
                </tr>
                <tr></tr>
                <tr>
                    <td colspan=2 style='text-align:center'>
                    </form>
                    <button id="myBtn" type='submit' class='button'>
                    Thêm thông tin
                    </button>
                    </td>
                </tr>
            </table>
            </div>
                <?php
                if(isset($_SESSION['usertam']) || isset($_SESSION['emailtam'])) {
                    $username = $_SESSION['usertam'];
                    $email = $_SESSION['emailtam'];
                    echo "<script>
                    document.getElementById('username').value= '$username'
                    document.getElementById('email').value = '$email'
                    
                    </script>";
                }
                ?>
<!-- hết form đăng kýký -->
<!-- form xác nhận thông tin -->

<?php if (isset($_SESSION['about']['user'])): ?>
       
                <div class="modal" id="dialog1" role="dialog" >
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">xác nhận thông tin</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <table>
                                <tr>
                                    <td>tên người dùng</td>
                                    <td><?=$_SESSION['about']['user']['name']?></td>
                                </tr>
                                <tr>
                                    <td>password:</td>
                                    <td><?=$_SESSION['about']['user']['password']?></td>
                                </tr>
                                <tr>
                                    <td>email</td>
                                    <td><?=$_SESSION['about']['user']['email']?></td>
                                </tr>
                                </table>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="button" id ='btn' class="btn btn-primary" ><a style='color:white' href="?c=user&a=insert">lưu thông tin</a></button>
                            </div>

                        </div>
                    </div>
                </div>

            <div class="load" style='display:none'>
                        <img src="public/img/giphy.gif">
            </div>
                        <script>
                            $('#dialog1').modal('show');
                            $("#btn").click(function(){
                            $('.load').show().delay(3000).fadeOut('slow');
                        });
                        </script>

<?php endif?>
<!-- hết form xác nhận thông tin -->

<!-- form thông báo đã thêm thành viên thành công -->
 <?php if (isset($_SESSION['add'])): ?>
                <div class="modal" id="dialog2" role="dialog" >
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" style='color:black'>Thông báo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body" style='color:black'>
                            đã thêm thành công
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

                            </div>

                        </div>
                    </div>
                </div>
                                    <script>
                                        $('#dialog2').modal('show');
                                    </script>
<?php endif?>
<!-- hết form thông báo đã thêm thành viên thành công -->
</body>
<?php include 'app/views/footer.php';?>