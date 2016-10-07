<?php
require_once '../function.php';
class authModel{
    private  $auth = "";
    
    public  function __construct(){
        if(isset($_SESSION['auth'])&&(!empty($_SESSION['auth']))){
            $this->auth = $_SESSION['auth'];
        }
    }
    
    public function loginsubmit(){
        if(empty($_POST['username'])||empty($_POST['password'])){
            return false;
        }
        $username = addslashes($_POST['username']);
        $password = addslashes($_POST['password']);
        if($this->auth = $this->checkuser($usernaem,$password)){
            $_SESSION['auth'] = $this->auth;
            return true;
        }else{
            return false;
        }
    }
    public function getauth(){
        return $this->auth;
    }
    
    private  function checkuser($username,$password){
        $adminobj = M('admin');
        $auth = $adminobj->findOne_by_username($username);
        if((!empty($auth))||$auth['password']==$password){
            return $auth;
        }else{
            return false;
        }
    }
    
    private  function checklogin(){
        $authobj = M('auth');
        if($authobj->loginsubmit){
            $authobj->showmessage('登陆成功!','admin.php?controller=admin&method=index');
        }else{
            $authobj->showmessage('登陆失败!','admin.php?controller=admin&method=login');
        }
    }
    
    public function logout(){
        unset($_SESSION['auth']);
        $this->auth = '';
    }
    
    
}