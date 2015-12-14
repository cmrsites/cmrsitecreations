<h2><?php echo $headline; ?></h2>

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
        <table class="table table-striped">
            <tr>
                <td valign="top">Item Name</td>
                <td><?php echo form_input('item_name', $item_name); ?></td>
            </tr>
            <tr>
                <td valign="top">Item Price</td>
                <td><?php echo form_input('item_price', $item_price); ?></td>
            </tr>
            <tr>
                <td valign="top">Item Description</td>
                <td><?php echo form_textarea('item_description', $item_description); ?></td>
            </tr>
            <tr>
                <td valign="top">&nbsp;</td>
                <td><?php echo form_submit('submit', 'Submit'); ?></td>
            </tr>
            <?php
            echo form_close();
            ?>
        </table>
    </div>


    <div class="col-md-3">
        <?php
        if ($item_id > 0) {
            //We are editing an item
            include('additional_options.php');

        }
        ?>
    </div>
</div>




