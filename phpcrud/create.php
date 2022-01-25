<?php
    require "users.php";
       include 'partials/header.php';
       $lid = lastId();
       $nid = $lid+1;
    //   echo $lid ;
    //   exit;
       
?>

<?php
    $user=[
        "id"=> "",
        "name"=>"",
        "website"=>"",
        ];
    // $_POST['id'] = $lid+1;
    if ($_SERVER["REQUEST_METHOD"]==="POST"){
    $user = $_POST ;
    createUser($user, $nid);
    // echo "<pre>";
    // var_dump($usr);
    // echo "</pre>";
    // exit;
    // echo $_POST['name'];
    // exit;
    if ($_FILES['image']['name']){
        $fname = basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($fname,PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "") {
            echo "wrong file type" ;
            exit ;
        }
        $user['image'] = "$nid."."$imageFileType" ;
        // $user['image'] = $fname ;
        // updateUser($_POST, $userID);
        move_uploaded_file($_FILES['image']['tmp_name'], "images/$nid.$imageFileType");
        updateUser($user, $nid);
    }
    header("Location: http://launchpad.webfries.net/mealz/phplrn/index.php") ;
}
    include 'partials/footer.php';
?>
<div class="container">
    <h3 style="text-align:center;">Create User</h3>
    <?php include 'formval.php' ?>
</div>