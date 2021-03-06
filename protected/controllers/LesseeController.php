<?php

class LesseeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            $lessee=new Lessee();
            $user=new User();
            
            $user->save();
            $lessee->userID = $user->id;
            $lessee->user = $user;
            
            if(isset($_POST['Lessee'], $_POST['User']))     // should redirect to update?
            {
                // populate input data to $lessee and $user
                $lessee->attributes=$_POST['Lessee'];
                $user->attributes=$_POST['User'];
                $user->role = Role::model()->findByAttributes(array('roleName'=>'USER'))->primaryKey;
//                if($lessee->servCenter)
//                    {$lessee->servCenterID = $lessee->servCenter->primaryKey ?: null;}
                    
                // validate BOTH $a and $user
                $valid=$lessee->validate();
                $valid=$user->validate() && $valid;

                if($valid)
                {
                    $lessee->user->password = crypt($lessee->user->password);
                    
                    // use false parameter to disable validation
                    $lessee->save(false);
                    $user->save(false);
                    $this->redirect(array('view','id'=>$lessee->userID));
                }
            }

            $this->render('create', array(
                'lessee'=>$lessee,
                'user'=>$user,
            ));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
                if (Role::model()->findByPk(Yii::app()->user->getId())->roleName == 'USER')
                {$id = Yii::app()->user->getId(); }
                
                $user=  User::model()->findByPk($id);
		$lessee=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($lessee);

            if(isset($_POST['Lessee'], $_POST['User']))
            {
                // populate input data to $a and $user
                $lessee->attributes=$_POST['Lessee'];
                $user->attributes=$_POST['User'];
                $user->role = Role::model()->findByAttributes(array('roleName'=>'USER'))->primaryKey;
//                $lessee->servCenterID = $_POST['servCenterID'];
                
                // validate BOTH $a and $user
                $valid=$lessee->validate();
                $valid=$user->validate() && $valid;

                if($valid)
                {
                    // use false parameter to disable validation
                    $lessee->save(false);
                    $user->save(false);
                    $this->redirect(array('view','id'=>$lessee->userID));
                }
            }

		$this->render('update',array(
			'lessee'=>$lessee, 'user'=> $user
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
                User::model()->findByPk($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Lessee');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Lessee('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Lessee']))
			$model->attributes=$_GET['Lessee'];
                
                $user = new User('search');
                $user->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$user->attributes=$_GET['User'];
                
		$this->render('admin',array(
			'model'=>$model,
                        'user' =>$user,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Lessee the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Lessee::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Lessee $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='lessee-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
