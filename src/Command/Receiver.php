<?php

namespace PhpDto\Command;

use PhpDto\Dto;
use PhpDto\Services\ClassValueObject;
use PhpDto\Services\Sticker;

class Receiver
{
	/**
	 * @param $handle
	 * @param ClassValueObject $classVO
	 */
	public function write($handle, ClassValueObject $classVO): void
	{
		$stick = new Sticker();

		$stick->head( $classVO->getNamespace() )->eol()->eol();

		if( !empty( $classVO->getModules() ) )
		{
			$stick->eol()->modules( $classVO->getModules() )->eol();
		}

		$stick->class( $classVO->getClassName(), '\\'.Dto::class );

		if( !empty( $classVO->getTraits() ) )
		{
			$stick->traits( $classVO->getTraits() )->eol();
		}

		if( !empty( $classVO->getProps() ) )
		{
			$stick->props( $classVO->getProps() )->eol();
		}

		if( !empty( $classVO->getConstructorProps() ) )
		{
			$stick->constructor( $classVO->getConstructorParam(), $classVO->getConstructorProps() )->eol()->eol();
		}

		if( !empty( $classVO->getMethods() ) )
		{
			$stick->methods( $classVO->getMethods() )->eol();
		}

		fwrite( $handle, $stick->getOutput() );

		$this->printMessage( $classVO->getNamespace().'\\'.$classVO->getClassName() );
	}

	/**
	 * @param string $namespace
	 */
	public function printMessage( string $namespace ): void
	{
		echo "$namespace generated.\n";
	}
}


