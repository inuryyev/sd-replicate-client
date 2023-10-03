<?php

namespace INuryyev\SDReplicateClient\Traits;

trait HasPaintingStyles
{
    public function paintingStyle(string $style): self
    {
        $this->paintingStyle = $style;

        return $this;
    }

    public function realistic(): self
    {
        return $this->paintingStyle('realistic');
    }

    public function hyperrealistic(): self
    {
        return $this->paintingStyle('hyperrealistic');
    }

    public function conceptArt(): self
    {
        return $this->paintingStyle('concept art');
    }

    public function abstractArt(): self
    {
        return $this->paintingStyle('abstract art');
    }

    public function oilPainting(): self
    {
        return $this->paintingStyle('oil painting');
    }

    public function watercolor(): self
    {
        return $this->paintingStyle('watercolor');
    }

    public function acrylic(): self
    {
        return $this->paintingStyle('acrylic');
    }

    public function pencilDrawing(): self
    {
        return $this->paintingStyle('pencil drawing');
    }

    public function digitalPainting(): self
    {
        return $this->paintingStyle('digital painting');
    }

    public function penDrawing(): self
    {
        return $this->paintingStyle('pen drawing');
    }

    public function charcoalDrawing(): self
    {
        return $this->paintingStyle('charcoal drawing');
    }
}
