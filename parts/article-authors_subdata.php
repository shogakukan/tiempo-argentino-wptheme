<?php
$defaults = array(
    'article'   => null
);
extract(array_merge($defaults, $args));
if (!$article)
    return;

if (!$article->authors || empty($article->authors))
    return;
?>

<?php foreach ($article->authors as $author) : ?>
    <?php if (isset($article->authors_subroles[$author->ID]) && $article->authors_subroles[$author->ID]) : ?>
        <p class="font-italic">* <?php echo esc_html($article->authors_subroles[$author->ID]); ?></p>
    <?php endif; ?>
<?php endforeach; ?>