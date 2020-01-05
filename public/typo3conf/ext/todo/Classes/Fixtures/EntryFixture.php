<?php

namespace Eckert\Todo\Fixtures;

use Eckert\Todo\Domain\Model\Entry;
use Eckert\Todo\Domain\Repository\EntryRepository;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

class EntryFixture {
    /** @var EntryRepository */
    protected $entryRepository;

    /** @var PersistenceManager */
    protected $persistenceManager;

    public function __construct(EntryRepository $entryRepository, PersistenceManager $persistenceManager) {
        $this->entryRepository = $entryRepository;
        $this->persistenceManager = $persistenceManager;
    }

    public function load(): void {
        $this->entryRepository->removeAll();

        $data = [
            [
                'title' => 'create application',
                'description' => null,
                'done' => true,
            ],
            [
                'title' => 'go for an interview',
                'description' => 'Königsbrücker Straße 76, 01099 Dresden',
                'done' => true,
            ],
            [
                'title' => 'create a sample task',
                'description' => 'update to the latest TYPO3 version 9LTS and provide compatibility for TYPO3v10, optimizations in areas such as API, tests, linter or performance',
                'done' => false,
            ],
            [
                'title' => 'get the job and be happy',
                'description' => null,
                'done' => false,
            ],
        ];

        foreach ($data as $entry) {
            $obj = new Entry();
            $obj->setTitle($entry['title']);
            $obj->setDescription($entry['description']);
            $obj->setDone($entry['done']);

            $this->entryRepository->add($obj);
        }

        $this->persistenceManager->persistAll();
    }
}
