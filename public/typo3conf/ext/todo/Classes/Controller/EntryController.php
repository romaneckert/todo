<?php

namespace Eckert\Todo\Controller;

use Eckert\Todo\Domain\Model\Entry;
use Eckert\Todo\Domain\Repository\EntryRepository;
use Eckert\Todo\Fixture\EntryFixture;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\View\JsonView;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

class EntryController extends ActionController {
    /** @var EntryFixture */
    protected $entryFixture;

    /** @var EntryRepository */
    protected $entryRepository;

    /** @var PersistenceManager */
    protected $persistenceManager;

    protected $viewFormatToObjectNameMap = ['json' => JsonView::class];

    public function __construct(EntryRepository $entryRepository, PersistenceManager $persistenceManager, EntryFixture $entryFixture) {
        parent::__construct();
        $this->entryRepository = $entryRepository;
        $this->persistenceManager = $persistenceManager;
        $this->entryFixture = $entryFixture;
    }

    public function loadFixturesAction(): void {
        $this->entryFixture->load();

        $this->forward('list');
    }

    public function addAction(Entry $entry): void {
        try {
            $this->entryRepository->add($entry);
        } catch (\Exception $e) {
        }

        $this->persistenceManager->persistAll();

        $this->forward('list');
    }

    public function doneAction(Entry $entry): void {
        $entry->setDone(!$entry->isDone());

        $this->entryRepository->update($entry);

        $this->persistenceManager->persistAll();

        $this->forward('list');
    }

    public function deleteDoneAction(): void {
        $doneEntries = $this->entryRepository->findByDone(true);

        foreach ($doneEntries as $doneEntry) {
            $this->entryRepository->remove($doneEntry);
        }

        $this->persistenceManager->persistAll();

        $this->forward('list');
    }

    public function listAction(): void {
        $this->view->assignMultiple([
            'newEntry' => new Entry(),
            'openEntries' => $this->entryRepository->findByDone(false),
            'doneEntries' => $this->entryRepository->findByDone(true),
        ]);
    }
}
