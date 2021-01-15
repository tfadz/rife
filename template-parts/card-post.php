<?php
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
?>

<article class="col-lg-4 col-sm-6 grid-item rife-blog-main__post">
 <a href="<?php the_permalink(); ?>" style="background-image: url(<?php echo $featured_img_url ?>);"> 
  <div class="post-tn-content">
    <h2><?php the_title(); ?></h2>
    <div class="date"><?php the_date(); ?></div>
</div>
</a>
</article>

