<?php if (empty($captions)): ?>



    <p>
        No Captions found.
    </p>


<?php else: ?>



    <table>

        <img src="<?php echo $image->getSource(); ?>"/>

        <?php foreach ($captions as $caption): ?>

            <tr>

                <!--
                
                
                
                -->



                

            <h3><?php echo$caption->getText() . "<br/><br/><br/>"; ?></h3>
            
            







        </tr>


    <?php endforeach; ?>

        
    </table>

    <form name="addCaption" method="post" action="http://localhost/InsertCaption/web/index.php?page=detail">
            
        <p>Add Caption</p>
        
            <input id="add_caption" type="text" name="addcaption"/>
            
            <input type="submit" value="Submit" />
            
        </form>

<?php endif;
