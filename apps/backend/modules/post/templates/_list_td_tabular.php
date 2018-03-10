<td class="sf_admin_text sf_admin_list_td_image">
  <?php echo get_partial('post/image', array('type' => 'list', 'post' => $post)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_text">
  <?php echo get_partial('post/text', array('type' => 'list', 'post' => $post)) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($post->getCreatedAt()) ? format_date_project($post->getCreatedAt()): '&nbsp;' ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_public">
  <?php echo get_partial('post/list_field_boolean', array('value' => $post->getPublic())) ?>
</td>
