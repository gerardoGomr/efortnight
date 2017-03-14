<?php
namespace App\Infrastructure\Users;

use DB;
use PDOException;
use DateTime;
use App\Domain\Users\User;

/**
 * Class DBUsersRepository
 *
 * @author Gerardo Gómez <gerardo.gomr@gmail.com>
 */
class DBUsersRepository
{
	/**
	 * get User by ip address
	 * @param  string $ipAddress
	 * @return User|null
	 */
	public function findByIpAddress($ipAddress)
	{
		$user = DB::table('users')
			->leftJoin('fortnights', 'fortnights.user_id', '=', 'users.id')
			->where('ip_address', $ipAddress)
			->first();

		$results = count($user);

		if ($results > 0) {
			return new User($user->name, $user->money, $user->ip_address);
		}

		return null;
	}

	/**
	 * saves changes in DB
	 * 
	 * @param User $user
	 * @return bool
	 */
	public function persist(User $user)
	{
		try {
			if (is_null($user->getId())) {
				$response = DB::table('users')
					->insert([
						'name'       => $user->getName(),
						'money'      => $user->getMoney(),
						'ip_address' => $user->getIpAddress(),
						'created_at' => (new DateTime())->format('d/m/Y')
					]);
			}

			return true;

		} catch (PDOException $e) {
			return false;
		}
	}
}