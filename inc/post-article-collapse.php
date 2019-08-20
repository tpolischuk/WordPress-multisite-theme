<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="heading-<?php echo sanitize_title_with_dashes(get_the_title()); ?>">
    <h4 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo sanitize_title_with_dashes(get_the_title()); ?>" aria-expanded="true" aria-controls="collapse-<?php echo sanitize_title_with_dashes(get_the_title()); ?>">
        <?php the_title(); ?>
      </a>
      <span class="edit-post"><?php edit_post_link(__('Edit FAQ'), ''); ?></span>
    </h4>
  </div>
  <div id="collapse-<?php echo sanitize_title_with_dashes(get_the_title()); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?php echo sanitize_title_with_dashes(get_the_title()); ?>">
    <div class="panel-body">
      <div class="entry-content">
        <?php the_content(); ?> 
      </div>
    </div>
  </div>
</div>