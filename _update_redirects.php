<?php

$dirs = glob(__DIR__ . '/app/Filament/Resources/*/Pages');
foreach ($dirs as $dir) {
    if (!is_dir($dir)) continue;
    
    // Using simple glob and filtering manually since GLOB_BRACE might behave differently on Windows
    $allFiles = glob($dir . '/*.php');
    foreach ($allFiles as $file) {
        $basename = basename($file);
        if (str_starts_with($basename, 'Create') || str_starts_with($basename, 'Edit')) {
            $content = file_get_contents($file);
            if (strpos($content, 'getRedirectUrl') === false) {
                // Find the last closing brace
                $replacement = "\n    protected function getRedirectUrl(): string\n    {\n        return \$this->getResource()::getUrl('index');\n    }\n}\n";
                $newContent = preg_replace('/}[ \t\n\r]*$/', $replacement, $content);
                file_put_contents($file, $newContent);
                echo "Updated $file\n";
            }
        }
    }
}
echo "Done.\n";
