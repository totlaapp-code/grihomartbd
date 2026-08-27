<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ImageService
{
    /**
     * Upload an image file and automatically convert it to WebP format.
     * Safe fallback: If WebP conversion fails, saves original file format cleanly.
     *
     * @param UploadedFile $file
     * @param string $folder Directory path relative to public (e.g. 'public/uploads/products')
     * @param string|null $prefix Optional prefix for filename
     * @param int $quality Compression quality (1-100, default 82)
     * @return string Relative filepath to saved image
     */
    public static function convertAndUpload(UploadedFile $file, string $folder = 'public/uploads', ?string $prefix = null, int $quality = 82): string
    {
        // Ensure folder exists
        $destinationPath = base_path(trim($folder, '/'));
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $filename = ($prefix ? $prefix . '_' : '') . time() . '_' . Str::random(8);

        // Attempt WebP Conversion if GD & imagewebp are available
        if (function_exists('imagewebp') && extension_loaded('gd')) {
            try {
                $imageResource = self::createImageResource($file);
                if ($imageResource !== null) {
                    $webpFilename = $filename . '.webp';
                    $fullWebpPath = $destinationPath . '/' . $webpFilename;

                    // Preserve alpha transparency for PNG
                    imagealphablending($imageResource, true);
                    imagesavealpha($imageResource, true);

                    // Save as WebP
                    $saved = imagewebp($imageResource, $fullWebpPath, $quality);
                    imagedestroy($imageResource);

                    if ($saved && file_exists($fullWebpPath)) {
                        return trim($folder, '/') . '/' . $webpFilename;
                    }
                }
            } catch (\Throwable $e) {
                Log::warning("WebP conversion fallback triggered: " . $e->getMessage());
            }
        }

        // Safe Fallback: Move file in original format if WebP is unsupported or fails
        $extension = $file->getClientOriginalExtension() ?: 'jpg';
        $fallbackFilename = $filename . '.' . $extension;
        $file->move($destinationPath, $fallbackFilename);

        return trim($folder, '/') . '/' . $fallbackFilename;
    }

    /**
     * Create PHP Image Resource from uploaded file
     *
     * @param UploadedFile $file
     * @return resource|\GdImage|null
     */
    private static function createImageResource(UploadedFile $file)
    {
        $mimeType = $file->getMimeType();
        $filePath = $file->getRealPath();

        switch ($mimeType) {
            case 'image/jpeg':
            case 'image/jpg':
                return @imagecreatefromjpeg($filePath);
            case 'image/png':
                return @imagecreatefrompng($filePath);
            case 'image/webp':
                return @imagecreatefromwebp($filePath);
            case 'image/gif':
                return @imagecreatefromgif($filePath);
            default:
                return @imagecreatefromstring(file_get_contents($filePath));
        }
    }
}
