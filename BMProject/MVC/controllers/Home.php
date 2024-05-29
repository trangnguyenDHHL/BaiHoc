<?php 
class Home extends Controller {
    // function displayIntroduction(){
    //     echo "Hello";
    // }
    // function displayUser(){
    //     echo "Welcome Mate!";
    // }

    function displayIndex(){
        $this->view("master", [
            "Page" => "home"
        ]);
    }
}
?>