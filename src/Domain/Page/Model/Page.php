<?php

namespace Mottor\Api\Domain\Page\Model;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;

class Page
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var bool
     */
    protected $isEnabled;

    /**
     * @var DateTimeImmutable
     */
    protected $createdAt;

    /**
     * @var DateTimeImmutable
     */
    protected $updatedAt;

    /**
     * Page constructor.
     *
     * @param string $id
     * @param string $name
     * @param string $url
     * @param boolean $isEnabled
     *
     * @throws Exception
     */
    public function __construct(
        string $id,
        string $name,
        string $url,
        bool $isEnabled,
        DateTimeInterface $createdAt,
        DateTimeInterface $updatedAt
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->url = $url;
        $this->isEnabled = $isEnabled;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param array $data
     * @return static
     *
     * @throws Exception
     */
    public static function createFromArray(array $data)
    {
        return new static(
            $data['id'],
            $data['name'],
            $data['url'],
            $data['isEnabled'],
            new DateTimeImmutable($data['createdAt']),
            new DateTimeImmutable($data['updatedAt'])
        );
    }

    /**
     * @param string $url
     *
     * @throws Exception
     */
    public function changeUrl(string $url): void
    {
        $this->url = $url;
        $this->updatedAt = new DateTimeImmutable();
    }
}