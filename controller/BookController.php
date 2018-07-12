<?php
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if(!$action) {
    if(isset($action)) {
        if($_POST) {
            $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
        }
    } else {
       $action = "show";
    }
}
$objBook = new Book();
switch ($action) {
    case 'show':
        if($_POST) {
            //search books with keyword
            $listBooks = $objBook->search($_POST['keyword']);
        } else {
            $listBooks = $objBook->all();
        }
        require('view/index.php');
        break;
    case 'add':
        require('view/add.php');
        break;
    case 'store':
        $objBook = new Book('',
                            mysqli_real_escape_string($conn, $_POST['name']),
                            mysqli_real_escape_string($conn, $_POST['author']),
                            mysqli_real_escape_string($conn, $_POST['year']));
        $result = $objBook->store();
        if($result == 1){
            $listBooks = $objBook->all();
            header("Location: /?msg=1");
        }else{
            header("Location: /?action=add&err=1");
        }
        break;
    case 'edit' :
        $objBook = $objBook->find($_GET['id']);
        require('view/edit.php');
        break;
    case 'update':
        $objBook = new Book(mysqli_real_escape_string($conn, $_POST['id']),
                            mysqli_real_escape_string($conn, $_POST['name']),
                            mysqli_real_escape_string($conn, $_POST['author']),
                            mysqli_real_escape_string($conn, $_POST['year']));
        $result = $objBook->update();
        if($result == 1){
            $listBooks = $objBook->all();
            header("Location: /?msg=2");
        }else{
            $objBook = $objBook->find($_POST['id']);
            header("Location: /?action=edit&id=".$_POST['id']."&err=2");
        }
        break;
    case 'delete' :
        $result = $objBook->delete($_GET['id']);
        if($result == 1){
            $listBooks = $objBook->all();
            header("Location: /?msg=3");
        }else{
            header("Location: /?err=3");
        }
        break;
}
