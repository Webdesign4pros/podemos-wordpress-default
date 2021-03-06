<?php

/**

 * Default Archive Template.

 * Original from BootstrapWP

 * @author Gregor Hartmaier

 * @package WordPress

 * @subpackage Podemos Wordpress Theme

 */

?>

<?php get_header(); ?>

<div class="container main">

     <div class="row headimage">

        <?php if(function_exists('chi_display_header')) { chi_display_header(); } ?>

           <?php

            if (function_exists('bootstrapwp_breadcrumbs')) { 

                bootstrapwp_breadcrumbs();              

            }

            ?>

         </div><!--/.col -->

     </div><!--/.row -->

     <div class="row main-content">

         <div class="col-lg-9 col-md-9 col-sm-9 col-9">     

             <div class="content main">

              <header class="page-title">

                <h1><?php

            if (is_day()) {

                printf(__('Archivos diarios: %s', 'podemos'), '<span>' . get_the_date() . '</span>');

            } elseif (is_month()) {

                printf(

                        __('Archivos mensuales: %s', 'podemos'), '<span>' . get_the_date(_x('F Y', 'formato de fecha de archivos mensuales', 'podemos')) . '</span>'

                );

            } elseif (is_year()) {

                printf(

                        __('Archivos anuales: %s', 'podemos'), '<span>' . get_the_date(_x('Y', 'formato de fecha de archivos anuales', 'podemos')) . '</span>'

                );

            } elseif (is_tag()) {

                printf(__('Archivos de TAGs: %s', 'podemos'), '<span>' . single_tag_title('', false) . '</span>');

                // Show an optional tag description

                $tag_description = tag_description();

                if ($tag_description) {

                    echo apply_filters(

                            'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>'

                    );

                }

            } elseif (is_category()) {

                printf(

                        __('Archivos de la categorías: %s', 'podemos'), '<span>' . single_cat_title('', false) . '</span>'

                );

                // Show an optional category description

                $category_description = category_description();

                if ($category_description) {

                    echo apply_filters(

                            'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>'

                    );

                }

            } else {

                _e('Archivos del blog', 'podemos');

            }

?></h1>

            </header>

            

             <?php

            if (have_posts()) : while (have_posts()) : the_post();

               get_template_part('content', get_post_format());

                endwhile;

            endif;

            if (function_exists('wp_pagenavi')) {

                wp_pagenavi();

            } else {

                bootstrapwp_content_nav('nav-below');

            }

            ?>

         </div> <!-- /.content -->                  

                </div> <!-- /.col -->           

        <div class="col-lg-3 col-md-3 col-sm-3 col-3 sidebar-wrapper">           

            <?php get_sidebar('post'); ?>

        </div><!--/.col -->

     </div> <!--/.row main-content -->

</div><!-- container -->

<?php get_footer(); ?>

        

        