<?php
require_once "lqip.php";
?>

<!DOCTYPE html>
<html lang="en-gb">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Blog | Ben Weston</title>
		<meta name="description" content="The 'anti-content' website.">
		<script type="module" async src="script.js"></script>
		<link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>✨</text></svg>">
		<link rel="preload" href="/fonts/CrimsonText-BoldItalic.woff2" as="font" fetchpriority="high">
		<link rel="preload" href="/fonts/CrimsonText-Italic.woff2" as="font">
		<!-- <link rel="stylesheet" href="style.css"> -->
		<style>
			<?php require dirname(BASEPATH) . "/public/style.css" ?>
		</style>

		<!-- low quality image previews -->
		<?= getLqipLinkTags(); ?>
	</head>
	<body>
		<header>
			<div class="dome">
				<h1>Ben Weston</h1>
			</div>
			<nav><a href="#blog">Blog</a> & <a href="#main">Links</a></nav>
			<div class="banner"></div>
		</header>
		<main id="main">
			<p>
				Welcome to my site! It houses the longest <a href="https://www.the-telephone-box.co.uk/kiosks/kx100-plus/">KX100
					Plus</a> telephone box that I've seen on the internet. Unfortunately you can't make calls ✆ or texts ✉, but
				you can <a href="mailto:me@bweston.uk">send mail ＠</a> if you'd like to comment on a post! Please ask if you'd
				like to have your thoughts featured at the end of an article.
			</p>
			<p>
				You will find my most recent posts below which often include
				project diaries and interesting links from across the web.
			</p>
			<hr>
			<section id="blog">
				<?php
      	$posts = glob(__DIR__ . '/blog/*.php');

				foreach ($posts as $post) {
    		echo "<article>";
    		require $post;
    		echo "</article><hr>";
				} ?>
			</section>
		</main>
		<footer>
			<div class="bottom-window">
				<div class="electrical-box">
					<h2>Site Statistics</h2>
					<dl>
						<dt>Hits</dt>
						<dd><?= require("hits.php"); ?> requests</dd>
						<dt>Total Asset Size</dt>
						<dd><span id="asset-size">-.-</span></dd>
						<dt>Estimated Download Time on Slow 4G (1.2 Mb/s)</dt>
						<dd><span id="download-time">-.-</span></dd>
					</dl>
					<noscript>This tidbit requires JavaScript to be enabled</noscript>
				</div>
				<div class="bottom-frame"></div>
			</div>
		</footer>
	</body>
</html>
