<?php
class adminController{
    public $auth='';
    
    public function __construct(){
        
        $authobj = M('auth');
        $this->auth = $authobj->qetauth();
        if(empty($this->auth)&&(PC::$method!='login')){
        $this->showmessage('请登录后再操作!','admin.php?controller=admin&method=login');
        }
    }
    function test(){
        echo 'Hello';
    }
    
    public function login(){
        if($_POST){
            
        }else{
        VIEW::display('admin/login.html');
        }
    }
    
    public function index(){
        $newsobj = M('news');
        $newsnum = $newsobj->count();
        VIEW::assign(array('newsnum'=>$newsnum));
        VIEW::display('admin/index.html');
    }
    
    public function logout(){
        $authobj = M('auth');
        $authobj->logout();
        $this->showmessage('退出成功!','admin.php?controller=admin&method=login');
    }
    
    public function newsadd(){
        if(empty($_POST)){
            if(isset($_GET['id'])){
                M('news')->getnewsinfo($_GET['id']);
            }else{
                $data = array();
            }
            VIEW::assign(array('data'=>$data));
            VIEW::display('admin/newsadd.html');
        }else{
            $result = M('news')->newssubmit($_POST);
            $this->newssubmit();
        }
    }
    
    private function newssubmit(){
        $newsobj = M('news');
        $result = $newsobj->newssubmit($_POST);
        if($result==0){
            $this->showmessage('操作失败!','admin.php?controller=admin&method=newsadd&id='.$_POST['id']);
        }
        else if($result == 1){
            $this->showmessage('操作成功!','admin.php?controller=admin&method=newslist');
        }
        else if($result == 2){
            $this->showmessage('修改成功!','admin.php?controller=admin&method=newslist');
        }
    }
    
    public function newslist(){
        $newsobj = M('news');
        $data = $newsobj->findAll_orderby_dateline();
        VIEW::assign(array('data'=>$data));
        VIEW::display('admin/newslist.html');
    }
    
    function findAll_orderby_dateline(){
        $sql = "select * from ".$this->_table.' order by dateline desc';
        return DB::findALL($sql);
    }
    
    public function newsdel(){
        if($_GET['id']){
            $newsobj = M('news');
            $newsobj->del_by_id($_GET['id']);
            $this->showmessage('删除新闻成功!','admin.php?controller=admin&method=newslist');
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
    
    function del_by_id($id){
        return DB::del($this->_table,'id='+$id);
    }
}