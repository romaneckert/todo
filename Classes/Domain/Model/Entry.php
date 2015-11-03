<?php
namespace Eckert\Todo\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Roman Eckert <mail@romaneckert.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Entry
 */
class Entry extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * solved
	 *
	 * @var integer
	 */
	protected $solved = 0;

	/**
	 * deleted
	 *
	 * @var integer
	 */
	protected $deleted = 0;

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the solved
	 *
	 * @return integer $solved
	 */
	public function getSolved() {

		return $this->solved;
	}

	/**
	 * Sets the solved
	 *
	 * @param integer $solved
	 * @return void
	 */
	public function setSolved($solved) {
		$this->solved = $solved;
	}

	/**
	 * Returns the deleted
	 *
	 * @return integer $deleted
	 */
	public function getDeleted() {

		return $this->deleted;
	}

	/**
	 * Sets the deleted
	 *
	 * @param integer $deleted
	 * @return void
	 */
	public function setDeleted($deleted) {
		$this->deleted = $deleted;
	}


}