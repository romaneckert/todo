<?php

namespace Eckert\Todo\Tests\Unit\Domain\Model;

use Eckert\Todo\Domain\Model\Entry;
use Nimut\TestingFramework\TestCase\UnitTestCase;
use TypeError;

class EntryTest extends UnitTestCase {
    /** @var Entry */
    protected $entry;

    protected function setUp() {
        $this->entry = new Entry();
    }

    /** @test */
    public function titleCanBeSet(): void {
        $title = 'News title';
        $this->entry->setTitle($title);
        $this->assertEquals($title, $this->entry->getTitle());
    }

    /** @test */
    public function titleCanNotSetNull(): void {
        $this->expectException(TypeError::class);
        $this->entry->setTitle(null);
    }

    /** @test */
    public function descriptionCanBeSet(): void {
        $description = 'News description';
        $this->entry->setDescription($description);
        $this->assertEquals($description, $this->entry->getDescription());

        $description = null;
        $this->entry->setDescription($description);
        $this->assertEquals($description, $this->entry->getDescription());
    }

    /** @test */
    public function doneCanBeSet(): void {
        $this->entry->setDone(true);
        $this->assertEquals(true, $this->entry->isDone());

        $this->entry->setDone(false);
        $this->assertEquals(false, $this->entry->isDone());
    }
}
