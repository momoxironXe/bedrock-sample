<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class TemplateLife extends Controller
{
    
    /**
     * ACF Field Values
     *
     * @var string[]
     */
    protected $acf = [];
    public function  getLayouts()
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

      /**
     * Get posts by the taxonomy
     *
     * @param init $term_id
     *
     * @return array|null
     */
    public static function getGamesByTerm($term_id=null)
    {
        if (!$term_id) {
            return '';
        }
        $post_ids=[];
        $args = array(
            'post_type' => 'game',
            'posts_per_page' => -1,
            'post_status' => array('publish'),    
            'tax_query' => array(
                array(
                'taxonomy' => 'game-cat',
                'field' => 'term_id',
                'terms' => $term_id
                 )
              )
            );
            $the_query =  new WP_Query( $args );
        if ( $the_query->have_posts() ) : 
             while ( $the_query->have_posts() ) : $the_query->the_post();
             $post_id=get_the_ID();
             $slug = get_post_field( 'post_name', $post_id);
             $post_ids[$post_id]=array(
                 'slug'=>$slug,
                 'name'=>get_the_title()
             );
             endwhile;            
             wp_reset_postdata();
        endif;
        return $post_ids;
    }
    public static function getStudentActivity($post_id)
    {
        if (!$post_id) {
          $post_id=get_the_ID();
        }
        
  
    }
}