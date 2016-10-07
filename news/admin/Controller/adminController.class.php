<?php
class adminController{
    function test(){
        echo 'Hello';
    }
    
    public function login(){
        if($_POST){
            
        }else{
        VIEW::display('admin/login.html');
        }
    }
}