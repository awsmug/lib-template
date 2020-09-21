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
	 * @param File   $file Template file.
	 * @param array  $variables Variables for template.
	 *
	 * @since 1.0.0
	 */
	private function __construct( PhpFile $file, array $variables, array $php_variables = [] ) {
		$this->content   = $file->runAndBufferOutput( $php_variables );
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
	public static function init( PhpFile $file, array $variables, array $php_variables = [] ) : PhpTemplateFile {
		return new self( $file, $variables, $php_variables );
	}
}