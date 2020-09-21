<?php

namespace AWSM\LibTextTemplate;

/**
 * Class Text_Template
 *
 * @package AWSM\Lib_Text_Template
 *
 * @since 1.0.0
 */
class TextTemplate {
	/**
	 * Open delimiter.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected $openDelimiter;

	/**
	 * Close delimiter.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected $closeDelimiter;

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

		$this->setDelimiters( '{', '}' );
	}

	/**
	 * Load text template.
	 * 
	 * @param string $content   Text template content.
	 * @param array  $variables Variables for template.
	 * 
	 * @return TextTemplate
	 * 
	 * @since 1.0.0
	 */
	public static function load( string $content, array $variables ) : TextTemplate {
		return new self( $content, $variables );
	}

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

	/**
	 * Set Delimiters.
	 * 
	 * @param string $openDelimiter Starting 
	 * @param string $closeDelimiter
	 * 
	 * @return TextTemplate
	 * 
	 * @since 1.0.0
	 */
	public function setDelimiters( string $openDelimiter = '{', string $closeDelimiter = '}' ) : TextTemplate {
		$this->openDelimiter  = $openDelimiter;
		$this->closeDelimiter = $closeDelimiter;

		return $this;
	}
}