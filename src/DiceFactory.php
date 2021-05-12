<?php

namespace Engine\Dice;

class DiceFactory
{
	public static function getDPercent() : Dice
	{
		return static::getDice(100);
	}
	public static function getFlatModifier($modifier)
	{
		return static::getDice(1)
		->setAmount($modifier);
	}
	private static function getDice($base) : Dice
	{
		return Dice::create()
		->setBase($base)
		->setAmount(1);
	}
}