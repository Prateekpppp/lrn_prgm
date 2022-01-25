<?php
function getUsers(){
    // $users=json_decode(file_get_contents("users.json"), true);
    // echo '<pre>';
    // var_dump($users);
    // echo '<pre>';
    // exit;
    // or we can right
    return json_decode(file_get_contents("users.json"),true) ;

}
function lastId(){
    $users = getUsers();
    foreach ($users as $user){
        $lid = $user['id'];
    }
    return $lid;
}
function getUserById($id){
    $users = getUsers();
    foreach ($users as $user){
        if ($user['id'] == $id){
            return $user ;
        }
    }
}
function createUser($data, $nid){
    $users = getUsers();
    $data['id']=$nid;
    // foreach ($users as $i=>$user){
    //     // echo $i ;
    //     if ($user['id'] == $lid){
    //         // var_dump($users[$i]);
    //         // exit;
    //         // $users[$i+1]=$data;
    //         $users[$i+1]=array_merge($data);
    //     }
    // }
    $users[] = $data;
    putjson($users);
    
}
function updateUser($data, $id){
    
    $users = getUsers();
    // $usersn = [];
    foreach ($users as $i=>$user){
        // echo $i ;
        if ($user['id'] == $id){
            $users[$i] = array_merge($user, $data);
        }
    }
    
    putjson($users);
    // echo $users ;
}
function deleteUser($id){
    $users = getUsers();
    foreach ($users as $i=>$user){
        if ($user['id'] == $id){
            array_splice($users, $i, 1);
        }
    }
    putjson($users);
}
function putjson($users){
    return file_put_contents("users.json", json_encode($users, JSON_PRETTY_PRINT));
}


?>