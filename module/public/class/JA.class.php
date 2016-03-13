<?php

class JA{

	public static $con_lobby = null;
	public static $con_main  = null;

	public static function ja_main(){
		if(self::$con_main == null){
			self::$con_main = new JSONAPI(JSONAPI_MAIN_HOST, JSONAPI_MAIN_PORT, JSONAPI_MAIN_USER, JSONAPI_MAIN_PASS, JSONAPI_MAIN_SALT);
		}
		return self::$con_main;
	}

	public static function ja_lobby(){
		if(self::$con_lobby == null){
			self::$con_lobby = new JSONAPI(JSONAPI_LOBBY_HOST, JSONAPI_LOBBY_PORT, JSONAPI_LOBBY_USER, JSONAPI_LOBBY_PASS, JSONAPI_LOBBY_SALT);
		}
		return self::$con_lobby;
	}

	public static function lobby_call($method, array $args = []){
		$ja = self::ja_lobby();
		return self::handle_return($ja->call($method, $args), $method, $args);
	}

	public static function main_call($method, array $args = []){
		$ja = self::ja_main();
		return self::handle_return($ja->call($method, $args), $method, $args);
	}

	public static function handle_return($r, $method, &$args){
		if(empty($r[0]['result']) || $r[0]['result'] != 'success'){
			Log::error('jsonapi', [
				'uid'    => empty(User::$last['id']) ? '0' : User::$last['id'],
				'method' => $method,
				'args'   => $args,
				'return' => $r
			]);
			return false;
		}
		if($r[0]['success'] == null && isset($r[0]['is_success'])){
			return $r[0]['is_success'];
		}
		return $r[0]['success'];
	}

	public static function change_password($player, $newpass){
		return self::lobby_call('server.run_command', ["authme changepassword $player $newpass"]);
	}

	public static function kick_player($player){
		return self::main_call('server.run_command', ["kick $player"]);
		// return self::main_call('players.name.kick', [$player, 'You were kicked from the website.']);
	}

	public static function clean_player($player){
		return false;
	}

}