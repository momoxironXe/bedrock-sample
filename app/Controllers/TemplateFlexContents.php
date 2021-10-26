<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateFlexContents extends Controller
{
    
    /**
     * ACF Field Values
     *
     * @var string[]
     */
    protected $acf = [];
    public function getLayouts()
  	{

        $layouts = get_field('flex_contents');
        $data = [];
        if( have_rows('flex_contents') ):
          $this_layout = (object)[];
          while( have_rows('flex_contents') ): the_row();
          $layout= get_row_layout();
          $this_layout->type = $layout;
          if( $layout== 'about_campus_sections'):
              $this_layout->slides = get_sub_field('about_campus_slider');
             endif;
             array_push($data, $this_layout);
      endwhile;
      return $data;

  endif;
  	}
}