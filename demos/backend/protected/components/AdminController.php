<?php



class AdminController extends CController
{
    public $pageTitle="后台管理";
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout='application.modules.admin.views.layouts.admin';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu=array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs=array();
    public function actions(){
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),);
    }
    protected function beforeAction($action){

//	var_dump( $action);
//	var_dump(Yii::app()->admin->loginUrl);
        if(Yii::app()->admin->isGuest&&$action->getId()!='login'){
           $this->redirect(Yii::app()->admin->loginUrl);
        }
        return parent::beforeAction($action);
    }
}


?>
