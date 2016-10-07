<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function fanwei(){
        $pro=D('Pro');
        $data=$pro->scope('remai,ziduan')->limit(2)->where('id < 40')->select();
         echo M()->getLastSql();
        dump($data);
    }
    public function index(){
        /**
         * URL_MODEL
         * 1默认模式 pathinfo 模式 1
         * http://localhost/my-site/thinkphp/index.php/Index/user/id/1.html
         * 0普通模式
         * http://localhost/my-site/thinkphp/index.php?m=Index&a=user&id=1
         * 2重写模式
         * http://localhost/my-site/thinkphp/Index/user/id/1.html
         * 3兼容模式
         * http://localhost/my-site/thinkphp/index.php?s=/Index/user/id/1.html
         */
//         echo C("URL_MODEL")."<br/>";
//         //U('模块/方法',array('id'=>1),'xxxx/html/htm/sthml',true/false,'localhost'
//  	      echo U('Index/user',array('id'=>1),'html',false,'localhost');
 //       $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
//         $arr=array(1,2,3,4,5);
        // dump($arr);
//         $name='Jession';
//         $this->name=$name;
        /*用这种写法在html页面中只能用<?php?>输出*/
//         $this->assign('sex','man')->assign('job','student');
        /*用这种写法在html中用{}输出，但是只能一个一个命名赋值*/
//         $this->assign('sex','man');
//         $this->assign('job','student');
//         $this->display('test');
//     $me['name'] = 'Donsen';
//     $me['age'] = '19';
//     $this->time=time();
//     $this->assign('user',$me);
//     $this->display('index');
    $person=array(
    1=>array("name"=>'Jack','age'=>'18'),
    2=>array("name"=>'Tom','age'=>'17'),
    3=>array("name"=>'Peter','age'=>'16'),
    4=>array("name"=>'Mary','age'=>'19'),
   );
//     $this->number=10;
//     $this->name='laoshi';
    $this->assign('person',$person);
//     $num=12;
//     $this->assign("num",$num);
    $this->display();
    }
        
        // public function user(){
        // echo 'id is:'.$_GET['id']."<br/>";
        // echo '这里是INDEX模块的user方法';
        // echo C('name');
        // trace('name',C('name'));//调试1
        // dump($_SERVER);//调试2
        // G('run');
        // $count=0;
        // for($i=0;$i<100000;$i++){
        // $count+=$i;
        // }
        // echo G("run",'end');
        // $this->display();
        // 1.实例化基础模型model
        // $user = new Model('user');
        // $user=M('pro');
        // $data=$user->select();
        // dump($data);
        // 2.实例化用户自定义模型
        // $user = new UserModel();
        // $user = D('user');
        // echo $user->getinfo();
        // $data = $user->select();
        // dump($data);
        // 3.实例化公共模型
        // $user=new CommonModel();
        // $user=D('User');
        // $data=$user->strmake('aaa');
        // dump($data);
        // 4.实例化空模型
        // $model=M();
        // $data=$model->query('select * from pro');//读取
        // dump($data);
        // $model->execute($sql);//写入 update insert
        // }
    public function user()
    {
        // 数据库CURD操作
        // add 创建创建多条数据
//         $data = array(
//             0 => array(
//                 'name' => 'jession',
//                 'proid' => 7,
//                 'amount' => 1,
//                 'boughttime' => date('Y-m-d')
//             ),
//             1 => array(
//                 'name' => 'jession',
//                 'proid' => 14,
//                 'amount' => 1,
//                 'boughttime' => date('Y-m-d')
//             ),
//             2 => array(
//                 'name' => 'jession',
//                 'proid' => 18,
//                 'amount' => 1,
//                 'boughttime' => date('Y-m-d')
//             ),
//         );
   //     echo M('pro_sold')->add($data);//添加一条
       // echo M('pro_sold')->addAll($data);//多条同时添加且只能用于mysql数据库中
//         echo M()->getLastSql();
        // select查询
        //1.直接使用字符串进行查找
   //     $data=M('pro_sold')->where('id=23')->select();
        //2.使用数组方式进行查询
//         $where['id']=17;
//         $where['boughttime']='2016-09-11';
//         $where['_logic']='or';
//         $data=M('pro_sold')->where($where)->select();
//         dump($data);
//          3.表达式查询 eq neq eft gt lt elt between in like not between notin
            //$where['字段名']=array(表达式,查询条件);
//             $where['id'] = array('lt',20);
//             $where['id'] = array('between','14,19');
//             $where['name'] = array('like','%花');
//             $where['name'] = array('like',array('%绿','%花'));
            //区间查询
//             $where['id']=array(array('gt',20),array('lt',40));
//                 $where['id']=array(array('gt',40),array('lt',20),'or');
        //混合用法
//         $where['id'] = array('gt',10);
//         $where['_string']='soldnumber>5';
//         $data=M('pro')->where($where)->select();
        //6.统计用法
        /**
         * count 统计数量
         * max 获取最大值  传入需要统计的字段名
         * min 获取最小值  传入需要统计的字段名
         * avg 平均值   传入需要统计的字段名
         * sum 求和  传入需要统计的字段名
         */
//         $data=M('pro')->count();
//         $data=M('pro')->max('soldnumber');
//         $data=M('pro')->min('soldnumber');
 //       $data=M('pro')->avg('soldnumber');
//        $data=M('pro')->sum('soldnumber');
//         dump($data);
        // update更新
//         $where['id']=20;
//         $data=M('pro')->where($where)->select();
//         dump($data);
//         $update['wholenumber']=40;
//         $where['id']=20;
//         $data=M('pro')->where($where)->save($update);
//         dump($data);
        // delete删除
//             $where['id']=16;
//            M('pro_sold')->where($where)->delete();
//            M('pro_sold')->delete(17);
//         dump($data);
        //连续操作
       //1.order排序 order(字符串) 多个条件的话用英文逗号隔开//         $data=M('pro')->order('wholenumber desc,id desc')->select();
//         dump($data);
        //2.field($string,false) $string 传入多个字段名用英文逗号分开 第二个参数如果选true，则结果是$string以外的字段
//        $data=M('pro')->field('id,name')->order('wholenumber desc,id desc')->select();
//        dump($data);
        //limit(start,length)
//         $data=M('pro')
//         ->field('id,name')
//         ->order('wholenumber desc,id desc')
//         ->limit(2,5)
//         ->select();
//         dump($data);
        //page页码，默认每页的条数=20
//         $data=M('pro')
//         ->field('id,name')
//         ->order('id asc')
//         ->page(3,5)
//         ->select();
//         dump($data);
        //group分组操作
//         $data=M('pro')->field('soldnumber,count(*) as total')->having('soldnumber>5')->group('soldnumber')->select();
     //多表查询 table查询 table(array('表名')=>'别名') 表明需要加前缀
    //   $data=M('pro')->table(array('pro_img'=>'img','pro'=>'pro'))->where('pro.id=img.proid')->select();
       //多表查询 join方法 join（）支持字符串和数组
//        $data=M('pro')->join('pro_img on pro_img.proid=pro.id')->select();
        //使用字符串查询
      //  $data=M('pro')->join('Right join pro_img on pro_img.proid=pro.id')->select();
        //使用数组查询
//         $data=M('pro')
//         ->join(array('pro_img on pro_img.proid=pro.id'))->select();
        //union查询 union('string array',true/false) true过滤重复数据
//         $data=M('pro')
//         ->field('name')
         //->union('select name from user')//只可查询共有字段 且字段类型相同 并且查询的字段排列顺序一致
//          ->union(array('field'=>'name','table'=>'user'),true)
//         ->select();
    //distinct过滤查询操作  只有true和false两个参数，true即过滤掉所有重复的数据
        $data = M('pro')->field('soldnumber')->distinct(true)->order('soldnumber desc')->select();
        dump($data);
        $this->display();
    }
}