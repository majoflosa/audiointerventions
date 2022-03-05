<?php
/**
 * Meta box for home page callouts sections
 */
$audint_meta_boxes['home']['callouts'] = [
  'id'            => 'audint_home_callouts',
  'title'         => 'Callouts Section',
  'callback'      => 'audint_home_callouts_cb',
  'screen'        => 'page',
  'context'       => 'normal',
  'priority'      => 'default',
  'callback_args' => null,
];

$audint_defaults['home_callouts'] = [
  'heading'         => 'Why Audio Interventions',
  // callout 1
  'callout_1_title' => 'Work Directly with Experts',
  'callout_1_bicolor' => true,
  'callout_1_colored_words' => '2,3',
  'callout_1_body'  => '<p>From a personal consultation to knowledgeable advice, we will give you the attention to detail that you deserve.</p><p>Every element of your car\'s audio system, including the stereo, CD player, subwoofer and amplifiers will be just what you imagined. It will be installed precisely with fabricated elements if needed.</p>',
  'callout_1_link'  => home_url() . '/services/',
  'callout_1_link_text'  => 'Our Services',
  'callout_1_link_new_tab'  => false,
  'callout_1_image'  => ASSETS_URL . 'img/car-stereo.jpg',
  'callout_1_image_position'  => 'right',
  'callout_1_style'  => 'dark',
  // callout 2
  'callout_2_title' => 'Get Only Top Brand Equipment',
  'callout_2_bicolor' => true,
  'callout_2_colored_words' => '2,3,4',
  'callout_2_body'  => '<p>We offer top brand names like JL Audio, Focal and Dynaudio products are offered at competitive prices for both products and installation.</p><p>You\'ll feel confident leaving your car in our capable hands when you see our top-notch facilities and our high-quality completed work.</p>',
  'callout_2_link'  => home_url() . '/products/',
  'callout_2_link_text'  => 'Our Products',
  'callout_2_link_new_tab'  => false,
  'callout_2_image'  => ASSETS_URL . 'img/jl-audio.jpg',
  'callout_2_image_position'  => 'left',
  'callout_2_style'  => 'light',
  // callout 3
  'callout_3_title' => 'Expert Facilities and Technicians',
  'callout_3_bicolor' => true,
  'callout_3_colored_words' => '0',
  'callout_3_body'  => '<p>Tour our facility, which houses a cabinet-grade woodworking facility, composite fabrication equipment and electronic diagnostics.</p><p>We can fabricate custom paneling and mounting brackets, integrate them into your factory wiring and even create factory-like wiring harnesses so that your factory wiring remains true to its original design.</p>',
  'callout_3_link'  => home_url() . '/about-us/',
  'callout_3_link_text'  => 'Learn More About Us',
  'callout_3_link_new_tab'  => false,
  'callout_3_image'  => ASSETS_URL . 'img/boat-audio.jpg',
  'callout_3_image_position'  => 'right',
  'callout_3_style'  => 'dark',
];

