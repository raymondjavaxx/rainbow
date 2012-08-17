<?php

namespace rainbow;

abstract class Color {

	abstract function toRGB();

	public function toGrayscale() {
		return $this->toHSL()->toGrayscale();
	}

	public function toHex() {
		return $this->toRGB()->toHex();
	}

	public function toHTML() {
		return "#" . $this->toHex();
	}

	public function toWebSafe() {
	}
}
