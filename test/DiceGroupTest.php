<?php

namespace Engine\Dice\Test;

class DiceGroupTest extends \PHPUnit\Framework\TestCase
{
	public function testMinMax()
	{
		$dice = 
		[
			\Engine\Dice\Dice::create()
			->setAmount(\Engine\Util\Random::number(1, 5))
			->setBase(\Engine\Util\Random::number(2, 6) * 2),
			\Engine\Dice\Dice::create()
			->setAmount(\Engine\Util\Random::number(1, 5))
			->setBase(\Engine\Util\Random::number(2, 6) * 2),
			\Engine\Dice\Dice::create()
			->setAmount(\Engine\Util\Random::number(1, 5))
			->setBase(\Engine\Util\Random::number(2, 6) * 2),
		];

		$expectedMax = 0;
		$expectedMin = 0;

		foreach($dice as $die)
		{
			$expectedMax += $die->getMaximum();
			$expectedMin += $die->getMinimum();
		}

		$group = \Engine\Dice\DiceGroup::create()
		->setRollables($dice);

		$this->assertEquals($expectedMin, $group->getMinimum());
		$this->assertEquals($expectedMax, $group->getMaximum());
	}

	/**
	 * Given a minimum and maximum
	 * When the dice is rolled
	 * It rolls between the min and max
	 * @dataProvider dataProvider
	 * @dependsOn testMinMax
	 */
	public function testDice(\Engine\Dice\DiceGroup $group)
	{
		for($i = 0; $i < 100; $i++)
		{
			$result = $group->roll()
			->getResult();

			$this->assertLessThanOrEqual($group->getMaximum(), $result);
			$this->assertGreaterThanOrEqual($group->getMinimum(), $result);
		}
	}

	public function dataProvider()
	{
		$amount = [1, 2, 3, 4];
		$base   = [4, 6, 8, 10, 12, 20, 100];

		$diceCombos = \Engine\Util\Arrays::cartesianProduct($amount, $base);

		$dice = [];

		foreach($diceCombos as [$amount, $base])
		{
			$dice[] = \Engine\Dice\Dice::create()
			->setAmount($amount)
			->setBase($base);
		}

		$diceToTest = [];

		for($i = 0; $i < 100; $i++)
		{
			$group = \Engine\Dice\DiceGroup::create();
			
			for($j = 0; $j < \Engine\Util\Random::number(1, 3); $j++)
				$group->addRollable(\Engine\Util\Random::choice($dice));
			
			$diceToTest[] = [$group];
		}

		return $diceToTest;
	}
}