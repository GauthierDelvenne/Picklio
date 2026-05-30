<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\Format;
use Intervention\Image\ImageManager;

class ProcessImage implements ShouldQueue
{
    use Queueable;

    protected string $fullPath;

    protected string $fileName;

    protected int|string $accountId;

    /**
     * Create a new job instance.
     */
    public function __construct(string $fullPath, string $fileName, int|string $accountId)
    {
        $this->fullPath = $fullPath;
        $this->fileName = $fileName;
        $this->accountId = $accountId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $absolutePath = Storage::disk('s3')->path($this->fullPath);

        $manager = ImageManager::usingDriver(GdDriver::class);

        $image = $manager->decodePath($absolutePath);

        $sizes = config('pickliopicture.sizes');
        $compression = config('pickliopicture.compression');
        $variantPathTemplate = config('pickliopicture.variantPath');

        foreach ($sizes as $size) {
            $resizedImage = (clone $image)->scale(width: (int) $size);

            $variantFolder = sprintf($variantPathTemplate, $this->accountId, $size);
            $fullVariantPath = $variantFolder.'/'.$this->fileName;

            $encoded = $resizedImage->encodeUsingFormat(Format::JPEG, quality: $compression ?? 80);

            Storage::disk('s3')->put($fullVariantPath, (string) $encoded);
        }
    }
}
