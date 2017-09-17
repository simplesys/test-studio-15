<?php

namespace app\components\yii\db;

use yii\db\ActiveRecord;

/**
 * Class AppActiveRecord
 * Extention Yii ActiveRecord class
 *
 * @package   app\components\yii\db
 * @author    Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @copyright 2017 Chuvashin Viacheslav
 * @created   14.09.17 09:54
 */
class AppActiveRecord extends ActiveRecord
{
    /**
     * Get dropdown array
     *
     * @param AppActiveRecord $modelClass
     * @param string          $idName
     * @param string          $name
     *
     * @return array
     */
    public static function getDropdownArray(
        AppActiveRecord $modelClass, string $idName = 'id', string $name = 'name'
    ): array {
        $dropdown = [];
        $models = $modelClass->find()->all();

        foreach ($models as $model) {
            $dropdown[$model->$idName] = $model->$name;
        }

        return $dropdown;
    }
}
