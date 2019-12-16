<?php

namespace Eckert\Todo\Controller;

use Eckert\Todo\Domain\Model\Entry;
use Eckert\Todo\Domain\Repository\EntryRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\Web\Request;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class EntryController extends ActionController {

    /** @var EntryRepository */
    protected $entryRepository;

    public function __construct(EntryRepository $entryRepository) {
        parent::__construct();
        $this->entryRepository = $entryRepository;
    }

    public function listAction(): void {
        $this->view->assignMultiple([
            'entries', $this->entryRepository->findAll()
        ]);
    }

    public function addAction(Entry $entry = null): void {
        try {
            $this->entryRepository->add($entry);
        } catch (\Exception $e) {

        }
    }

    public function deleteAction(): void {
        $entries = $this->entryRepository->findAll();
        foreach ($entries as $entry) {
            if ($entry->getSolved() == 1) {
                $this->entryRepository->remove($entry);
            }
        }

        $this->redirect('list');
    }

}