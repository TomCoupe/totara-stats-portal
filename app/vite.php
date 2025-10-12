<?php
function vite_asset(string $entry): string {
    static $manifest;

    $manifestPath = __DIR__ . '/../public/assets/manifest.json';

    if (!$manifest) {
        $manifest = json_decode(file_get_contents($manifestPath), true);
    }

    return '/assets/' . ($manifest[$entry]['file'] ?? '');
}
