<?php
/**
 *  1_1_2.php
 *
 * @package
 * @copyright Copyright 2003-2012 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version GIT: $Id: Author: bislewl  8/27/2015 8:56 PM Modified in zen_CategoriesDescReadmore
 */

$db->Execute("DELETE FROM ".TABLE_CONFIGURATION." WHERE configuration_key='CAT_DESC_READMORE_HEIGHT'");
$db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_group_id, configuration_key, configuration_title, configuration_value, configuration_description, set_function) VALUES (" . (int) $configuration_group_id . ", 'CAT_DESC_READMORE_WORDS', 'Length of word to read less', '45', 'The line with the X word will be the last line shown', '');");