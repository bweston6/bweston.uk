<?php
function image(string $src, string $alt, string $class=""): string {
    $imageCacheUrl = "/assets/.cache/";
    $imageCachePath = PUBLIC_DIR . $imageCacheUrl;

    $url = pathinfo($src);

    $path = PUBLIC_DIR . $src;
    [$width, $height] = getimagesize($path);
    $max_width = min($width, 2400);

    $images = [
        "quarter" => [
            "width" => floor($max_width / 4),
            "url" => $imageCacheUrl . $url['filename'] . "-" . floor($max_width / 4) . "." . $url['extension'],
        ],
        "third" => [
            "width" => floor($max_width / 3),
            "url" => $imageCacheUrl . $url['filename'] . "-" . floor($max_width / 3) . "." . $url['extension'],
        ],
        "half" => [
            "width" => floor($max_width / 2),
            "url" => $imageCacheUrl . $url['filename'] . "-" . floor($max_width / 2) . "." . $url['extension'],
        ],
        "full" => [
            "width" => $max_width,
            "url" => $imageCacheUrl . $url['filename'] . "-" . $max_width . "." . $url['extension'],
        ],
        "original" => [
            "width" => $width,
            "url" => $src,
            "noresize" => true,
        ],
    ];

    foreach($images as $image) {
        if (
            array_key_exists('noresize', $image) && $image['noresize'] ||
                apcu_entry(PUBLIC_DIR . $image['url'], function($file) {
                    return file_exists($file);
                })
        ) {
            continue;
        }
        imageavif(
            imagescale(imagecreatefromavif($path), $image['width']),
            PUBLIC_DIR . $image['url'],
        );
        apcu_delete(PUBLIC_DIR . $image['url']);
    }

    $lqipUrl = $imageCacheUrl . $url['filename'] . "-lqip." . $url['extension'];
    if (!apcu_entry(PUBLIC_DIR . $lqipUrl, function($file) {
        return file_exists($file);
    })

    ) {
        $lqipPath = PUBLIC_DIR . $lqipUrl;
        imageavif(
            imagescale(
                imagecreatefromavif($path),
                $max_width
            ),
            $lqipPath,
            0,
        );
        apcu_delete(PUBLIC_DIR . $lqipUrl);
        apcu_delete("lqips");
    }

    ob_start();
    ?>

    <img
        loading="lazy"
	    style="aspect-ratio: <?= $width ?> / <?= $height ?>; background-image: url(<?= $lqipUrl ?>)"
        <?= $class ? "class='$class'" : "" ?>
        src="<?= $images[array_key_last($images)]['url'] ?>" alt="<?= $alt ?>" 
	    srcset="
        <?php foreach($images as $image) {
        echo "{$image['url']} {$image['width']}w,";
        }?>
        " 
	    sizes="
        <?php foreach($images as $image) {
        echo "(width <= {$image['width']}px) {$image['width']}px,";
        }?>
        "
    />

    <?php
    return ob_get_clean();
}
?>
