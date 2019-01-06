<?php

namespace frontend\api\controllers;

use yii\web\Controller;
use app\models\Catalog;


class PageController extends Controller
{
    
    
    public function actionIndex($id = '') 
    { 
        $json = Catalog::find()->asArray()->where(['id' => $id])->one();
        //\Yii::$app->response->format = Response::FORMAT_JSON;
        $items = json_encode($json);
        return $this->render('index', ['items' => $items, 'id' => $id]);
    } 
    
    
}
