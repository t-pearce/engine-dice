<?php

namespace Engine\Dice\Interfaces;

interface Rollable
{
	public function roll() : self;
	public function getResult() : int;
	public function getRolls() : array;

	public function getMinimum() : int;
	public function getMaximum() : int;
}