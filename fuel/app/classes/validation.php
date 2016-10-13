<?php

class Validation extends Fuel\Core\Validation
{
	/**
	 * Maximum string size
	 *
	 * @param   string  $val
	 * @param   int     $size
	 * @return  bool
	 */
	public static function _validation_max_size($val, $size)
	{
		return static::_empty($val) || strlen($val) <= $size;
	}
}
