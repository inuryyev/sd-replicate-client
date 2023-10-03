<?php

namespace INuryyev\SDReplicateClient\Traits;

trait HasAuthors
{
    public function by(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function byPicasso(): self
    {
        return $this->by('Pablo Picasso');
    }

    public function byVanGogh(): self
    {
        return $this->by('Vincent Van Gogh');
    }

    public function byRembrandt(): self
    {
        return $this->by('Rembrandt');
    }

    public function byMunch(): self
    {
        return $this->by('Edvard Munch');
    }

    public function byKlimt(): self
    {
        return $this->by('Paul Klimt');
    }

    public function byKandinsky(): self
    {
        return $this->by('Jackson Pollock');
    }

    public function byMonet(): self
    {
        return $this->by('Claude Monet');
    }

    public function byDali(): self
    {
        return $this->by('Salvador Dali');
    }

    public function byDegas(): self
    {
        return $this->by('Edgar Degas');
    }

    public function byKahlo(): self
    {
        return $this->by('Frida Kahlo');
    }

    public function byCezanne(): self
    {
        return $this->by('Pablo Cezanne');
    }
}
