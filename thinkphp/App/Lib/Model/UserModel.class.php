<?php
class UserModel extends CommonModel{
    public function getinfo(){
        return 'hello world';
    }
    
    protected $_scope=array(
        /**
         * '
         * 命名范围的表示名'=>array(
         *      '属性'=>'值',
         *  支持的方法有:where limit field order table page having group distinct
         * );
         */
        'remai'=>array(
            'where'=>array(
                'soldnumber'=>array('egt',5),
            ),
            'order'=>'soldnumber desc',
        ),
//         'renshu'=>array(
//                     'where'=>array(
//                             'id'=>array('egt',1),
//                         ),
//                     'order'=>'id desc',
//                 ),
    );
}