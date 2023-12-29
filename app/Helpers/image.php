<?php

use Ramsey\Uuid\Uuid;

if (!function_exists('create_default_image')) {
    /**
     * Creates an default image file in the specified storage path.
     *
     * @param string $filepath The path to the source file.
     * @param string $storagePath The path to the storage directory.
     * @return string The filename of the created image file.
     */
    function create_default_image(string $filepath, string $storagePath)
    {
        $file     = File::get($filepath);
        $filename = Uuid::uuid4()->toString() . '.png';

        Storage::put(trim($storagePath, DIRECTORY_SEPARATOR) . "/{$filename}", $file);

        return $filename;
    }
}
