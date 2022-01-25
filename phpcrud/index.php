<?php
    require 'users.php';
    // echo "test";
    // getUsers();
    $users=getUsers();
// echo $users;
// echo getUsers();
// if($_POST){
// echo '<pre>';
//     var_dump($users);
//      echo '<pre>';
// }
// print_r($_POST) ;
    include 'partials/header.php';
?>


    <div class="container">
        <p>
            <a class="btn btn-success" href="create.php">Create User</a> 
        </p>
    <table class="table">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>name</th>
                <th>website</th>
                <th>action</th>
            </tr>
            
        </thead>
        <tbody>
            <?php foreach ($users as $i=>$user) {
           // echo $i ;?>
            <tr>
                <td><?php  echo $i+1 ?></td>
                <td>
                <?php echo $user['name'] ?><br> <?php if (isset($user['image'])){ ?> 
                    <img src="images/<?php echo $user['image']; ?>" width="50">
                    <?php } ?></td>
                <td><a target="blank" href="https://<?php  echo $user['website'] ?>"><?php  echo $user['website'] ?></a></td>
                <td>
                    <a href="view.php?id=<?php  echo $user['id'] ?>" class="btn btn-outline-info">View</a>
                    <a href="update.php?id=<?php  echo $user['id'] ?>" class="btn btn-outline-secondary">Update</a>
                    <a href="delete.php?id=<?php  echo $user['id'] ?>" class="btn btn-outline-danger">Delete</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
        
    </table>
    </div>
<?php
    include 'partials/footer.php';
?>
