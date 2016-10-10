<?php
            // echo '<div>';
            $block_title = get_sub_field('block_title');
            $block_title_link = get_sub_field('block_title_link');
            $block_title_style = get_sub_field('block_title_style');
            if ($block_title) {
                switch ($block_title_style) {
                    case 'h1':
                        echo '<h1 class="block-title">';
                        echo $block_title_link ? '<span class="glyphicon glyphicon-list-alt"></span> <a href="' . $block_title_link . '">' . $block_title . '</a>' : $block_title;
                        echo '</h1>';
                        break;
                    
                    case 'h2':
                        echo '<h2 class="block-title">';
                        echo $block_title_link ? '<span class="glyphicon glyphicon-list-alt"></span> <a href="' . $block_title_link . '">' . $block_title . '</a>' : $block_title;
                        echo '</h2>';
                        break;
                    
                    case 'h3':
                        echo '<h3 class="block-title">';
                        echo $block_title_link ? '<span class="glyphicon glyphicon-list-alt"></span> <a href="' . $block_title_link . '">' . $block_title . '</a>' : $block_title;
                        echo '</h3>';
                        break;
                    
                    case 'h4':
                        echo '<h4 class="block-title">';
                        echo $block_title_link ? '<span class="glyphicon glyphicon-list-alt"></span> <a href="' . $block_title_link . '">' . $block_title . '</a>' : $block_title;
                        echo '</h4>';
                        break;
                    
                    default:
                        echo '<h1 class="block-title">';
                        echo $block_title_link ? '<span class="glyphicon glyphicon-list-alt"></span> <a href="' . $block_title_link . '">' . $block_title . '</a>' : $block_title;
                        echo '</h1>';
                        break;
                }
            }

            $posts_source = get_sub_field("posts_source");
            switch ($posts_source) {
                case 'pick_post_type':
                    // echo '<h2>Posts from category picker</h2>';
                    get_template_part('templates/builder-elements/post-picker-module-elements/picked-post-type' );
                    break;
                
                case 'pick_from_category':
                    // echo '<h2>Posts from category picker</h2>';
                    get_template_part('templates/builder-elements/post-picker-module-elements/picked-from-category' );
                    break;
                
                case 'custom_post_picker':
                    // echo '<h2>Posts from custom post picker</h2>';
                    get_template_part('templates/builder-elements/post-picker-module-elements/custom-post-picker' );
                    break;
                
                case 'parent_page':
                    // echo '<h2>Posts from custom post picker</h2>';
                    get_template_part('templates/builder-elements/post-picker-module-elements/picked-from-parent-page' );
                    break;
                
                default:
                    echo 'nemam pojma';
                    break;
            }

            // echo '</div>';
 ?>