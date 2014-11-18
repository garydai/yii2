<?php

class SearchController extends Controller
{
	public $layout='searchpage';

	public $g_area = null;
	public $g_continent = null;
	public $g_company = null;
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	public function actionIndex()
	{



		$area = Area::model()->findAll();
		$continent = Continent::model()->findAll();
		$boat = Boat::model()->findAll();	
		$company = Company::model()->findAll();
		//var_dump($continent);
		$this->g_area = $area;
		$this->g_continent = $continent;
		$company = Company::model()->findAll();	
		$this->g_company = $company;
		$this->render('index', array('area'=>$area, 'continent'=>$continent, 'company'=>$company ));
	}



}
