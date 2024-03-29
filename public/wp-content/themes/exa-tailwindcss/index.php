<?php

get_header();
?>

<main class="max-w-[1200px] mx-auto px-3 xl:px-0 ">
  <h1 class="mb-10 font-extrabold text-5xl xl:text-6xl text-center text-azul3">Blog</h1>
  <?php if (have_posts()) : ?>
    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3" >
      <?php while (have_posts()) : the_post(); ?>
        <article>
          <figure class="relative mb-3 h-0 pb-[56.25%]">
            <a href="<?php echo get_the_permalink() ?>">
              <?php echo get_the_post_thumbnail(null, 'medium_large',["class" => "absolute top-0 left-0 w-full h-full object-cover", "loading"=>"lazy", "alt"=>get_the_title()]) ?>
            </a>
          </figure>
          <h4 class="font-bold text-gray-700 dark:text-gray-300">
            <a href="<?php echo get_the_permalink() ?>" ><?php the_title(); ?></a>
          </h4>
          <p class="text-sm" ><?php the_date() ?></p>
        </article>
      <?php endwhile; ?>
    </div>
  <?php else : ?>
    <article>
      <p>Nothing to see.</p>
    </article>
  <?php endif; ?>
</main>

<?php

get_footer();
