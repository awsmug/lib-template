<?php

namespace AWSM\Lib_Text_Template;

/**
 * Class Text_Template
 *
 * @package AWSM\Lib_Text_Template
 *
 * @since 1.0.0
 */
class Text_Template {
	/**
	 * Open delimiter.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	private $open_delimiter;

	/**
	 * Close delimiter.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	private $close_delimiter;

	/**
	 * Content to render.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	private $content;

	/**
	 * Open delimiter.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	private $variables = array();

	/**
	 * Text_Template constructor.
	 *
	 * @param string $open_delimiter  Delimiter which before the variable.
	 * @param string $close_delimiter Delimiter which after the variable.
	 *
	 * @since 1.0.0
	 */
	public function __construct( string $open_delimiter = '{', string $close_delimiter = '}' ) {
		$this->open_delimiter  = $open_delimiter;
		$this->close_delimiter = $close_delimiter;
	}

	/**
	 * Set content.
	 *
	 * @param string $content Content to render.
	 *
	 * @since 1.0.0
	 */
	public function set_content( string $content ) : void {
		$this->content = $content;
	}

	/**
	 * Set content.
	 *
	 * @return string Content to render.
	 *
	 * @since 1.0.0
	 */
	public function get_content() : string {
		return $this->content;
	}

	/**
	 * Rendered content.
	 *
	 * @return string Content which is replaced with variable content.
	 *
	 * @since 1.0.0
	 */
	public function render() {
		$replacements = [];

		foreach ( $this->variables as $name => $value ) {
			$replacements[] = $this->open_delimiter . $name . $this->close_delimiter;
		}

		return \str_replace( $replacements, $this->variables, $this->content );
	}

	/**
	 * Add variable.
	 *
	 * @param string $name Name of the variable to be replaced.
	 * @param string $value Value which replaces the variable.
	 *
	 * @since 1.0.0
	 */
	public function add_variable( $name, $value ) : void {
		$this->variables[ $name ] = $value;
	}

	/**
	 * Add multiple variables.
	 *
	 * @param array Variables to add. Expecting array( 'name' => 'value', 'name2' => 'value2' ).
	 *
	 * @since 1.0.0
	 */
	public function add_variables( array $variables ) : void {
		$this->variables = array_merge( $this->variables, $variables );
	}

	/**
	 * Get variables.
	 *
	 * @return array Variables.
	 *
	 * @since 1.0.0
	 */
	public function get_variables() : array {
		return $this->variables;
	}

	/**
	 * Get a specific variable.
	 *
	 * @return string Value of variable.
	 *
	 * @since 1.0.0
	 */
	public function get_variable( string $name ) : string {
		return $this->variables[ $name ];
	}
}