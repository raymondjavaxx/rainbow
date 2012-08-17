<?php

namespace rainbow;

class Grayscale extends Color {

	protected $_g;

	public function __construct($g = 0.0) {
		$this->_g = $g;
	}

	public function toRGB() {
		return new RGB(array(
			'r' => $this->_g,
			'g' => $this->_g,
			'b' => $this->_g,
		));
	}

	public function toGrayscale() {
		return $this;
	}
}
