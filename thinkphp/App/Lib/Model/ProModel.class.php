<?php
class ProModel extends Model{
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
        'ziduan'=>array(
          'field'=>'name,wholenumber,id',  
        ),
    );
}