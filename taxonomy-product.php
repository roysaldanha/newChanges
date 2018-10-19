<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
 

global $post;

global $WOOF;
$product_cats = wp_get_post_terms( $post->ID, 'product_cat' ); 

$new_cats =  array();
foreach ($product_cats as $k => $product_cat) {
    $new_cats[] = $product_cat->slug;
}  
 
$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) ); 

if (!empty($terms) AND is_array($terms)){  ?>
<ul class="tree">
    <?php foreach ($terms as $term) { 
        $inique_id = uniqid();   ?>
            <li id="boomBoom">
                <?php if(!empty($term['childs'])) { ?>
                    <a href="javascript: void(0);" class="expand_button poof_is_opened" id="expand_button_<?php echo $term['term_id']; ?>">-</a>
                    <?php } ?>
                <a href="<?php echo $shop_page_url; ?>?swoof=1&product_cat=<?php echo $term['slug']; ?>"><?php echo $term['name']; ?></a>
                <?php if (!empty($term['childs'])) {
                        $WOOF->woof_draw_checkbox_taxonomy_product($taxonomy_info, $new_cats[0], $term['term_id'], $term['childs'], $show_count, $show_count_dynamic, $hide_dynamic_empty_pos, 'YES','Y');
                } 
              
        } ?>
    </li>
</ul>

<?php } 


//we need it only here, and keep it in $_REQUEST for using in function for child items
unset($_REQUEST['additional_taxes']);
