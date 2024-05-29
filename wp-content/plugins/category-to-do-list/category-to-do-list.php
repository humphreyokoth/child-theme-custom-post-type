<?php
/**
 * Template Name: To-do List
 * Template Post Type: post
 */

get_header(); ?>

<div class="container">
    <form action="index.php" method="post" class="addTask" id="addForm" name="todoList">
        <div class="row">
            <div class="col-1">
                <input type="checkbox" name="checkbox" id="todo-checkbox" checked />
                <label class="label-1">
                    <h1>My Todo-s</h1>
                </label>
            </div>
            <div class="custom-add">
                <input type="text" class="custom-add-input" id="input-add" name="item" placeholder="Add new.." />
                <i class="fas fa-calendar-alt"></i>
                <button type="submit" class="submit" id="submit" value="submit">Add</button>
            </div>
        </div>
    </form>
    <hr />
    <div class="counter">
        Filter <input type="number" name="filter" id="filter" placeholder="All" />
        Sort <input type="number" name="sort" id="sort" placeholder="Added date" />
        <i class="fas fa-sort-amount-down-alt sort-icon" id="sort-icon"></i>
    </div>
    <div class="container-list">
        <div class="list" id="list">
            <ul class="list-li" id="task">
                <?php
                // Get the category ID for "To-do List"
                $category_id = get_cat_ID('To-do List');

                // Create a new query to retrieve posts from the "To-do List" category
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1, // Show all posts
                    'category__in' => array($category_id),
                );

                $to_do_list_query = new WP_Query($args);

                if ($to_do_list_query->have_posts()) :
                    while ($to_do_list_query->have_posts()) : $to_do_list_query->the_post();
                ?>
                        <li>
                            <input type="checkbox" name="checkbox" id="list-1" />
                            <label class="label-2"><?php the_title(); ?></label>
                            <div class="label-date">
                                <i class="fa-regular fa-hourglass-half icon"></i>
                                <input class="date input-icons" type="date" name="date" value="<?php echo get_the_date('d-m-Y'); ?>" />
                            </div>
                        </li>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No posts found in the "To-do List" category.</p>';
                endif;
                ?>
            </ul>
        </div>
    </div>
</div>

<?php get_footer(); ?>