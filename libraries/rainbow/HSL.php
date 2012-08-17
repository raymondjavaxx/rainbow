<?php

namespace rainbow;

class HSL extends Color {

	protected $_components;

	public function __construct($components = array()) {
		$defaults = array('h' => 0.0, 's' => 0.0, 'l' => 0.0);
		$components += $defaults;
		$this->_components = $components;
	}

	public function toRGB() {
		
	}

	public function toGrayscale() {
		return new Grayscale($this->_components['l']);
	}

	public function toHSL() {
		return $this;
	}
}
