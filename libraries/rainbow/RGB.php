<?php

namespace rainbow;

class RGB extends Color {

	protected $_components;

	public function __construct($components = array()) {
		$defaults = array('r' => 0.0, 'g' => 0.0, 'b' => 0.0);
		$components += $defaults;
		$this->_components = $components;
	}

	public function toRGB() {
		return $this;
	}

	public function inverted() {
		$inverted = array();

		foreach ($this->_components as $k => $v) {
			$inverted[$k] = (1.0 - $v);
		}

		return new RGB($inverted);
	}

	public function toWebSafe() {
		$websafe = array();

		foreach ($this->_components as $k => $v) {
			$websafe[$k] = floor($v / 0.2) * 0.2;
		}

		return new RGB($websafe);
	}

	public function toHex() {
		$result = array();

		foreach (array('r', 'g', 'b') as $i) {
			$result[] = str_pad(dechex(intval(255 * $this->_components[$i])), 2, '0', STR_PAD_LEFT);
		}

		return implode('', $result);
	}
}
