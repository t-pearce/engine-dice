<?php

namespace Engine\Dice\Test;

class DiceTest extends \PHPUnit\Framework\TestCase
{
	/**
	 * Given a minimum and maximum
	 * When the dice is rolled
	 * It rolls between the min and max
	 * @dataProvider dataProvider
	 */
	public function testDice($amount, $base)
	{
		$dice = \Engine\Dice\Dice::create()
		->setAmount($amount)
		->setBase($base);

		for($i = 0; $i < 100; $i++)
		{
			$result = $dice->roll()
			->getResult();

			$this->assertLessThanOrEqual($amount * $base, $result);
			$this->assertGreaterThanOrEqual($amount, $result);
		}

		$this->assertEquals($dice->getMaximum(), $amount * $base);
		$this->assertEquals($dice->getMinimum(), $amount);
	}

	public function dataProvider()
	{
		$amount = [1, 2, 3, 4];
		$base   = [4, 6, 8, 10, 12, 20, 100];

		return \Engine\Util\Arrays::cartesianProduct($amount, $base);
	}
}