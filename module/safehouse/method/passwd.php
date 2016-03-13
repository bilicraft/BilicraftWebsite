<?php

$player   = User::$last['username'];
$password = IO::I('password');

if(strlen($password) < 8){
	IO::E('密码必须为8位以上');
}
if(preg_match('/\s/', $password) == 1){
	IO::E('密码不能包含空格');
}
if(
	(preg_match('/[A-Z]/', $password) !== 1) || 
	(preg_match('/[a-z]/', $password) !== 1) ||
	(preg_match('/[0-9]/', $password) !== 1)
	){
	IO::E('密码必须同时包含大小写字母及数字');
}

$r = JA::change_password($player, $password);

if($r){
	IO::O();
}else{
	IO::E('修改失败，请联系管理员');
}