<?php

// Register theme defaults.
add_action('after_setup_theme', function () {
    show_admin_bar(false);

    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    register_nav_menus([
        'navigation' => __('Navigation'),
    ]);
});

// Register scripts and styles.
add_action('wp_enqueue_scripts', function () {
    $manifestPath = get_theme_file_path('assets/.vite/manifest.json');

    if (
        wp_get_environment_type() === 'local' &&
        is_array(wp_remote_get('http://localhost:5173/')) // is Vite.js running
    ) {
        wp_enqueue_script('vite', 'http://localhost:5173/@vite/client');
        wp_enqueue_script('theme-front', 'http://localhost:5173/src/front.js', [], null, true);
    }
    elseif (file_exists($manifestPath))
    {
        $manifest = json_decode(file_get_contents($manifestPath), true);

        wp_enqueue_script('theme-front', get_theme_file_uri('assets/' . $manifest['src/front.js']['file']), [], false, true);

        wp_enqueue_style('theme-front', get_theme_file_uri('assets/' . $manifest['src/front.js']['css'][0]));
    }
    if ( env("FONTAWESOME_KIT","")!=="" )
    {
        wp_enqueue_script('fontawesome-kit', 'https://kit.fontawesome.com/'.env("FONTAWESOME_KIT").'.js', [], null, true);
    }
});

// Load scripts as modules.
add_filter('script_loader_tag', function (string $tag, string $handle, string $src)
{
    if (in_array($handle, ['vite', 'theme-front']))
    {
        return '<script type="module" src="' . esc_url($src) . '" defer></script>';
    }
    if ($handle==="fontawesome-kit")
    {
        return '<script defer src="' . esc_url($src) . '" crossorigin="anonymous"></script>';
    }

    return $tag;
}, 10, 3);


foreach (glob(__DIR__."/inc/*.php") as $filename)
{
    include $filename;
}