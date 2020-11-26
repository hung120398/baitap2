
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>thêm người dùng</title>
    <style>
    .error {color: #FF0000;}
    </style>
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

    <div class='login'>
        <div>
            thêm người dùng <br>
        </div>
        <form action="?controller=user&action=create" method="post">
            <table>
                <tr>
                    <td>
                        <label for="username">username</label>
                    </td>
                    <td>
                    <input type="text" placeholder="username" id='username' name="username" require>
                    </td>
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
                        <label for="repassword">repassword</label>
                    </td>
                    <td>
                     <input type="password"  placeholder="repassword" id='repassword' name="repassword" require>
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
                        <input type="submit" name="submit" value="submit" class="button">
                    </td>
                </tr>
            </table>
       
       
      
        
       
        
        
        </form>
    
    </div>
</body>
</html>