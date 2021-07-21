<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Prato2;

class Prato2Controller extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Prato2::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $pratos = $query->orderBy('id_prato')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'pratos' => $pratos,
            'pagination' => $pagination,
        ]);
    }

}
