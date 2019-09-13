<?php

namespace Mottor\Api\Domain\Page\Repository;

use Exception;
use Mottor\Api\Domain\Page\Contract\PageDataProviderInterface;
use Mottor\Api\Domain\Page\Model\Page;

class PageRepository
{
    /**
     * @var PageDataProviderInterface $dataProvider
     */
    protected $dataProvider;

    /**
     * PageRepository constructor.
     * @param PageDataProviderInterface $dataProvider
     */
    public function __construct(PageDataProviderInterface $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    /**
     * @param string $id
     * @return Page
     */
    public function findOneById($id)
    {
        $rawData = $this->dataProvider->findById($id);
        $rawData = $rawData[0];

        return $this->hydrate($rawData);;
    }

    /**
     * @param Page $page
     */
    public function persist(Page $page)
    {
        // $this->dataProvider->...
    }

    /**
     * @param array $rawData
     * @return Page
     *
     * @throws Exception
     */
    protected function hydrate($rawData)
    {
        $page = Page::createFromArray($rawData);
        return $page;
    }
}