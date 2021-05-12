<?php

namespace Engine\Dice;

use Engine\Dice\Interfaces\Rollable;

class Dice implements Rollable
{
	private int $base;
	private int $amount;

	use \Engine\Traits\Creatable;

	/** @var int[] */
	public array $results = [];
	
	public function roll() : self
	{
		$this->results = [];

		for($i = 0; $i < $this->amount; $i++)
		{
			$this->results[] = Randomiser::getInstance()->integer(1, $this->base);
		}

		return $this;
	}

	public function getMinimum(): int
	{
		return $this->amount;
	}

	public function getMaximum(): int
	{
		return $this->amount * $this->base;
	}

	public function getResult(): int
	{
		return array_sum($this->results);
	}

	public function getAmount() : int
	{
		return $this->amount;
	}
	public function setAmount(int $amount) : self
	{
		$this->amount = $amount;
	
		return $this;
	}
	public function getRolls(): array
	{
		return $this->results;
	}
	public function getBase() : int
	{
		return $this->base;
	}
	public function setBase(int $base) : self
	{
		$this->base = $base;
	
		return $this;
	}
}