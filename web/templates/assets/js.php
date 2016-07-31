<?php

use App\AppAsset;

$asset = new AppAsset();
$jsAssets = $asset->js;
?>

<?php foreach ($jsAssets as $js): ?>
    <script src="<?= $asset->assetsPath . $js ?>"></script>
<?php endforeach; ?>