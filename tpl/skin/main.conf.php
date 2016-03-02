<?php

class config_tpl_skin_main{
    
    function get_config(){
        // 继承配置
        $cfg = TPL::load_config('skin/common');
        return TPL::extend_config($cfg, array(
            'css' => [
                
            ],
            'less' => [
                'skin/less/main'
            ],
            'js'  => [
                'skin/js/three.min',
                'skin/js/viewer',
                'skin/js/sv2d',
                'skin/js/main'
            ],
            'navi' => [
                [
                    '衣橱',
                    './?c=skin'
                ]
            ]
        ));
    }
}