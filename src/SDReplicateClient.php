<?php

namespace INuryyev\SDReplicateClient;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use INuryyev\SDReplicateClient\Models\StableDiffusionPrediction;

class SDReplicateClient
{
    public $prompt = null;
    private $width = 512;
    private $height = 512;

    private function __construct(
        ?Prompt $prompt = null,
        int $width = 512,
        int $height = 512
    ) {
        $this->height = $height;
        $this->width = $width;
        $this->prompt = $prompt;
    }

    public static function make(): self
    {
        return new self();
    }

    public static function get(string $replicateId)
    {
        $result = StableDiffusionPrediction::where('replicate_id', $replicateId)->first();
        assert($result !== null, 'Unknown id');

        $idleStatuses = ['starting', 'processing'];
        if (! in_array($result->status, $idleStatuses)) {
            return $result;
        }

        $response = self::make()
            ->client()
            ->get($result->url)
            ->json();

        $result->update([
            'status' => Arr::get($response, 'status', $result->status),
            'output' => Arr::get($response, 'output'),
            'error' => Arr::get($response, 'error'),
            'predict_time' => Arr::get($response, 'metrics.predict_time'),
        ]);

        return $result;
    }

    public function withPrompt(Prompt $prompt)
    {
        $this->prompt = $prompt;

        return $this;
    }

    public function width(int $width)
    {
        assert($width > 0, 'Width must be greater than 0');
        if ($width <= 768) {
            assert($width <= 768 && $this->width <= 1024, 'Width must be lower than 768 and height lower than 1024');
        } else {
            assert($width <= 1024 && $this->width <= 768, 'Width must be lower than 1024 and height lower than 768');
        }

        $this->width = $width;

        return $this;
    }

    public function height(int $height)
    {
        assert($height > 0, 'Height must be greater than 0');
        if ($height <= 768) {
            assert($height <= 768 && $this->width <= 1024, 'Height must be lower than 768 and width lower than 1024');
        } else {
            assert($height <= 1024 && $this->width <= 768, 'Height must be lower than 1024 and width lower than 768');
        }

        $this->height = $height;

        return $this;
    }

    public function generate(int $numberOfImages): StableDiffusionPrediction
    {
        assert($this->prompt !== null, 'You must provide a prompt');
        assert($numberOfImages > 0, 'You must provide a number greater than 0');

        $response = $this->client()
            ->post(config('stable-diffusion.url'), [
                'version' => config('stable-diffusion.version'),
                'input' => [
                    'prompt' => $this->prompt->toString(),
                    'num_outputs' => $numberOfImages,
                ],
            ])
            ->json();


        $result = StableDiffusionPrediction::create([
            'replicate_id' => $response['id'],
            'user_prompt' => $this->prompt->userPrompt(),
            'full_prompt' => $this->prompt->toString(),
            'url' => $response['urls']['get'],
            'status' => $response['status'],
            'error' => $response['error'],
            'predict_time' => null,
        ]);

        return $result;
    }

    private function client(): PendingRequest
    {
        return Http::withHeaders([
            'Authorization' => 'Token '.config('stable-diffusion.token'),
        ])
            ->asJson()
            ->acceptJson();
    }
}
