<?php

namespace Eckert\Todo\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;

class EntryRepository extends Repository {
    public function initializeObject(): void {
        $this->objectManager->get(Typo3QuerySettings::class)->setRespectStoragePage(false);
    }
}
