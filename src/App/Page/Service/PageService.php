<?php

namespace Mottor\Api\Sapi\Page\Service;

use DateTimeImmutable;
use Mottor\Api\Domain\Page\Model\Page;
use Mottor\Api\Domain\Page\Repository\PageRepository;

class PageService
{
    /**
     * @var PageRepository
     */
    protected $pageRepository;

    protected $cache;

    /**
     * PageService constructor.
     *
     * @param PageRepository $pageRepository
     */
    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function create(string $name, string $url, bool $isEnabled)
    {
        $pageId = uuid_v4();
        $dateOfThisMoment = new DateTimeImmutable();

        $page = new Page(
            $pageId,
            $name,
            $url,
            $isEnabled,
            $dateOfThisMoment,
            $dateOfThisMoment
        );

        $this->pageRepository->persist($page);
    }

    public function updateUrl($id, $url)
    {
        $page = $this->pageRepository->findOneById($id);
        $page->changeUrl($url);

        $this->pageRepository->persist($page);
    }
}