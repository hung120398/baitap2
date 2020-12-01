
<?php include 'app/views/header.php';?>
<body>
    <div class="login">
        
        <div>
            Login <br><br>
        </div>


            <form action="" method="post">
                <label for="username">username</label>
                <input  class="nut" type="text" name="username" placeholder="username" id="username" ><br><br>
                <label for="password">password</label>
                <input class="nut" type="password" name="password" placeholder="password" id="password"><br><br>
                <input type="submit" name="submit" value="submit" class="button"><br>
            </form>
        </div>
        <div  class='alert-danger' style='text-align:center'>
        <?php if(isset($_SESSION['error6'])):?>
             <li><?= $_SESSION['error6'];?></li>
              <?php endif ?>
        </div>
</body>
<?php include 'app/views/footer.php';?>
