<h2>Update Item Sizes</h2>

<p>Please enter a size and then press 'Submit'.</p>

<div class="row">
    <div class="col-md-9">
        <?php
        if (isset($flash)) {
            echo $flash;
        }
        echo "<p style='color: seagreen'>", "Item ID is " . $item_id, "</p>";
        echo validation_errors("<p style='color: red'>", "</p>");
        echo form_open($form_location);
        ?>
        <?php
        echo form_open($form_location);

        echo form_input('item_size', '');
        echo nbs(3);
        echo form_submit('submit', 'Submit');
        echo nbs(3);
        echo form_submit('submit', 'Cancel');
        echo form_close();
        ?>
    </div>


    <div class="col-md-3">
<?php echo Modules::run('store_item_sizes/_display_options_so_far', $item_id);?>
    </div>
</div>
