<?php

namespace AWSM\LibTemplate;

/**
 * Class TextTemplate
 *
 * @package AWSM\Lib_Text_Template
 *
 * @since 1.0.0
 */
abstract class Template {
	use DelimiterTrait;

	/**
	 * Content to render.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected $content;

	/**
	 * Variables.
	 *
	 * @var array
	 *
	 * @since 1.0.0
	 */
	protected $variables = array();

	/**
	 * Render content.
	 * 
	 * @return string Rendered content.
	 * 
	 * @since 1.0.0
	 */
	public function render() : string {
		$replacements = [];

		foreach ( $this->variables AS $key => $value ) {
			$replacements[ $key ] = $this->openDelimiter . $key . $this->closeDelimiter;
		}

		return str_replace( $replacements, $this->variables, $this->content );
	}
}