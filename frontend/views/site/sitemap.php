<?php
/* @var $urls */
/* @var $host */
echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
            <?php foreach ($urls as $url): ?>
        <url>
            <loc><?= $host . $url['loc']; ?></loc>
            <?php if (isset($url['lastmod'])): ?>
                <lastmod><?= $url['lastmod']; ?></lastmod>
            <?php endif; ?>
            <changefreq><?= $url['changefreq']; ?></changefreq>
            <priority><?= $url['priority']; ?></priority>
            <?php if (isset($url['images'])):
                foreach ($url['images'] as $image):
                    ?>
                    <image:image>
                        <image:loc><?= yii\helpers\Url::to($image['loc'], true) ?></image:loc>
                        <?php
                        echo isset($image['caption']) ?
                                "<image:caption>{$image['caption']}</image:caption>" : '';
                        echo isset($image['geo_location']) ?
                                "<image:geo_location>{$image['geo_location']}</image:geo_location>" : '';
                        echo isset($image['title']) ?
                                "<image:title>{$image['title']}</image:title>" : '';
                        echo isset($image['license']) ?
                                "<image:license>{$image['license']}</image:license>" : '';
                        ?>
                    </image:image>
                <?php endforeach;
            endif;
            ?>
        </url>
<?php endforeach; ?>
</urlset>