<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

declare(strict_types=1);

namespace pocketmine\scheduler;

use DaveRandom\CallbackValidator\CallbackType;

class ClosureTask extends Task{

	/**
	 * @var \Closure
	 * @phpstan-var \Closure(int) : void
	 */
	private $closure;

	/**
	 * @param \Closure $closure Must accept only ONE parameter, $currentTick
	 * @phpstan-param \Closure(int) : void $closure
	 */
	public function __construct(\Closure $closure){
		if(!($sigType = CallbackType::createFromCallable(function(int $currentTick) : void{}))->isSatisfiedBy($closure)){
			throw new \TypeError("Declaration of callable `" . CallbackType::createFromCallable($closure) . "` must be compatible with `" . $sigType . "`");
		}
		$this->closure = $closure;
	}

	public function getName() : string{
		$func = new \ReflectionFunction($this->closure);
		if(substr($func->getName(), -strlen('{closure}')) !== '{closure}'){
			//closure wraps a named function, can be done with reflection or fromCallable()
			//isClosure() is useless here because it just tells us if $func is reflecting a Closure object

			$scope = $func->getClosureScopeClass();
			if($scope !== null){ //class method
				return
					$scope->getName() .
					($func->getClosureThis() !== null ? "->" : "::") .
					$func->getName(); //name doesn't include class in this case
			}

			//non-class function
			return $func->getName();
		}
		$filename = $func->getFileName();

		return "closure@" . ($filename !== false ?
				\pocketmine\cleanPath($filename) . "#L" . $func->getStartLine() :
				"internal"
			);
	}

	public function onRun($currentTick){
		($this->closure)($currentTick);
	}
}