<?php
/**
 * Smarty plugin
 *
 * @package Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {join} function plugin
 *
 * Type:     function<br>
 * Name:     join<br>
 * Date:     Jun 27, 2013<br>
 * Purpose:  join values<br>
 * Params:
 
 * Examples:<br>
 * <pre>
 * {join array=array glue=""}
 * </pre>
 *
 * @link http://www.smarty.net/manual/en/language.function.cycle.php {cycle}
 *       (Smarty online manual)
 * @author Alisson <chiquitto@gmail.com>
 * @version  1.0
 * @param array                    $params   parameters
 * @param Smarty_Internal_Template $template template object
 * @return string|null
 */

function smarty_function_join($params, $template)
{
    return join($params['glue'], $params['array']);
}

?>