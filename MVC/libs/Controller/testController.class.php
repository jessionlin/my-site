<?php
require_once 'index.php';
    class testController{
//         function show(){
//             global $view;
//            $testModel = new testModel();
//            $data = $testModel->get();
//            $testView = new testView();
//            $testView->display($data);
//               $testModel = M('test');
//               $data = $testModel->get();
//               $testView = V('test');
//               $testView->display($data);
//               $view ->assign('str','dfsfs');
//               $view ->display('test.tpl');
//         }
        function show(){//控制器的作用是调用模型,并调用视图.将模型产生的数据传递给视图.并让相关视图去显示
            global $view;
            //$testModel = new testModel();
            $testModel = M('test');
            $data = $testModel->get();
            //$testView = V('test');
            //$testView -> display($data);
            $view->assign('str', 'ssssddd');
            $view->display('test.tpl');
        }
    }