function audint_home_callouts_cb( $post ) {
  wp_nonce_field( 'audint_home_callouts_meta', 'audint_home_callouts_meta_nonce' );
  ?>

  <div class="outer">
    <p class="description">Settings for Home page callouts</p>
    <hr>

    <div class="meta-row audint-meta-row" id="audint-meta-home-callouts">
      <div class="meta-td audint-meta-td">

        <?php
          // section heading
          $callouts_heading = audint_get_meta_or_default( $post->ID, 'audint_home_callouts_heading', 'home_callouts', 'heading' );
          $callouts_heading_args = [
            'label' => 'Main Callout Heading',
            'description' => 'Heading text for section containing all 3 callouts.',
            'name'  => 'audint_home_callouts_heading',
            'id'    => 'audint_home_callouts_heading',
            'value' => $callouts_heading,
            'default_value' => audint_get_default( 'home_callouts', 'heading' ),
          ];
          audint_meta_text( $callouts_heading_args );
        ?>

        <?php
          $callout_keys = [ 'callout_1', 'callout_2', 'callout_3' ];
          foreach ($callout_keys as $key) :
          ?>
          <div class="audint-meta-callout-group">
            <h3 class="audint-meta-callout-header">
              <?php echo strtoupper( str_replace( '_', ' ', $key ) ); ?>
            </h3>
          <?php
            $callout_title_value = audint_get_meta_or_default( $post->ID, 'audint_home_' . $key . '_title', 'home_callouts', $key . '_title' );
            $is_callout_bicolor = audint_get_meta_or_default( $post->ID, 'audint_home_' . $key . '_bicolor', 'home_callouts', $key . '_bicolor' );
            $is_callout_bicolor_checked = $is_callout_bicolor ? 'checked' : '';
            $callout_colored_words_value = audint_get_meta_or_default( $post->ID, 'audint_home_' . $key . '_colored_words', 'home_callouts', $key . '_colored_words' );
            // callout 1 body text
            $callout_body_value = audint_get_meta_or_default( $post->ID, 'audint_home_' . $key . '_body', 'home_callouts', $key . '_body' );
            $callout_wp_editor_settings = [
              'media_buttons' => false,
              'drag_drop_upload' => false,
              'textarea_name' => 'audint_home_' . $key . '_body',
              'textarea_rows' => 8,
              'teeny' => true,
            ];
            // callout 1 link
            $callout_link_value = audint_get_meta_or_default( $post->ID, 'audint_home_' . $key . '_link', 'home_callouts', $key . '_link' );
            $callout_link_text_value = audint_get_meta_or_default( $post->ID, 'audint_home_' . $key . '_link_text', 'home_callouts', $key . '_link_text' );
            $callout_link_new_tab_value = audint_get_meta_or_default( $post->ID, 'audint_home_' . $key . '_link_new_tab', 'home_callouts', $key . '_link_new_tab' );
            // callout 1 image
            $callout_image_value = audint_get_meta_or_default( $post->ID, 'audint_home_' . $key . '_image', 'home_callouts', $key . '_image' );
            // callout 1 image position
            $callout_image_position_value = audint_get_meta_or_default( $post->ID, 'audint_home_' . $key . '_image_position', 'home_callouts', $key . '_image_position' );
            // callout 1 style
            $callout_style_value = audint_get_meta_or_default( $post->ID, 'audint_home_' . $key . '_style', 'home_callouts', $key . '_style' );
            $callout_args = [
              // callout title
              'bicolor_title' => [
                'text' => [
                  'label' => 'Callout Title.',
                  'default_value' => audint_get_default( 'home_callouts', $key . '_title' ),
                  'value' => $callout_title_value,
                  'name'  => 'audint_home_' . $key . '_title',
                  'id'  => 'audint_home_' . $key . '_title',
                ],
                'bicolor' => [
                  'label' => '',
                  'description' => 'Use red-colored words on title?',
                  'name'  => 'audint_home_' . $key . '_bicolor',
                  'id'  => 'audint_home_' . $key . '_bicolor',
                  'is_checked'  => $is_callout_bicolor_checked,
                ],
                'words' =>  [
                  'label' => '',
                  'description' => 'Click on the words you want displayed in red.',
                  'name'  => 'audint_home_' . $key . '_colored_words',
                  'id'  => 'audint_home_' . $key . '_colored_words',
                  'value' => $callout_colored_words_value,
                ],
              ],

              // callout text
              'body_text' => [
                'label' => 'Callout Text.',
                'description' => 'Main body of text displayed in the callout box',
                'default_value' => trim( audint_get_default( 'home_callouts', $key . '_body' ) ),
                'value' => $callout_body_value,
                'id'  => 'audint_home_' . $key . '_body',
                'wp_editor_settings'  => $callout_wp_editor_settings,
              ],

              // callout link
              'link_fields' => [
                'label' => 'Link.',
                'description' => 'Settings for the link displayed under the callout text.',
                'url' => [
                  'name'  => 'audint_home_' . $key . '_link',
                  'id'    => 'audint_home_' . $key . '_link',
                  'default_value' => audint_get_default( 'home_callouts', $key . '_link' ),
                  'value' => $callout_link_value,
                  'type'  => 'page',
                ],
                'text'  => [
                  'name'  => 'audint_home_' . $key . '_link_text',
                  'id'  => 'audint_home_' . $key . '_link_text',
                  'default_value'  => audint_get_default( 'home_callouts', $key . '_link_text' ),
                  'value' => $callout_link_text_value,
                ],
                'new_tab'  => [
                  'name'  => 'audint_home_' . $key . '_link_tab',
                  'id'  => 'audint_home_' . $key . '_link_tab',
                  'default_value' => audint_get_default( 'home_callouts', $key . '_link_new_tab' ),
                  'value' => $callout_link_new_tab_value,
                ],
              ],

              // callout image
              'image' => [
                'label' => 'Image.',
                'description' => 'Image to display alongside the text content.',
                'default_value' => audint_get_default( 'home_callouts', $key . '_image' ),
                'name'  => 'audint_home_' . $key . '_image',
                'id'    => 'audint_home_' . $key . '_image',
                'value' => $callout_image_value,
              ],

              // callout layout
              'layout'  => [
                'label' => 'Image Position',
                'input_type'  => 'radio',
                'options'     => [
                  'Left' => [
                    'name'  => 'audint_home_' . $key . '_image_position[]',
                    'id'    => 'audint_home_' . $key . '_image_position_1',
                    'value' => 'left',
                    'is_checked'  => $callout_image_position_value == 'left',
                  ],
                  'Right' => [
                    'name'  => 'audint_home_' . $key . '_image_position[]',
                    'id'    => 'audint_home_' . $key . '_image_position_2',
                    'value' => 'right',
                    'is_checked'  => $callout_image_position_value == 'right',
                  ]
                ],
              ],

              // callout style
              'style' => [
                'label' => 'Color Style',
                'input_type'  => 'radio',
                'options'     => [
                  'Dark' => [
                    'name'  => 'audint_home_' . $key . '_style[]',
                    'id'    => 'audint_home_' . $key . '_style_1',
                    'value' => 'dark',
                    'is_checked'  => $callout_style_value == 'dark',
                  ],
                  'Light' => [
                    'name'  => 'audint_home_' . $key . '_style[]',
                    'id'    => 'audint_home_' . $key . '_style_2',
                    'value' => 'light',
                    'is_checked'  => $callout_style_value == 'light',
                  ]
                ],
              ],
            ];
            audint_meta_callout( $callout_args );
            ?>
            </div><!-- callout 1 fields -->
            <?php
          endforeach;
        ?>

      </div>
    </div>

  </div><!-- outer -->

  <?php
}