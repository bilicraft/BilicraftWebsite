<?php

$player = User::$last['name'];

$r = JA::kick_player($player);

if($r){
	IO::O();
}else{
	IO::E('踢出失败，请联系管理员');
}