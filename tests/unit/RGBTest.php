<?php

use \rainbow\RGB;

use \rainbow\swatch\aco\Writer;

class RGBTest extends \PHPUnit_Framework_TestCase {

	public function testToHex() {
		$color = new RGB(array('r' => 0.1, 'g' => 0.1, 'b' => 0.44));
		$this->assertEquals('191970', $color->toHex());
	}

	public function testToHTML() {
		$color = new RGB(array('r' => 0.1, 'g' => 0.1, 'b' => 0.44));
		$this->assertEquals('#191970', $color->toHTML());
	}

	public function testInverted() {
		$color = new RGB(array('r' => 0.1, 'g' => 0.1, 'b' => 0.44));
		$this->assertEquals('e5e58e', $color->inverted()->toHex());
	}
}
