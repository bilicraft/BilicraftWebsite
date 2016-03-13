<?php

class config_tpl_safehouse_main{
    
    function get_config(){
        // 继承配置
        $cfg = TPL::load_config('public/common');
        return TPL::extend_config($cfg, array(
            'css' => [
                
            ],
            'less' => [
                'safehouse/less/main'
            ],
            'js'  => [
                'safehouse/js/main'
            ],
            'navi' => [
                [
                    '安全中心',
                    './?c=safehouse'
                ]
            ]
        ));
    }
}