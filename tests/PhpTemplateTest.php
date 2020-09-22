<?php

use AWSM\LibFile\File;
use AWSM\LibFile\PhpFile;
use AWSM\LibTemplate\PhpTemplateFile;
use PHPUnit\Framework\TestCase;

use AWSM\LibTemplate\Template;

final class PhpTemplateTest extends TestCase {

	public function testVariable(): void {
        $file = dirname(__FILE__) . '/assets/php-template.php';
		$content = PhpTemplateFile::use( $file, ['name' => 'John'] )->render();
		$this->assertEquals( 'Hello John!', $content );
	}

	public function testPhpVariable(): void {
        $file = dirname(__FILE__) . '/assets/php-variables.php';
		$content = PhpTemplateFile::use( $file, ['name' => 'John'], ['salutation' => 'Mr'] )->render();
		$this->assertEquals( 'Hello Mr John!', $content );
	}
}