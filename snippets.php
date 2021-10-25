<!-- <?php $images = easy_image_gallery_get_image_ids(); ?>
<?php if($images) : foreach ($images as $attachment_id ):?>
<?php $imagesfull = wp_get_attachment_image_src ($attachment_id, '' ); ?>
<?php $image = wp_get_attachment_image_src ($attachment_id, 'thumb-custom' ); ?>

<a class="popup" rel="fancybox[group]" href="<?php echo $imagefull[0]; ?>">

    <img src="<?php echo $image[0]; ?>">

</a>

<?php endforeach; endif;?> -->