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
		/* How db supposed to use
		$users = db_query('SELECT * FROM users WHERE id = %d;', $uid);
		$user = $users[0];
		 */
		$user->name = 'John The Great';
		$user->bio = 'I\'m an ordinary guy. I eat, sleep and walk.';
		return $user;
	}
}

?>