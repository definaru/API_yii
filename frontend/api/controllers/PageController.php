<?php

namespace frontend\api\controllers;

use yii\web\Controller;
use app\models\Catalog;
use app\models\Api;


class PageController extends Controller
{
  
    public function actionError()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return Api::errors();
    }
    
    public function actionOne($id = '', $apiKey = '')
    {
        $model = Index::find()->asArray()->orderBy(['id' => SORT_ASC]);
        $json = ($id == '' || $id == 0) ? $model->all() : $model->where(['id' => $id])->one();
        $x = (Api::errorApi($apiKey) == 0) ? Api::noApi() : $json;
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ($json == '') ? Api::errors() : $x;        
    }
    
    
}
