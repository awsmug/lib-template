<?php

namespace AWSM\LibTemplate;

use AWSM\LibFile\File;

/**
 * TemplateFile Class.
 * 
 * @since 1.0.0
 */
class TemplateFile extends Template {
    /**
	 * TemplateFile constructor.
	 *
	 * @param File   $file Template file.
	 * @param array  $variables Variables for template.
	 *
	 * @since 1.0.0
	 */
	private function __construct( File $file, array $variables ) {
		$this->content   = $file->content();
		$this->variables = $variables;
	}

	/**
	 * Set text template.
	 * 
	 * @param File   $file Template file.
	 * @param array  $variables Variables for template.
	 * 
	 * @return TemplateFile
	 * 
	 * @since 1.0.0
	 */
	public static function use( File $file, array $variables ) : TemplateFile {
		return new self( $file, $variables );
	}
}