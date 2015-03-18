<?php
/**
 * Configuration file for the "yii asset" console command.
 */

// In the console environment, some path aliases may not exist. Please define these:
// Yii::setAlias('@webroot', __DIR__ . '/../web');
// Yii::setAlias('@web', '/');

return [
    // Adjust command/callback for JavaScript files compressing:
    'jsCompressor' => 'java -jar compiler.jar --js {from} --js_output_file {to}',
    // Adjust command/callback for CSS files compressing:
    'cssCompressor' => 'java -jar yuicompressor.jar --type css {from} -o {to}',
    // The list of asset bundles to compress:
    'bundles' => [
        // 'app\assets\AppAsset',
        // 'yii\web\YiiAsset',
        // 'yii\web\JqueryAsset',
    ],
    // Asset bundle for compression output:
    'targets' => [
        'all' => [
            'class' => 'yii\web\AssetBundle',
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets',
            'js' => 'js/all-{hash}.js',
            'css' => 'css/all-{hash}.css',
        ],
        'A' => ['css' => [], 'js' => [], 'depends' => ['all']],
        'B' => ['css' => [], 'js' => [], 'depends' => ['all']],
        'C' => ['css' => [], 'js' => [], 'depends' => ['all']],
        'D' => ['css' => [], 'js' => [], 'depends' => ['all']],
    ],
    // Asset manager configuration:
    'assetManager' => [
        'basePath' => '@dxapp/sirsys/assets',
        'baseUrl' => '@dxapp/sirsys',
    ],
];