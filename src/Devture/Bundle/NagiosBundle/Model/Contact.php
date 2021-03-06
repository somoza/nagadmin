<?php
namespace Devture\Bundle\NagiosBundle\Model;

use Devture\Component\DBAL\Model\BaseModel;
use Devture\Bundle\NagiosBundle\Model\User;

class Contact extends BaseModel {

	const ADDRESS_SLOTS_COUNT = 6;

	/**
	 * @var TimePeriod
	 */
	private $timePeriod;

	/**
	 * @var Command
	 */
	private $serviceNotificationCommand;

	/**
	 * @var User
	 */
	private $user;

	public function setTimePeriod(TimePeriod $timePeriod) {
		$this->timePeriod = $timePeriod;
	}

	public function getTimePeriod() {
		return $this->timePeriod;
	}

	public function setServiceNotificationCommand(Command $command) {
		$this->serviceNotificationCommand = $command;
	}

	public function getServiceNotificationCommand() {
		return $this->serviceNotificationCommand;
	}

	public function setUser(User $user = null) {
		$this->user = $user;
	}

	/**
	 * @return User|NULL
	 */
	public function getUser() {
		return $this->user;
	}

	public function setName($value) {
		$this->setAttribute('name', $value);
	}

	public function getName() {
		return $this->getAttribute('name');
	}

	public function setEmail($value) {
		$this->setAttribute('email', $value);
	}

	public function getEmail() {
		return $this->getAttribute('email');
	}

	public function clearAddresses() {
		$this->setAttribute('addresses', array());
	}

	public function addAddress($slot, $address) {
		$addresses = $this->getAddresses();
		$addresses[(string)$slot] = $address;
		$this->setAttribute('addresses', $addresses);
	}

	public function getAddresses() {
		return $this->getAttribute('addresses', array());
	}

	public function getAddressBySlot($slot) {
		$addresses = $this->getAddresses();
		return isset($addresses[(string)$slot]) ? $addresses[(string)$slot] : null;
	}

}