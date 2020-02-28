<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class DocumentAttachment
{
    /**
     * @var string
     */
    protected $url;
    /**
     * @var string
     */
    protected $uuid;
    /**
     * Defaults to filename, including extension.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Temporary URL to document attachment, expires in five minutes.
     *
     * @var string|null
     */
    protected $file;
    /**
     * Base64 encoded document content.
     *
     * @var string|null
     */
    protected $fileFromContent;
    /**
     * Filename, including extension. Required when using `file_from_content`.
     *
     * @var string|null
     */
    protected $fileFromContentName;
    /**
     * Publicly accessible URL of document to be downloaded by SignRequest.
     *
     * @var string|null
     */
    protected $fileFromUrl;
    /**
     * @var string
     */
    protected $document;

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Defaults to filename, including extension.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Defaults to filename, including extension.
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Temporary URL to document attachment, expires in five minutes.
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * Temporary URL to document attachment, expires in five minutes.
     */
    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Base64 encoded document content.
     */
    public function getFileFromContent(): ?string
    {
        return $this->fileFromContent;
    }

    /**
     * Base64 encoded document content.
     */
    public function setFileFromContent(?string $fileFromContent): self
    {
        $this->fileFromContent = $fileFromContent;

        return $this;
    }

    /**
     * Filename, including extension. Required when using `file_from_content`.
     */
    public function getFileFromContentName(): ?string
    {
        return $this->fileFromContentName;
    }

    /**
     * Filename, including extension. Required when using `file_from_content`.
     */
    public function setFileFromContentName(?string $fileFromContentName): self
    {
        $this->fileFromContentName = $fileFromContentName;

        return $this;
    }

    /**
     * Publicly accessible URL of document to be downloaded by SignRequest.
     */
    public function getFileFromUrl(): ?string
    {
        return $this->fileFromUrl;
    }

    /**
     * Publicly accessible URL of document to be downloaded by SignRequest.
     */
    public function setFileFromUrl(?string $fileFromUrl): self
    {
        $this->fileFromUrl = $fileFromUrl;

        return $this;
    }

    public function getDocument(): string
    {
        return $this->document;
    }

    public function setDocument(string $document): self
    {
        $this->document = $document;

        return $this;
    }
}
