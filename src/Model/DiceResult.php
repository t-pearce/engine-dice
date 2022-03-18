<?php

namespace Engine\Dice\Model;

class DiceResult extends \Engine\Model\Model
{
	private array $results = [];

	public function addResult(int $value, int $amount = 1) : self
	{
		if(!isset($this->results[$value]))
			$this->results[$value] = 0;

		$this->results[$value] += $amount;

		return $this;
	}

	public function getResult(int $value) : float
	{
		return $this->results[$value] / count($this->results);
	}

	public function getResults() : array
	{
		return $this->results;
	}

	public function add(DiceResult $toAdd) : DiceResult
	{
		$result = new DiceResult();

		foreach($this->results as $value_a => $count_a)
		{
			foreach($toAdd->getResults() as $value_b => $count_b)
			{
				$result->addResult($value_a + $value_b, $count_a * $count_b);
			}
		}

		return $result;
	}
}