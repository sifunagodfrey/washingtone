<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

// -------------------
// Upload File Helper
// -------------------
// Saves files into the project root uploads directory
// so they are accessible via:
// /elitehub/uploads/{folder}/{filename}
// -------------------

if (!function_exists('upload_file')) {

    function upload_file(UploadedFile $file, string $directory): ?string
    {
        // -------------------
        // Ensure upload directory exists
        // -------------------

        $path = base_path('uploads/' . $directory);

        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        // -------------------
        // Generate unique filename
        // -------------------

        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

        // -------------------
        // Move uploaded file
        // -------------------

        $file->move($path, $filename);

        return $filename;
    }
}

// -------------------
// Delete Uploaded File
// -------------------

if (!function_exists('delete_upload')) {

    function delete_upload(string $directory, ?string $filename): void
    {
        if (!$filename) {
            return;
        }

        $filePath = base_path("uploads/{$directory}/{$filename}");

        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}

// -------------------
// Get Uploaded File URL
// -------------------

if (!function_exists('upload_url')) {

    function upload_url(string $directory, ?string $filename): ?string
    {
        if (!$filename) {
            return null;
        }

        return url("uploads/{$directory}/{$filename}");
    }
}