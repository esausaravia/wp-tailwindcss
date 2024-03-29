<?php

get_header();
?>
<main class="max-w-[800px] mx-auto py-12 px-3 xl:px-0 ">
  <h1 class="mb-10 font-extrabold text-4xl xl:text-5xl text-center text-azul3"><?php the_title() ?></h1>

  <div class="post-content text-lg">
    <?php the_content() ?>
  </div>
</main>
<?php get_footer();