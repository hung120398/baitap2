<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>thêm người dùng</title>
</head>
<body>
<link rel="stylesheet" href="public/css/css.css">
<div class='banner'>
        <div class="dropdown">
            <button class="dropbtn"><?php echo $_SESSION['user']['user']?></button>
            <div class="dropdown-content">
            <a href="?controller=user&action=getViewAdd">Add</a>
            <a href="?controller=Logout">logout</a>
            <a href="?controller=user&action=index">quản lý người dùng</a>
            </div>
        </div>
</div>
       
    
    <div class='login'>
        <div>
        update người dùng
        <br><br>
        </div>
        <form action="?controller=user&action=update&id=1" method="post">
            <table style ='border-style:hidden'>
                <tr>
                    <td><label for="username">name</label></td>
                    <td><input type="text" id='username' name='username' value=<?php
                    echo $data['name']?>></td>
                </tr>
                <tr>
                    
                </tr>
                <tr>
                    <td><label for="email">email</label></td>
                    <td><input type="email" id='email' name='email' value=<?php
                     echo $data['email']?>></td>
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
   
    
    
</body>
</html>