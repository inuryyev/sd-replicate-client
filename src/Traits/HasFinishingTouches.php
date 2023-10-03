<?php

namespace INuryyev\SDReplicateClient\Traits;

trait HasFinishingTouches
{
    public function effect(string $effect): self
    {
        $this->finishingTouches[] = $effect;

        return $this;
    }

    public function highlyDetailed(): self
    {
        return $this->effect('highly detailed');
    }

    public function surrealism(): self
    {
        return $this->effect('surrealism');
    }

    public function trendingOnArtStation(): self
    {
        return $this->effect('trending on art station');
    }

    public function triadicColorScheme(): self
    {
        return $this->effect('triadic color scheme');
    }

    public function smooth(): self
    {
        return $this->effect('smooth');
    }

    public function sharpFocus(): self
    {
        return $this->effect('sharp focus');
    }

    public function matte(): self
    {
        return $this->effect('matte');
    }

    public function elegant(): self
    {
        return $this->effect('elegant');
    }

    public function theMostBeautifulImageEverSeen(): self
    {
        return $this->effect('the most beautiful image ever seen');
    }

    public function illustration(): self
    {
        return $this->effect('illustration');
    }

    public function digitalPaint(): self
    {
        return $this->effect('digital paint');
    }

    public function dark(): self
    {
        return $this->effect('dark');
    }

    public function gloomy(): self
    {
        return $this->effect('gloomy');
    }

    public function octaneRender(): self
    {
        return $this->effect('octane render');
    }

    public function resolution8k(): self
    {
        return $this->effect('8k');
    }

    public function resolution4k(): self
    {
        return $this->effect('4k');
    }

    public function washedColors(): self
    {
        return $this->effect('washed colors');
    }

    public function sharp(): self
    {
        return $this->effect('sharp');
    }

    public function dramaticLighting(): self
    {
        return $this->effect('dramatic lighting');
    }

    public function beautiful(): self
    {
        return $this->effect('beautiful');
    }

    public function postProcessing(): self
    {
        return $this->effect('post processing');
    }

    public function pictureOfTheDay(): self
    {
        return $this->effect('picture of the day');
    }

    public function ambientLighting(): self
    {
        return $this->effect('ambient lighting');
    }

    public function epicComposition(): self
    {
        return $this->effect('epic composition');
    }
}
