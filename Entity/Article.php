<?php

class Article
{
    private ?int $id;
    private ?string $title;
    private ?string $content;
    private ?string $date_add;

    public function __construct(int $id = null, string $title = null, string $content = null, string $date_add = null){
        $this->id = $id;
        $this->title =$title;
        $this->content =$content;
        $this->date_add =$date_add;
    }


    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): Article {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): Article {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateAdd(): string {
        return $this->date_add;
    }

    /**
     * @param string $date_add
     */
    public function setDateAdd(string $date_add): Article {
        $this->date_add = $date_add;
        return $this;
    }
}
