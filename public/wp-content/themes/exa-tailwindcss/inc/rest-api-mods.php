<?php

add_action('rest_api_init', function(){
  register_rest_field('post', 'myimage', array(
    'get_callback' => function($postArr) {
      $postObj = get_post( $postArr['id'] );
      $postThumbId = get_post_thumbnail_id($postObj);

      $result = wp_get_attachment_image_src($postThumbId, 'medium_large', false);

      return $result && !empty($result) ? $result : $postThumbId;
    }
  ));
});
