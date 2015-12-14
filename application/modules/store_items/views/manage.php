<p>Manage Your Items</p>

<?php
if (isset($flash)){
    echo $flash;
}
?>
<?php echo anchor('store_items/create', 'Create New Item'); ?>

<br><br>

<?php echo Modules::run('store_items/_display_items_table'); ?>
