<?php

/**
 * Landing page widgets
 */

  $widget = $vars['entity'];

  $num_items = $widget->num_items;
  if ( !isset($num_items) ) $num_items = 5;

  $widget_groups = $widget->widget_groups;
  if ( !isset($widget_groups) ) $widget_groups = ELGG_ENTITIES_ANY_VALUE;

  $widget_title = $widget->widget_title;
  $widget_tags = $widget->widget_tags;
  $widget_tag_logic = $widget->widget_tag_logic;
?>
<p>
  <?php echo elgg_echo('widget_manager:widgets:edit:custom_title'); ?>:
  <?php
    echo elgg_view('input/text', array(
      'name' => 'params[widget_title]',                       
      'value' => $widget_title
    ));
  ?>
</p>
<p>
  <?php echo elgg_echo('groups'); ?>: 
  <?php
    $groups = elgg_get_entities(array('type' => 'group', 'limit' => 0));
    $group_list = array();
    $group_list[0] = elgg_echo('custom_index_widgets:widget_all_groups');
    if ($groups) {
      foreach ($groups as $group) {
        $group_list[$group->getGUID()] = $group->name;
      }
    }
    echo elgg_view('input/dropdown', array('name' => 'params[widget_groups]', 'options_values' => $group_list, 'value' => $widget_groups, 'multiple' => true, 'style' => 'width: 100%; display: block;'));
  ?>
</p>
<p>
  <?php echo elgg_echo('tags'); ?>:
  <?php
    echo elgg_view('input/text', array(
      'name' => 'params[widget_tags]',                       
      'value' => $widget_tags
    ));
  ?>
</p>
<p>
  <?php echo elgg_echo('Tag Logic'); ?>: 
  <?php
    echo elgg_view('input/dropdown', array('name' => 'params[widget_tag_logic]', 'options_values' => array('or' => 'OR', 'and' => 'AND'), 'value' => $widget_tag_logic));
  ?>
</p>
<p>
  <?php echo elgg_echo('widget:numbertodisplay'); ?>:
  <?php
    echo elgg_view('input/dropdown', array('name' => 'params[num_items]', 'options_values' => array('1' => '1', '3' => '3', '5' => '5', '8' => '8', '10' => '10', '12' => '12', '15' => '15', '20' => '20', '30' => '30', '40' => '40', '50' => '50', '100' => '100', ), 'value' => $num_items));
  ?>
</p>
