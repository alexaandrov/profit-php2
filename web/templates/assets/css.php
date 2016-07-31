<?php

use App\AppAsset;

$asset = new AppAsset();
$cssAssets = $asset->css;
?>

<?php foreach ($cssAssets as $css): ?>
    <link rel="stylesheet" href="<?= $asset->assetsPath . $css ?>">
<?php endforeach; ?>
