<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// 1. Check DB Data
$term = App\Models\Term::where('slug', 'agile')->first();
if (!$term) {
    echo "ERROR: Term 'agile' not found in DB.\n";
} else {
    echo "SUCCESS: Term 'agile' found.\n";
    echo "Key Points: " . json_encode($term->key_points, JSON_UNESCAPED_UNICODE) . "\n";
    echo "Usage Scenarios: " . json_encode($term->usage_scenarios, JSON_UNESCAPED_UNICODE) . "\n";
}

// 2. Check HTML Response (Localhost access)
$url = 'http://localhost:86/terms/agile';
echo "\nFetching URL: $url\n";

$context = stream_context_create([
    'http' => [
        'timeout' => 5
    ]
]);

try {
    $html = file_get_contents($url, false, $context);
    if ($html === false) {
        echo "ERROR: Failed to fetch URL.\n";
    } else {
        echo "SUCCESS: Page fetched.\n";
        
        // Check for section titles representing dynamic content
        if (strpos($html, '押さえておきたいポイント') !== false) {
            echo "CHECK: 'Points' section FOUND.\n";
        } else {
            echo "CHECK: 'Points' section NOT found.\n";
        }
        
        if (strpos($html, 'こんな時に使う') !== false) {
            echo "CHECK: 'Usage Scenarios' section FOUND.\n";
        } else {
            echo "CHECK: 'Usage Scenarios' section NOT found.\n";
        }

        // Output a snippet around the expected content
        $pos = strpos($html, '押さえておきたいポイント');
        if ($pos !== false) {
            echo "Snippet: " . mb_substr($html, $pos, 200) . "...\n";
        }
    }
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
