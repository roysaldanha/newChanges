<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
 

global $WOOF; 


?>
<script type="text/javascript">

    var hiddenLis  = new Array(); 
    var shownLis  = new Array(); 


    function remove(arr, what) {
        var found = arr.indexOf(what);

        while (found !== -1) {
            arr.splice(found, 1);
            found = arr.indexOf(what);
        }
    }

</script><?php
 
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
                        $WOOF->woof_draw_checkbox_taxonomy($taxonomy_info, $tax_slug, $term['term_id'], $term['childs'], $show_count, $show_count_dynamic, $hide_dynamic_empty_pos, 'YES', 'Y');
                } 
              
        } ?>
    </li>
</ul>

<?php } 


//we need it only here, and keep it in $_REQUEST for using in function for child items
unset($_REQUEST['additional_taxes']);
