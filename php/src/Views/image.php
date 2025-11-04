<?php
function image(string $src, string $alt, string $class = ""): string
{
    $path = PUBLIC_DIR . $src;
    [$width, $height] = getimagesize($path);

    ob_start();
?>

<img
    loading="lazy"
	style="aspect-ratio: <?= $width ?> / <?= $height ?>"
    <?= $class ? "class='$class'" : "" ?>
    src="<?= $src ?>" alt="<?= $alt ?>" 
/>

<?php
    return ob_get_clean();
}
?>
