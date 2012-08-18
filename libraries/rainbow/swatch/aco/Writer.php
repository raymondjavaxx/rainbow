<?php

namespace rainbow\swatch\aco;

use \rainbow\Color;

class Writer {

	protected $file;

	protected $colorCount = 0;

	public function __construct($filename) {
		$this->file = new \SplFileObject($filename, "wb");

		$this->file->fwrite(pack('n', 1)); // version - always 0
		$this->file->fwrite(pack('n', 0)); // nc: number of colors
	}

	public function addColor(Color $color) {
		$this->colorCount += 1;

		switch (get_class($color)) {
			case 'rainbow\RGB':
				// colorspace: RGB = 0
				$this->file->fwrite(pack('n', 0));
				$this->file->fwrite(pack('n', $color->red() * 65535));
				$this->file->fwrite(pack('n', $color->green() * 65535));
				$this->file->fwrite(pack('n', $color->blue() * 65535));
				$this->file->fwrite(pack('n', 0));
				break;

			case 'rainbow\Grayscale':
				// colorspace: Grayscale = 8
				$this->file->fwrite(pack('n', 8));
				$this->file->fwrite(pack('n', (($color->gray() * 256) * 39.0625));
				$this->file->fwrite(pack('n', 0));
				$this->file->fwrite(pack('n', 0));
				$this->file->fwrite(pack('n', 0));
				break;

			default:
				$this->addColor($color->toRGB());
				break;
		}
	}

	public function close() {
		$this->file->fseek(2);
		$this->file->fwrite(pack('n', $this->colorCount));
		$this->file->fflush();
	}
}
