<?php

class UserModel extends Model {
	/**
	 * Sample static method to show how it should be used
	 * @param $uid
	 * @return object
	 */
	public static function getUserData($uid) {
		// some fancy database transaction ... trup trup trup

		if (empty($uid)) return NULL;
		
		$user = new stdClass();
		$user->name = 'John The Great';
		$user->bio = 'I\'m an ordinary guy. I eat, sleep and walk.';
		return $user;
	}
}

?>