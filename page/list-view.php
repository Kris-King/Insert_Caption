<?php if (empty($images)): ?>



    <p>
        No Images found.
    </p>


<?php else: ?>



    <table class="list">


        <?php foreach ($images as $image): ?>

            <tr>

                <!--
                
                Images submitted by users is displayed 
                here. The images function as links to the details page where 
                users can view other images and captions.
                
                -->


            <a href="<?php echo Utils::createLink('detail', array('id' => $image->getId())) ?>">


                <img src="<?php echo $image->getSource(); ?>"/>


            </a>


        </tr>


    <?php endforeach; ?>


    </table>


<?php endif;