<?php

namespace Engine\Dice;

use Engine\Dice\Interfaces\Rollable;

class DiceGroup implements Rollable
{
	/**
	 * @var \Engine\Dice\Interfaces\Rollable[]
	 */
	private array $rollables;

	use \Engine\Traits\Creatable;

	public function roll() : Rollable
	{
		foreach($this->rollables as $rollable)
			$rollable->roll();

		return $this;
	}

	public function getMinimum(): int
	{
		$min = 0;

		foreach($this->rollables as $rollable)
			$min += $rollable->getMinimum();

		return $min;
	}

	public function getMaximum(): int
	{
		$max = 0;

		foreach($this->rollables as $rollable)
			$max += $rollable->getMaximum();

		return $max;
	}

	public function getResult() : int
	{
		$result = 0;

		foreach($this->rollables as $rollable)
			$result += $rollable->getResult();

		return $result;
	}

	public function getRolls() : array
	{
		$rolls = [];

		foreach($this->rollables as $rollable)
			$rolls = [...$rolls, ...($rollable->getRolls())];

		return $rolls;
	}
	public function addRollable(Rollable $rollable) : self
	{
		$this->rollables[] = $rollable;

		return $this;
	}
	public function getRollables() : array
	{
		return $this->rollables;
	}
	/**
	 * @param Rollable[] $rollables
	 * 
	 * @return self
	 */
	public function setRollables(array $rollables) : self
	{
		$this->rollables = $rollables;
	
		return $this;
	}
}