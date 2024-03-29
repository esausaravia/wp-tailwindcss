<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>
  <!-- Scripts -->
  <script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark')
    } else {
      document.documentElement.classList.remove('dark')
    }
    var app = window.app || {};
  </script>
</head>

<body <?php body_class("antialiased font-sans bg-gray-100 text-gray-600 dark:bg-gray-900 dark:text-gray-400"); ?> >
  <?php wp_body_open(); ?>
  <header class="">
    <?php wp_nav_menu(['theme_location' => 'navigation', 'container_id' =>'HeaderMainMenu']); ?>
  </header>