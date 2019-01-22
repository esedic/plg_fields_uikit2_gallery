<?php
/**
 * Custom Fields - Vimeo plugin for Joomla
 *
 * @author Joomill (info@joomill-extensions.com)
 * @copyright Copyright (c) 2017 Joomill
 * @license GNU Public License
 * @link https://www.joomill-extensions.com/
 */

defined('_JEXEC') or die;

class plgFieldsGalleryInstallerScript
{
	public function install($parent)
	{

		JFactory::getDBO();
	
		// enable extension if not enabled
		$query = $db->getQuery(true)
			->update($db->quoteName('#__extensions'))
			->set($db->quoteName('enabled') . ' = 1')
			->where($db->quoteName('type') . ' = ' . $db->quote('plugin'))
			->where($db->quoteName('element') . ' = ' . $db->quote('gallery'));

		try
		{
			$db->setQuery($query)->execute();
		}
		catch (Exception $e)
		{
			echo JText::sprintf('JLIB_DATABASE_ERROR_FUNCTION_FAILED', $e->getCode(), $e->getMessage()) . '<br />';

			return;
		}
		// set access level if access level is wrong
		$query = $db->getQuery(true)
			->update($db->quoteName('#__fields'))
			->set($db->quoteName('access') . ' = 1')
			->where($db->quoteName('type') . ' = ' . $db->quote('gallery'));

		try
		{
			$db->setQuery($query)->execute();
		}
		catch (Exception $e)
		{
			echo JText::sprintf('JLIB_DATABASE_ERROR_FUNCTION_FAILED', $e->getCode(), $e->getMessage()) . '<br />';

			return;
		}
	}
}