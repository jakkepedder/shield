<?php

namespace Sparks\Shield\Entities;

use CodeIgniter\Entity;
use Sparks\Shield\Authentication\Traits\Authenticatable;
use Sparks\Shield\Authentication\Traits\HasAccessTokens;

class User extends Entity implements \Sparks\Shield\Interfaces\Authenticatable
{
	use Authenticatable;
	use HasAccessTokens;

	protected $casts = [
		'active'           => 'boolean',
		'force_pass_reset' => 'boolean',
	];

	/**
	 * Setter for passwords that automatically hashes them.
	 *
	 * @param string $password
	 */
	public function setPassword(string $password)
	{
		$this->password_hash = service('passwords')->hash($password);
	}
}
