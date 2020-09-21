<?php

namespace AWSM\LibTemplate;

/**
 * Delemiter trait.
 * 
 * @since 1.0.0
 */
trait DelimiterTrait {
	/**
	 * Open delimiter.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected $openDelimiter = '{';

	/**
	 * Close delimiter.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected $closeDelimiter = '}';

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
	public function setDelimiters( string $openDelimiter = '{', string $closeDelimiter = '}' ) : Template {
		$this->openDelimiter  = $openDelimiter;
		$this->closeDelimiter = $closeDelimiter;

		return $this;
	}
}