<?php

namespace Engine\Dice\Test\Model;

class DiceResultTest extends \Phpunit\Framework\TestCase
{
	public function testAdd()
	{
		$expected = \Engine\Dice\Model\DiceResult::create()
		->addResult(2, 1)
		->addResult(3, 2)
		->addResult(4, 3)
		->addResult(5, 4)
		->addResult(6, 5)
		->addResult(7, 6)
		->addResult(8, 5)
		->addResult(9, 4)
		->addResult(10, 3)
		->addResult(11, 2)
		->addResult(12, 1);

		$a_result = \Engine\Dice\Model\DiceResult::create()
		->addResult(1, 1)
		->addResult(2, 1)
		->addResult(3, 1)
		->addResult(4, 1)
		->addResult(5, 1)
		->addResult(6, 1);
		$b_result = \Engine\Dice\Model\DiceResult::create()
		->addResult(1, 1)
		->addResult(2, 1)
		->addResult(3, 1)
		->addResult(4, 1)
		->addResult(5, 1)
		->addResult(6, 1);

		$this->assertEquals($expected, $a_result->add($b_result));
	}
}