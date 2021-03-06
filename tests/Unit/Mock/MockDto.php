<?php

namespace Tests\Unit\Mock;

use PhpDto\Dto;
use PhpDto\DtoSerialize;

class MockDto extends Dto
{
	use DtoSerialize;

	private $_name;
	private $_count;
	private $_isTrue;

	public function __construct( array $data )
	{
		$this->_name   = $data['name'];
		$this->_count  = $data['count'];
		$this->_isTrue = $data['is_true'];
	}

	/**
	 * @return string|null
	 */
	public function getName(): ?string
	{
		return $this->_name;
	}

	/**
	 * @return int
	 */
	public function getCount(): int
	{
		return $this->_count;
	}

	/**
	 * @return bool
	 */
	public function getIsTrue(): bool
	{
		return $this->_isTrue;
	}
}
