<?php
    require "users.php";
       $userID = $_GET['id'];
       $user = getUserById($userID);
    //   $uID = "";
    //   $imageFileType = "";
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
        
    include 'partials/header.php';

if ($_SERVER["REQUEST_METHOD"]==="POST"){
    $usr = $_POST ;
    updateUser($usr, $userID);
    // echo var_dump($_FILES['image']);
    // exit;
    if ($_FILES['image']["name"]){
        $fname = basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($fname,PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "") {
            echo "wrong file type" ;
            exit ;
        }
        $usr['image'] = "$userID."."$imageFileType" ;
        // $user['image'] = $fname ;
        // updateUser($_POST, $userID);
        move_uploaded_file($_FILES['image']['tmp_name'], "images/$userID.$imageFileType");
        updateUser($usr, $userID);
    } 
    header("Location: http://launchpad.webfries.net/mealz/phplrn/index.php") ;
}

  
?>
<div class="container">
    <h3 style="text-align:center;"><?php  echo $user["name"]; ?></h3>
    <?php include 'formval.php' ?>
</div>

<?php
    include 'partials/footer.php';
?>