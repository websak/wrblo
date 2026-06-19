<?php
$id = 'call-to-action-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-call-to-action';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
$card = get_field("card");

?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
  <div class="edgtf-container">
    <div class="edgtf-container-inner">
      <div class="row">
        <div class="col">
          <h2>I want to support</h2>
        </div>
        <div class="col">
          <a href="/contact-us" class="btn" target="_blank">Register</a>
        </div>
      </div>
    </div>
  </div>
</section>