<?php

namespace Engine\Dice;

class RollableExpander
{
	private \Engine\Dice\Interfaces\Rollable $rollable;

	public function run()
	{
		if($this->rollable instanceof DiceGroup)
		{
			$rollables = di
		}
	}

	private function expandRollable(\Engine\Dice\Interfaces\Rollable $rollable) : ExpandedRollable
	{
		$results = new \Engine\Dice\Model\DiceResult();

		if($rollable instanceof Dice)
		{
			for($i = 0; $i < $dice->getAmount(); $i++)
			{
				
			}
		}
	}
	
	public function setRollable(\Engine\Dice\Interfaces\Rollable $rollable) : self
	{
		$this->rollable = $rollable;
	
		return $this;
	}
}