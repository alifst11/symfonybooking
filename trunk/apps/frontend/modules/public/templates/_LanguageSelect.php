<p><?php echo __('Language') ?></p>

<?php echo link_to(image_tag('eng_lang.png'), @change_culture, array("language"=>"en", "redirect"=>$sf_request->getUri())) ?>
 <- <?php echo link_to(__('English'), @change_culture, array("language"=>"en", "redirect"=>$sf_request->getUri())) ?><br>

<?php echo link_to(image_tag('cro_lang.png'), @change_culture, array("language"=>"hr", "redirect"=>$sf_request->getUri())) ?>
 <- <?php echo link_to( __('Croatian'), @change_culture, array("language"=>"hr", "redirect"=>$sf_request->getUri())) ?><br>