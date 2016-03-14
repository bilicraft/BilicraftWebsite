<?php

$player = User::$last['username'];

$r = JA::kick_player_lobby($player);

if($r){
	IO::O();
}else{
	IO::E('踢出失败，请联系管理员');
}