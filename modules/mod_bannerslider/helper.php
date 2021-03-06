<?php
/*------------------------------------------------------------------------
# mod_bannerslider - WWM Banner Slideshow
# ------------------------------------------------------------------------
# author    walkswithme.net
# copyright Copyright (C) 2013 walkswithme.net. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.walkswithme.net/
# Technical Support:  Forum - http://www.walkswithme.net/joomla-banner-slideshow-module
-------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class modWalkswithmeBannerSlider

{

	
	public static function &getList(&$params)
	{
		JModelLegacy::addIncludePath(JPATH_ROOT.'/components/com_banners/models', 'BannersModel');
		$document	= JFactory::getDocument();
		$app		= JFactory::getApplication();
		$keywords	= explode(',', $document->getMetaData('keywords'));

		$model = JModelLegacy::getInstance('Banners', 'BannersModel', array('ignore_request' => true));
		$model->setState('filter.client_id', (int) $params->get('cid'));
		$model->setState('filter.category_id', $params->get('catid', array()));
		$model->setState('list.limit', (int) $params->get('count', 1));
		$model->setState('list.start', 0);
		$model->setState('filter.ordering', $params->get('ordering'));
		$model->setState('filter.tag_search', $params->get('tag_search'));
		$model->setState('filter.keywords', $keywords);
		$model->setState('filter.language', $app->getLanguageFilter());

		$banners = $model->getItems();
		$model->impress();

		return $banners;
	}




	






}



?>