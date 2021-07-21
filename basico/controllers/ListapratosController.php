<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Prato;

class ListapratoController extends Controller
{
    public function actionIndex()
    {
        $query = Prato::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $Pratos = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'Pratos' => $Pratos,
            'pagination' => $pagination,
        ]);
    }
}