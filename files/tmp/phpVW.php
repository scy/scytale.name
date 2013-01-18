<?php

class phpVWPacket {

	private $protocol = 'a';
	private $user     = null;
	private $lat      = null;
	private $lon      = null;
	private $hash     = null;
	private $alt      = null;
	private $vel      = null;
	private $head     = null;
	private $time     = null;
	
	public function __construct($user, $lat, $lon) {
		$this->setUser($user);
		$this->setLatitude($lat);
		$this->setLongitude($lon);
	}
	
	protected function checkDegree($max, $val, $name) {
		if ( (!is_numeric($val)) || ($val <= (-1 * $max)) || ($val >= $max) )
			throw new phpVWValueException("$name out of bounds");
		return (true);
	}
	
	public function getUser() {
		return ($this->user);
	}
	
	public function setUser($user) {
		if ( (!is_int($user)) || ($user < 0) || ($user > 65535) )
			throw new phpVWValueException('user ID out of bounds');
		$this->user = new phpVWNumber(2, 0, false, $user);
		return ($this->getUser());
	}
	
	public function getLatitude() {
		return ($this->lat);
	}
	
	public function setLatitude($lat) {
		$this->checkDegree(90, $lat, 'latitude');
		$this->lat = new phpVWNumber(4, 6, true, $lat);
		return ($this->getLatitude());
	}
	
	public function getLongitude() {
		return ($this->lon);
	}
	
	public function setLongitude($lon) {
		$this->checkDegree(180, $lon, 'longitude');
		$this->lon = new phpVWNumber(4, 6, true, $lon);
		return ($this->getLongitude());
	}
	
	public function getAltitude() {
		return ($this->alt);
	}
	
	public function setAltitude($alt) {
		if ( ($alt !== null) && (!is_numeric($alt)) )
			throw new phpVWValueException('altitude not a number');
		$this->alt = new phpVWNumber(2, 0, true, $alt);
		return ($this->getAltitude());
	}
	
	public function getVelocity() {
		return ($this->vel);
	}
	
	public function setVelocity($vel) {
		if ( ($vel !== null) && (!is_numeric($vel)) )
			throw new phpVWValueException('velocity not a number');
		if ($vel < 0)
			throw new phpVWValueException('velocity cannot be negative');
		$this->vel = new phpVWNumber(2, 2, false, $vel);
		return ($this->getVelocity());
	}

}



class phpVWNumber {

	private $bytes;
	private $fpp;
	private $signed;
	private $value;

	public function __construct($bytes = 2, $fpp = 0, $signed = false, $value = 0) {
		if ( ($bytes != 2) && ($bytes != 4) )
			throw new phpVWValueException('bytes number must be 2 or 4');
		if ( (!is_int($fpp)) || ($fpp < 0) )
			throw new phpVWValueException('fixed point precision out of bounds');
		if (!is_bool($signed))
			throw new phpVWValueException('signedness must be a boolean value');
		$this->bytes = (int)$bytes;
		$this->fpp = $fpp;
		$this->signed = $signed;
		$this->setValue($value);
	}
	
	public function getBytes() {
		return ($this->bytes);
	}
	
	public function getFPP() {
		return ($this->fpp);
	}
	
	public function isInt() {
		return ($this->getFPP() == 0);
	}
	
	public function isSigned() {
		return ($this->signed);
	}
	
	public function setValue($value) {
		if (!is_numeric($value))
			throw new phpVWValueException('value must be numeric');
		if (!$this->isSigned() && $value < 0)
			throw new phpVWValueException('value must be positive');
		$this->value = $value;
		return ($this->toNumber());
	}
	
	public function getInternalValue() {
		return ($this->value);
	}
	
	public function toFloat() {
		return (round($this->getInternalValue(), $this->getFPP()));
	}
	
	public function toInt() {
		return ((int)round($this->getInternalValue(), 0));
	}
	
	public function toNumber() {
		return (($this->getFPP() == 0)?
		        ($this->toInt()):
		        ($this->toFloat()));
	}
	
	public function toFixed() {
		return ((int)($this->toNumber() * pow(10, $this->getFPP())));
	}
	
	public function toHex() {
		$h = dechex($this->toFixed());
		if (strlen($h) > ($this->getBytes() * 2))
			throw new phpVWOverflowException('value cannot be displayed in this number of bytes');
		return ($h);
	}

}



class phpVWException         extends Exception      { }
class phpVWValueException    extends phpVWException { }
class phpVWOverflowException extends phpVWException { }
