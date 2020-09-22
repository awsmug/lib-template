<?php

namespace AWSM\LibTemplate;

/**
 * Class TextTemplate
 *
 * @package AWSM\Lib_Text_Template
 *
 * @since 1.0.0
 */
class TextTemplate extends Template {
	/**
	 * TextTemplate constructor.
	 *
	 * @param string $content   Text template content.
	 * @param array  $variables Variables for template.
	 *
	 * @since 1.0.0
	 */
	private function __construct( string $content, array $variables ) {
		$this->content   = $content;
		$this->variables = $variables;
	}

	/**
	 * Set text template.
	 * 
	 * @param string $content   Text template content.
	 * @param array  $variables Variables for template.
	 * 
	 * @return TextTemplate
	 * 
	 * @since 1.0.0
	 */
	public static function use( string $content, array $variables ) : Template {
		return new self( $content, $variables );
	}
}