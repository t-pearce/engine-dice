<?php

namespace Engine\Dice;

class Randomiser
{
	use \Engine\Traits\Singleton;

	public function integer(int $min = 0, int $max = null) : int
	{
		return mt_rand($min, $max);
	}
}