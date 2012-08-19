<?php

namespace rainbow;

class RGB extends Color {

	protected $_components;

	public function __construct($components = array()) {
		$defaults = array('r' => 0.0, 'g' => 0.0, 'b' => 0.0);
		$this->_components = $components + $defaults;
	}

	public function toRGB() {
		return $this;
	}

	public function red() {
		return $this->_components['r'];
	}

	public function green() {
		return $this->_components['g'];
	}

	public function blue() {
		return $this->_components['b'];
	}

	public function darken($factor) {
		return new RGB(array(
			'r' => $this->_components['r'] * (1.0 - $factor),
			'g' => $this->_components['g'] * (1.0 - $factor),
			'b' => $this->_components['b'] * (1.0 - $factor)
		));
	}

	public function lighten($factor) {
		return new RGB(array(
			'r' => min(1.0, $this->_components['r'] + (1.0 * $factor)),
			'g' => min(1.0, $this->_components['g'] + (1.0 * $factor)),
			'b' => min(1.0, $this->_components['b'] + (1.0 * $factor))
		));
	}

	public function inverted() {
		return new RGB(array(
			'r' => (1.0 - $this->_components['r']),
			'g' => (1.0 - $this->_components['g']),
			'b' => (1.0 - $this->_components['b'])
		));
	}

	public function toWebSafe() {
		return new RGB(array(
			'r' => (floor($this->_components['r'] / 0.2) * 0.2),
			'g' => (floor($this->_components['g'] / 0.2) * 0.2),
			'b' => (floor($this->_components['b'] / 0.2) * 0.2)
		));
	}

	public function toHex() {
		$result = array();

		foreach (array('r', 'g', 'b') as $i) {
			$result[] = str_pad(dechex(intval(255 * $this->_components[$i])), 2, '0', STR_PAD_LEFT);
		}

		return implode('', $result);
	}
}
