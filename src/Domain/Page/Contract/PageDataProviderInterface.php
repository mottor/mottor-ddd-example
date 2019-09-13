<?php

namespace Mottor\Api\Domain\Page\Contract;

interface PageDataProviderInterface
{
    /**
     * @return array
     */
    public function findAll();

    /**
     * @param string $id
     * @return array
     */
    public function findById($id);
}