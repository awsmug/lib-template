<?php

namespace AWSM\LibTemplate;

use AWSM\LibFile\PhpFile;

/**
 * TemplateFile Class.
 * 
 * @since 1.0.0
 */
class PhpTemplateFile extends Template {
    /**
	 * TemplateFile constructor.
	 *
	 * @param string   $file Template file.
	 * @param array  $variables Variables for template.
	 *
	 * @since 1.0.0
	 */
	private function __construct( string $file, array $variables, array $php_variables = [] ) {
		$this->content = PhpFile::use( $file )->runAndBufferOutput( $php_variables );
		$this->variables = $variables;
	}

	/**
	 * Set text template.
	 * 
	 * @param PhpFile $file Php template file.
	 * @param array   $variables Variables for template.
	 * 
	 * @return PhpTemplateFile
	 * 
	 * @since 1.0.0
	 */
	public static function use( string $file, array $variables, array $php_variables = [] ) : PhpTemplateFile {
		return new self( $file, $variables, $php_variables );
	}
}