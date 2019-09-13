<?php

namespace Mottor\Api\Test\Page;

use Mottor\Api\Domain\Page\Repository\PageRepository;
use Mottor\Api\Infrastructure\Page\DataProvider\PageInMemoryDataProvider;
use Mottor\Api\Infrastructure\Page\DataProvider\PageMySQLDataProvider;
use PHPUnit\Framework\TestCase;

class PageTest extends TestCase
{
    public function testInMemoryDataProvider()
    {
        $dataProvider = new PageInMemoryDataProvider();

        $repository = new PageRepository(
            $dataProvider
        );

        $page = $repository->findOneById('id_01');

        $this->assertEquals('id_01', $page->getId());
    }

    public function testMySQLDataProvider()
    {
        $dataProvider = new PageMySQLDataProvider();

        $repository = new PageRepository(
            $dataProvider
        );

        $page = $repository->findOneById('id_01');

        $this->assertEquals('id_01', $page->getId());
    }
}