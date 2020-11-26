<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quản lý người dùng</title>
    <link rel="stylesheet" href="public/css/css.css">
</head>
<body>
<div class='banner'>
        <div class="dropdown">
            <button class="dropbtn"><?php echo $_SESSION['user']['user']?></button>
            <div class="dropdown-content">
            <a href="?controller=user&action=getViewAdd">Add</a>
            <a href="?controller=Logout">logout</a>
            <a href="?controller=user&action=index">quản lý người dùng</a>
        </div>
</div>
         
         <table>
            <tr>
              <th>id</th>
              <th>username</th>
              <th>email</th>
              <th>Action</th>
            </tr>
         
            <?php 
                foreach($data as $value=>$key){
                $data1 = [];
                array_push($data1,$key);
                echo '<tr>';
                echo '<td>'.$key[0].'</td>';
                echo '<td>'.$key[1].'</td>';
                echo '<td>'.$key[2].'</td>';
                echo "<td><button><a href='?controller=user&action=getViewEdit&id=".$key[0]."'>EDIT  </a></button>
                          <button><a href='?controller=user&action=delete&id=".$key[0]."'>DELETE</a></button>";
                echo '</tr>';
                }
            ?>
          </table>
</body>
</html>       
  