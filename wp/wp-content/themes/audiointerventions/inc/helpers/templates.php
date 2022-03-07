<?php
/**
 * Utility functions to use in templates
 */

function audint_display_bicolor_text( $text, $is_bicolor, $colored_words ) {
  $output = '';

  if ( $is_bicolor ) :
    $words = explode( ' ', $text );
    $colored_words_arr = explode( ',', $colored_words );
    $words_index = 0;

    foreach( $words as $word ) :
      if ( in_array( $words_index, $colored_words_arr, false ) ) :
        $output .= '<span class="color-primary">' . $word . ' </span>';
      else :
      $output .= $word . ' ';
      endif;
      $words_index++;
    endforeach;
  else:
    $output .= $text;
  endif;

  return $output;
}
