<?php

use PHPUnit\Framework\TestCase;

use AWSM\LibTemplate\Template;
use AWSM\LibTemplate\TextTemplate;

final class TextTemplateTest extends TestCase {

	public function testContent(): void {
		$content = 'Hello {name}!';

		$content = TextTemplate::use( $content, ['name' => 'John'] )->render();
		$this->assertEquals( 'Hello John!', $content );
	}

	public function testDelimiter(): void {
		$content = 'Hello [name]!';

		$content = TextTemplate::use( $content, ['name' => 'John'] )->setDelimiters('[', ']')->render();
		$this->assertEquals( 'Hello John!', $content );
	}
}