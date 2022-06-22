<?php

namespace App\Domain\Image;

class Image implements \JsonSerializable
{
    private string $id;
    private string $url;

    /**
     * @param string $id
     * @param string $url
     */
    public function __construct(string $id, string $url)
    {
        $this->id = $id;
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'url' => $this->getUrl()
        ];
    }
}