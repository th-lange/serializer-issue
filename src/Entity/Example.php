<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Attribute\Ignore;

class Example
{
    #[Groups(['id'])]
    private int $id;

    #[Ignore]
    private ?string $text = null;

    #[Groups(['one'])]
    private ?string $content = null;

    #[Groups(['two'])]
    private \DateTime $publishedAt;

    #[Groups(['two'])]
    private ?string $author = null;

    private ?string $exampleName = null;


    public function __construct()
    {
        $this->publishedAt = new \DateTime();
        $this->id = random_int(1, 999999999);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Example
    {
        $this->id = $id;
        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): Example
    {
        $this->text = $text;
        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): Example
    {
        $this->content = $content;
        return $this;
    }

    public function getPublishedAt(): \DateTime
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTime $publishedAt): Example
    {
        $this->publishedAt = $publishedAt;
        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): Example
    {
        $this->author = $author;
        return $this;
    }

    public function getExampleName(): ?string
    {
        return $this->exampleName;
    }

    public function setExampleName(?string $exampleName): Example
    {
        $this->exampleName = $exampleName;
        return $this;
    }
}
