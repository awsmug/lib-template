<?php

use PHPUnit\Framework\TestCase;

use AWSM\Lib_Text_Template\Text_Template;

final class TextTemplateTest extends TestCase {

	public function testContent(): void {
		$content = 'This is my content.';

		$template = new Text_Template();
		$template->set_content( $content);

		$this->assertEquals( $content, $template->get_content() );
	}

	public function testVariable(): void {
		$value = 'This is my value.';
		$template = new Text_Template();
		$template->add_variable( 'myvariable', $value );
		$value = $template->get_variable( 'myvariable' );
		$this->assertEquals( $value, $value );
	}

	public function testVariables(): void {
		$variables = array(
			'name1' => 'value1',
			'name2' => 'value2',
			'name3' => 'value3',
		);

		$template = new Text_Template();
		$template->add_variables( $variables );
		$variables_new = $template->get_variables();

		$this->assertIsArray( $variables );

		foreach ( $variables AS $name => $value ) {
			$this->assertArrayHasKey( $name, $variables_new );
			$this->assertEquals( $variables[$name], $variables_new[$name]);
		}

		$this->assertEquals( 'value1', $template->get_variable('name1' ) );
		$this->assertEquals( 'value2', $template->get_variable('name2' ) );
		$this->assertEquals( 'value3', $template->get_variable('name3' ) );
	}

	public function testRendering() {
		$content   = 'My name is {forename} {surname}.';
		$variables = array ( 'forename' => 'John', 'surname' => 'Doe' );
		$expected  = 'My name is John Doe.';

		$template = new Text_Template();
		$template->set_content( $content );
		$template->add_variables( $variables );
		$this->assertEquals( $expected, $template->render( $variables ) );
	}

	public function testReplaceDelimiter() {
		$content   = 'My name is [forename] [surname].';
		$variables = array ( 'forename' => 'John', 'surname' => 'Doe' );
		$expected  = 'My name is John Doe.';

		$template = new Text_Template( '[', ']' );
		$template->set_content( $content );
		$template->add_variables( $variables );
		$this->assertEquals( $expected, $template->render( $variables ) );
	}
}