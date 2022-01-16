<?php
function getUsers(){
    // $users=json_decode(file_get_contents(filename:__DIR__.'/users.json'), assoc: true);
    // echo '<pre>';
    // var_dump($users);
    // echo '<pre>';
    // exit;
    // or we can right
    return json_decode(file_get_contents(filename:__DIR__.'/users.json'), assoc: true);
}
function getUserById($id){

}
function createUser($data){

}
function updateUser($data, $id){

}
function deleteUser($id){

}


?>