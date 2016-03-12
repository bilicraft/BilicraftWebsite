<?php

class module_debug{
	public function main(){
		
		// TPL::show('debug/main');
	}

	public function update_uni_all(){
		import('texture', false);
		$r = DB::all_one("SELECT `user_basic`.`username` FROM `skin_current` LEFT JOIN `user_basic` ON `skin_current`.`uid`=`user_basic`.`id`");
		foreach ($r as $un) {
			Texture::update_uni($un);
		}
		$r = DB::all_one("SELECT `user_basic`.`username` FROM `cape_current` LEFT JOIN `user_basic` ON `cape_current`.`uid`=`user_basic`.`id`");
		foreach ($r as $un) {
			Texture::update_uni($un);
		}
	}
}