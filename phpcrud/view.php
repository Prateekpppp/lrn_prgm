<?php
    require "users.php";
       $userID = $_GET['id'];
       $user = getUserById($userID);
    if(!isset($_GET['id'])){
        // echo 'not found';
        include 'partials/not_found.php';
        exit;
    }
    if (!$user){
        // echo 'not found';
        include 'partials/not_found.php';
        exit;
    }
        
    
    //$userID = $_GET['id'];
   // echo $userId;
    //  echo '<pre>';
    //  print_r($user);
    //  echo '</pre>';
        
    include 'partials/header.php';
?>

<div class="container">
    <h3 style="text-align:center;"><?php  echo $user['name']; ?></h3>
<table class="table">
        <thead>
           
            
        </thead>
        <tbody>
             <tr>
                <th>id</th>
                <td><?php  echo $user['id'] ?></td>
            </tr>
            <tr>
                <th>name</th>
                <td><?php  echo $user['name'] ?></td>
               
            </tr>
            <tr>
                <th>website</th>
                <td><a target="blank" href="https://<?php  echo $user['website'] ?>"><?php  echo $user['website'] ?></a></td>
               
            </tr>
        </tbody>
        
    </table>
</div>
    
    <?php
    include 'partials/footer.php';
?>