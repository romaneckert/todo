<?php

namespace Eckert\Todo\Tests\Functional\Repository;

use Eckert\Todo\Domain\Repository\EntryRepository;
use Nimut\TestingFramework\TestCase\FunctionalTestCase;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\QueryResult;

class EntryRepositoryTest extends FunctionalTestCase {
    /** @var EntryRepository */
    protected $entryRepository;

    protected $testExtensionsToLoad = ['typo3conf/ext/todo'];

    protected function setUp(): void {
        parent::setUp();
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $this->entryRepository = $objectManager->get(EntryRepository::class);

        $this->importDataSet(__DIR__.'/../Fixtures/tx_todo_domain_model_entry.xml');
    }

    /** @test */
    public function findByUid(): void {
        $entry = $this->entryRepository->findByUid(1);

        $this->assertEquals($entry->getTitle(), 'findByUid');
    }

    /** @test */
    public function findByDone(): void {
        /** @var QueryResult $results */
        $results = $this->entryRepository->findByDone(true);
        $this->assertEquals($results->count(), 1);

        /** @var QueryResult $results */
        $results = $this->entryRepository->findByDone(false);
        $this->assertEquals($results->count(), 2);
    }
}
