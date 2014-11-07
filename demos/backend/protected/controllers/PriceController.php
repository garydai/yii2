<?php

class PriceController extends AdminController
{
	public $layout='column1';

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}


        public function actionIndex()
        {

                $priceId =  intval($_GET['priceId']) ? intval($_GET['priceId']) : '';
                if(!$priceId) exit();

		$price = Price::model()->find('id=:id', array(':id'=>$priceId));

                $this->render('index',array('price'=>$price));

	
        }

        public function actionModify()
        {


                $priceId =  intval($_GET['priceId']) ? intval($_GET['priceId']) : '';
                if(!$priceId) exit();

        //      header("Content-Type: text/html;charset=utf-8");
                //$model = new Route;
                $price = Price::model()->find('id=:id', array(':id'=>$priceId));

                $this->render('modify',array('price'=>$price));


        }





 

        public function actionAdd()
        {
		

	//	echo 1;
                $routeId =  intval($_GET['routeId']) ? intval($_GET['routeId']) : '';
                if(!$routeId) exit();

		
		$this->render('add', array('route_id'=>$routeId));
		
		
	}
        public function actionSaveInfo()
        {




		$a = 1000000000;
		if($_POST['basic_neicang1']!= NULL && $a > (int)$_POST['basic_neicang1'])
		{
			$a = (int)$_POST['basic_neicang1'];
		}
                if($_POST['classic_neicang1']!= NULL && $a > (int)$_POST['classic_neicang1'])
                {
                        $a = (int)$_POST['classic_neicang1'];
                }
                if($_POST['basic_haijing1']!= NULL && $a > (int)$_POST['basic_haijing1'])
                {
                        $a = (int)$_POST['basic_haijing1'];
                }
                if($_POST['classic_haijing1']!= NULL && $a > (int)$_POST['basic_haijing1'])
                {
                        $a = (int)$_POST['classic_haijing1'];
                }
                if($_POST['basic_yangtai1']!= NULL && $a > (int)$_POST['basic_yangtai1'])
                {
                        $a = (int)$_POST['basic_yangtai1'];
                }
                if($_POST['classic_yangtai1']!= NULL && $a > (int)$_POST['classic_yangtai1'])
                {
                        $a = (int)$_POST['classic_yangtai1'];
                }
                if($_POST['basic_taofang1']!= NULL && $a > (int)$_POST['basic_taofang1'])
                {
                        $a = (int)$_POST['basic_taofang1'];
                }
                if($_POST['classic_taofang1']!= NULL && $a > (int)$_POST['classic_taofang1'])
                {
                        $a = (int)$_POST['classic_taofang1'];
		}


		
		
		$a1 = $_POST['basic_neicang1'].','.$_POST['basic_neicang2'].','.$_POST['basic_neicang3'];
                $a2 = $_POST['classic_neicang1'].','.$_POST['classic_neicang2'].','.$_POST['classic_neicang3'];

                $b1 = $_POST['basic_haijing1'].','.$_POST['basic_haijing2'].','.$_POST['basic_haijing3'];
                $b2 = $_POST['classic_haijing1'].','.$_POST['classic_haijing2'].','.$_POST['classic_haijing3'];

                $c1 = $_POST['basic_yangtai1'].','.$_POST['basic_yangtai2'].','.$_POST['basic_yangtai3'];
                $c2 = $_POST['classic_yangtai1'].','.$_POST['classic_yangtai2'].','.$_POST['classic_yangtai3'];


                $d1 = $_POST['basic_taofang1'].','.$_POST['basic_taofang2'].','.$_POST['basic_taofang3'];
                $d2 = $_POST['classic_taofang1'].','.$_POST['classic_taofang2'].','.$_POST['classic_taofang3'];




		$var = explode(',', $_POST['id']);
		$id = $var[0];
		$route_id = $var[1];
//		echo $route_id;
//		echo $a;
		if($a != 1000000000)	
			Route::model()->updateByPk($route_id, array('price'=>$a));

	        Price::model()->updateByPk($id, array('basic_neicang'=>$a1, 'classic_neicang'=>$a2, 'basic_haijing'=>$b1, 'classic_haijing'=>$b2, 

		'basic_yangtai'=>$c1, 'classic_yangtai'=>$c2, 'basic_taofang'=>$d1, 'classic_taofang'=>$d2));

		
                $this->redirect(Yii::app()->request->urlReferrer);

        }



        public function actionAddInfo()
        {

                $routeId =  intval($_POST['route_id']) ? intval($_POST['route_id']) : '';
                if(!$routeId) exit();



                $a = 1000000000;
                if($_POST['basic_neicang1']!= NULL && $a > (int)$_POST['basic_neicang1'])
                {
                        $a = (int)$_POST['basic_neicang1'];
                }
                if($_POST['classic_neicang1']!= NULL && $a > (int)$_POST['classic_neicang1'])
                {
                        $a = (int)$_POST['classic_neicang1'];
                }
                if($_POST['basic_haijing1']!= NULL && $a > (int)$_POST['basic_haijing1'])
                {
                        $a = (int)$_POST['basic_haijing1'];
                }
                if($_POST['classic_haijing1']!= NULL && $a > (int)$_POST['basic_haijing1'])
                {
                        $a = (int)$_POST['classic_haijing1'];
                }
                if($_POST['basic_yangtai1']!= NULL && $a > (int)$_POST['basic_yangtai1'])
                {
                        $a = (int)$_POST['basic_yangtai1'];
                }
                if($_POST['classic_yangtai1']!= NULL && $a > (int)$_POST['classic_yangtai1'])
                {
                        $a = (int)$_POST['classic_yangtai1'];
                }
                if($_POST['basic_taofang1']!= NULL && $a > (int)$_POST['basic_taofang1'])
                {
                        $a = (int)$_POST['basic_taofang1'];
                }
                if($_POST['classic_taofang1']!= NULL && $a > (int)$_POST['classic_taofang1'])
                {
                        $a = (int)$_POST['classic_taofang1'];
                }




                $a1 = $_POST['basic_neicang1'].','.$_POST['basic_neicang2'].','.$_POST['basic_neicang3'];
                $a2 = $_POST['classic_neicang1'].','.$_POST['classic_neicang2'].','.$_POST['classic_neicang3'];

                $b1 = $_POST['basic_haijing1'].','.$_POST['basic_haijing2'].','.$_POST['basic_haijing3'];
                $b2 = $_POST['classic_haijing1'].','.$_POST['classic_haijing2'].','.$_POST['classic_haijing3'];

                $c1 = $_POST['basic_yangtai1'].','.$_POST['basic_yangtai2'].','.$_POST['basic_yangtai3'];
                $c2 = $_POST['classic_yangtai1'].','.$_POST['classic_yangtai2'].','.$_POST['classic_yangtai3'];


                $d1 = $_POST['basic_taofang1'].','.$_POST['basic_taofang2'].','.$_POST['basic_taofang3'];
                $d2 = $_POST['classic_taofang1'].','.$_POST['classic_taofang2'].','.$_POST['classic_taofang3'];





                $price = new Price;
                $price->basic_neicang = $a1;
                $price->classic_neicang = $a2;
                $price->basic_haijing = $b1;
                $price->classic_haijing = $b2;
                $price->basic_yangtai = $c1;
                $price->classic_yangtai = $c2;
                $price->basic_taofang = $d1;
                $price->classic_taofang = $d2;
		$price->route_id = $routeId;
                $ret = $price->save();



		


		if($ret >0)
			Route::model()->updateByPk($routeId, array('price_id'=>$price->id));

                if($a != 1000000000)
                        Route::model()->updateByPk($routeId, array('price'=>$a));



                $this->redirect(Yii::app()->request->urlReferrer);

	}
	

}
