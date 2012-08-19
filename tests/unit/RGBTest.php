<?php

use \rainbow\RGB;

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

	public function testToWebSafe() {
		$color = new RGB(array('r' => 0.5, 'g' => 0.5, 'b' => 0.5));
		$this->assertEquals('666666', $color->toWebSafe()->toHex());
	}

	public function testDarken() {
		$color = new RGB(array('r' => 0.1, 'g' => 0.3, 'b' => 0.3));
		$color = $color->darken(0.5);
		$this->assertEquals(0.05, $color->red());
		$this->assertEquals(0.15, $color->green());
		$this->assertEquals(0.15, $color->blue());
	}

	public function testGetters() {
		$color = new RGB(array('r' => 0.1, 'g' => 0.2, 'b' => 0.3));
		$this->assertEquals(0.1, $color->red());
		$this->assertEquals(0.2, $color->green());
		$this->assertEquals(0.3, $color->blue());
	}
}
