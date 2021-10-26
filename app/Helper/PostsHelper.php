<?php
declare(strict_types = 1);
namespace App\Helper;
use WP_Query;
class PostHelper
{
      /**
     * Get posts by the taxonomy
     *
     * @param init $term_id
     *
     * @return array|null
     */
    public static function getGamesByTerm($term_id)
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
             $post_ids[$post_id]=get_the_title();
             endwhile;            
             wp_reset_postdata();
        endif;
        return $post_ids;
    }
}