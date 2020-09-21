<?php

use PHPUnit\Framework\TestCase;

use AWSM\Lib_Text_Template\Text_Template;
use AWSM\LibTextTemplate\TextTemplate;

final class TextTemplateTest extends TestCase {

	public function testContent(): void {
		$content = 'Hello {name}!';

		$content = TextTemplate::load( $content, ['name' => 'John'] )->render();
		$this->assertEquals( 'Hello John!', $content );
	}
}