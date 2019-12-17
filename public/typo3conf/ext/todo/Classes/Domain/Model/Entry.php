<?php

namespace Eckert\Todo\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Entry extends AbstractEntity {
    /**
     * @var string
     * @Validate("NotEmpty")
     */
    protected $title;

    /**
     * @var string
     * @Validate("NotEmpty")
     */
    protected $description;

    /** @var bool */
    protected $done = false;

    public function getTitle(): ?string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function isDone(): bool {
        return $this->done;
    }

    public function setDone(bool $done): void {
        $this->done = $done;
    }
}
