




<?php if (empty($images)): ?>
    <p>No Images found.</p>
<?php else: ?>
    <table class="list">
        <?php foreach ($images as $image): ?>
            
        <tr>
                
                
                <h3><a href="<?php echo Utils::createLink('detail', array('id' => $image->getId())) ?>"><?php echo Utils::escape($image->getName()); ?></a></h3>
                
                
    </tr>
        <?php endforeach; ?>
    </table>
<?php endif;

