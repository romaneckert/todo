<?php

namespace Eckert\Todo\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Entry extends AbstractEntity {

    /** @var string */
    protected $title = '';

    /** @var boolean */
    protected $solved = 0;

    /** @var boolean */
    protected $deleted = 0;

    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function isSolved(): bool {
        return $this->solved;
    }

    public function setSolved(bool $solved): void {
        $this->solved = $solved;
    }

    public function getDeleted(): bool {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): void {
        $this->deleted = $deleted;
    }


}