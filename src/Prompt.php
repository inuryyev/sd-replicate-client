<?php

namespace INuryyev\SDReplicateClient;

use INuryyev\SDReplicateClient\Traits\HasAuthors;
use INuryyev\SDReplicateClient\Traits\HasCanvases;
use INuryyev\SDReplicateClient\Traits\HasFinishingTouches;
use INuryyev\SDReplicateClient\Traits\HasPaintingStyles;

class Prompt
{
    use HasPaintingStyles;
    use HasAuthors;
    use HasCanvases;
    use HasFinishingTouches;

    protected $prompt = '';
    protected $paintingStyle = null;
    protected $author = null;
    protected $canvas = null;
    protected $finishingTouches = [];

    private function __construct(
        string $prompt = '',
        ?string $paintingStyle = null,
        ?string $author = null,
        ?string $canvas = null,
        array $finishingTouches = []
    ) {
        $this->finishingTouches = $finishingTouches;
        $this->canvas = $canvas;
        $this->author = $author;
        $this->paintingStyle = $paintingStyle;
        $this->prompt = $prompt;
    }

    public static function make(): Prompt
    {
        return new Prompt();
    }

    public function with(string $prompt): self
    {
        $this->prompt = $prompt;

        return $this;
    }

    public function toString(): string
    {
        $prompt = $this->prompt;
        if ($this->author) {
            $prompt .= ', made by '.$this->author;
        }

        if ($this->canvas) {
            $prompt = $this->canvas.' of '.$prompt;
        }

        if ($this->paintingStyle) {
            $prompt .= ', '.$this->paintingStyle;
        }

        if (! empty($this->finishingTouches)) {
            $prompt .= ', '.implode(', ', array_values(array_unique($this->finishingTouches)));
        }

        return $prompt;
    }

    public function userPrompt(): string
    {
        return $this->prompt;
    }
}
