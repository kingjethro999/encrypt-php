<?php

namespace Encrypt;

/**
 * Version utility class
 */
class Version
{
    /**
     * Get the version from composer.json
     */
    public static function getVersion(): string
    {
        try {
            $composerPath = __DIR__ . '/../../composer.json';
            if (file_exists($composerPath)) {
                $composerContent = file_get_contents($composerPath);
                $composerData = json_decode($composerContent, true);
                
                // Check if version is defined in composer.json
                if (isset($composerData['version'])) {
                    return $composerData['version'];
                }
                
                // If not, try to extract from extra.version or other fields
                if (isset($composerData['extra']['version'])) {
                    return $composerData['extra']['version'];
                }
            }
        } catch (\Exception $e) {
            // Fallback to default version
        }
        
        return '1.0.0';
    }
}
