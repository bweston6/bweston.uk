<!DOCTYPE html>
<html lang="en-gb">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Blog | Ben Weston</title>
		<meta name="description" content="The 'anti-content' website.">
		<script type="module" async src="script.js"></script>
		<link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>✨</text></svg>">
		<!-- h1 font -->
		<link rel="preload" href="/fonts/CrimsonText-Italic.woff2" as="font" fetchpriority="high">
		<!-- <link rel="stylesheet" href="style.css"> -->
		<style>
			<?= file_get_contents(dirname(BASEPATH) . "/public/style.css") ?>
		</style>
	</head>
	<body>
		<header>
			<div class="dome">
				<h1><a href="/">Ben Weston</a></h1>
			</div>
			<nav><a href="#blog">Blog</a> & <a href="#links">Links</a></nav>
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
			<section>
				<?php foreach (array_reverse($posts) as $post) : ?>
				<article id="<?= join(',', $post["front_matter"]['type']) ?>">
					<h2><a href="/post/<?= $post["slug"] ?>"><?= $post["front_matter"]['title']; ?></a></h2>
					<dl class='article-dates inline'>
						<dt>Written</dt>
						<dd><time datetime='<?= $post["front_matter"]['date'] ?>'><?= $post["front_matter"]['date'] ?></time></dd>
						<?php if (isset($post["front_matter"]['modified']) && $post["front_matter"]['modified'] != $post["front_matter"]['date']) : ?>
						<dt>Updated</dt>
						<dd><time datetime='<?= $post["front_matter"]['modified'] ?>'><?= $post["front_matter"]['modified'] ?></time></dd>
						<?php endif; ?>
					</dl>
					<?= $post["result"] ?>
				</article>
				<hr>
				<?php endforeach; ?>
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
