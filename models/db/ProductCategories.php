<?php

namespace app\models\db;

use \app\components\yii\db\AppActiveRecord;

/**
 * Class ProductCategories
 * This is the model class for table "product_categories".
 *
 * @package   app\models\db
 * @author    Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @copyright 2017 Chuvashin Viacheslav
 * @created   14.09.2017 10:26
 *
 * @property integer $id
 * @property string $name
 *
 * @property Items[] $items
 * @property ProductTypes[] $productTypes
 */
class ProductCategories extends AppActiveRecord
{
    /**
     * Get table name
     *
     * @return string
     */
    public static function tableName(): string
    {
        return 'product_categories';
    }

    /**
     * Get rules from validation
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * Get attribute labels
     *
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Название категории',
        ];
    }

    /**
     *
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::className(), ['id_category' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTypes()
    {
        return $this->hasMany(ProductTypes::className(), ['id_category' => 'id']);
    }

    /**
     * Find rows
     *
     * @return \app\models\db\query\ProductCategoriesQuery
     * the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\db\query\ProductCategoriesQuery(get_called_class());
    }
}
