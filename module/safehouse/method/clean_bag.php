<?php

$player = User::$last['username'];

$r = JA::clean_player($player);

if($r){
	IO::O();
}else{
	IO::E('清除失败，请联系管理员');
}