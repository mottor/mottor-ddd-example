<?php

namespace Mottor\Api\Infrastructure\Page\DataProvider;

use Mottor\Api\Domain\Page\Contract\PageDataProviderInterface;

class PageInMemoryDataProvider implements PageDataProviderInterface
{
    /**
     * @var array
     */
    protected $data = [
        [
            'id' => 'id_01',
            'name' => 'Product Page 1',
            'url' => 'product-page-1',
            'isEnabled' => true,
            'createdAt' => '2019-01-01 00:00:00',
            'updatedAt' => '2019-01-01 00:00:00',
        ],
        [
            'id' => 'id_02',
            'name' => 'Product Page 2',
            'url' => 'product-page-2',
            'isEnabled' => true,
            'createdAt' => '2019-01-01 00:00:00',
            'updatedAt' => '2019-01-01 00:00:00',
        ]
    ];

    /**
     * @inheritdoc
     */
    public function findAll()
    {
        return $this->data;
    }

    /**
     * @inheritdoc
     */
    public function findById($id)
    {
        return $this->data;
    }
}