<?php
// use $configuration_group_id where needed

// For Admin Pages

$zc150 = (PROJECT_VERSION_MAJOR > 1 || (PROJECT_VERSION_MAJOR == 1 && substr(PROJECT_VERSION_MINOR, 0, 3) >= 5));
if ($zc150) { // continue Zen Cart 1.5.0
    $admin_page = 'configCatDescReadmore';
  // delete configuration menu
  $db->Execute("DELETE FROM ".TABLE_ADMIN_PAGES." WHERE page_key = '".$admin_page."' LIMIT 1;");
  // add configuration menu
  if (!zen_page_key_exists($admin_page)) {
    if ((int)$configuration_group_id > 0) {
      zen_register_admin_page($admin_page,
                              'BOX_CAT_DESC_READMORE', 
                              'FILENAME_CONFIGURATION',
                              'gID=' . $configuration_group_id, 
                              'configuration', 
                              'Y',
                              $configuration_group_id);
        
      $messageStack->add('Enabled Categories Read More Description Configuration Menu.', 'success');
    }
  }
}
/* If your checking for a field
 * global $sniffer;
 * if (!$sniffer->field_exists(TABLE_SOMETHING, 'column'))  $db->Execute("ALTER TABLE " . TABLE_SOMETHING . "ADD column varchar(32) NOT NULL DEFAULT 'both';");
 */
/*
 * For adding a configuration value
 * $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_group_id, configuration_key, configuration_title, configuration_value, configuration_description, set_function) VALUES (" . (int) $configuration_group_id . ", 'CONFIGURATION_KEY', 'This a configuration value name', 'true', 'This is the description of the configuration value', 'zen_cfg_select_option(array(\'true\', \'false\'),');");
 */

$db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_group_id, configuration_key, configuration_title, configuration_value, configuration_description, set_function) VALUES (" . (int) $configuration_group_id . ", 'CAT_DESC_READMORE_ENABLED', 'Enable Module', 'False', 'Enable Categories Read More Description?', 'zen_cfg_select_option(array(\'True\', \'False\'),');");
$db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_group_id, configuration_key, configuration_title, configuration_value, configuration_description, set_function) VALUES (" . (int) $configuration_group_id . ", 'CAT_DESC_READMORE_LENGTH', 'Length of Description', '400', 'Length of Category Description Text', '');");
$db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_group_id, configuration_key, configuration_title, configuration_value, configuration_description, set_function) VALUES (" . (int) $configuration_group_id . ", 'CAT_DESC_READMORE_ELLIPSES', 'Ellipses Text', '...', 'The text at the end of shortened text (default: ...)', '');");
$db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_group_id, configuration_key, configuration_title, configuration_value, configuration_description, set_function) VALUES (" . (int) $configuration_group_id . ", 'CAT_DESC_READMORE_MORE_TEXT', 'More Text', 'More', 'The text at the end of the description to click to read more (default: More)', '');");
$db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_group_id, configuration_key, configuration_title, configuration_value, configuration_description, set_function) VALUES (" . (int) $configuration_group_id . ", 'CAT_DESC_READMORE_LESS_TEXT', 'Less Text', 'Less', 'The text at the end of the description to click to read more (default: Less)', '');");