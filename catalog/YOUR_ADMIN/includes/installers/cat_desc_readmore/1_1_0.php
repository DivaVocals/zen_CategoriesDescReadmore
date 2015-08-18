<?php
// use $configuration_group_id where needed
$db->Execute("DELETE FROM ".TABLE_CONFIGURATION." WHERE configuration_key='CAT_DESC_READMORE_ELLIPSES'");
$db->Execute("DELETE FROM ".TABLE_CONFIGURATION." WHERE configuration_key='CAT_DESC_READMORE_LENGTH'");


$db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_group_id, configuration_key, configuration_title, configuration_value, configuration_description, set_function) VALUES (" . (int) $configuration_group_id . ", 'CAT_DESC_READMORE_HEIGHT', 'Height of Read Less', '50px', 'The height of the div when it is shrunk', '');");
$db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_group_id, configuration_key, configuration_title, configuration_value, configuration_description, set_function) VALUES (" . (int) $configuration_group_id . ", 'CAT_DESC_READMORE_LESS_DIV', 'Categories Description Div', 'categoryDescription', 'The id value of the categories description div (default: categoryDescription)', '');");