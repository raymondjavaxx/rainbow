<?php

use \rainbow\Grayscale;
use \rainbow\RGB;

class GrayscaleTest extends \PHPUnit_Framework_TestCase {

	public function testGray() {
		$color = new Grayscale(0.5);
		$this->assertEquals(0.5, $color->gray());
	}

	public function testToHex() {
		$color = new Grayscale(0.0);
		$this->assertEquals('000000', $color->toHex());

		$color = new Grayscale(0.4);
		$this->assertEquals('666666', $color->toHex());

		$color = new Grayscale(0.6);
		$this->assertEquals('999999', $color->toHex());

		$color = new Grayscale(1.0);
		$this->assertEquals('ffffff', $color->toHex());
	}

	public function testToRGB() {
		$color = new Grayscale(0.5);
		$result = $color->toRGB();
		$this->assertInstanceOf('rainbow\RGB', $result);
		$this->assertEquals(0.5, $result->red());
		$this->assertEquals(0.5, $result->green());
		$this->assertEquals(0.5, $result->blue());
	}
}
