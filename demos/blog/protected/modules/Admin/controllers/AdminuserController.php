<?php



class AdminuserController extends Controller
{
    public function actionIndex()
    {

        $this->render('index');
    }
    public function actionLogin()
    {
        $model=new LoginForm;
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];//将用户输入块赋值给AdminLoginForm的实例
            if($r = $model->validate())
            {
		
		 $this->redirect('/');
                // form inputs are valid, do something here
               // $this->actionIndex();//若登陆成功则显示首页
               // $this->renderPartial('login',array('model'=>$model));
                return;
            }
        }
        $this->renderPartial('login',array('model'=>$model));
    }


    public function actionLogout(){
        Yii::app()->admin->logout();
        $this->actionLogin();
    }
}



?>
