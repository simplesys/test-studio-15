<?php

namespace app\models\db;

/**
 * Class ProductTypes
 * This is the model class for table "product_types".
 *
 * @package   app\models\db
 * @author    Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @copyright 2017 Chuvashin Viacheslav
 * @created   14.09.2017 10:30
 *
 * @property integer $id
 * @property integer $id_category
 * @property string $name
 *
 * @property Items[] $items
 * @property ProductCategories $category
 */
class ProductTypes extends \app\components\yii\db\AppActiveRecord
{
    /**
     * Get table name
     *
     * @return string
     */
    public static function tableName(): string
    {
        return 'product_types';
    }

    /**
     * Get rules from validation
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            [['id_category'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [
                ['id_category'], 'exist', 'skipOnError' => true,
                'targetClass' => ProductCategories::className(),
                'targetAttribute' => ['id_category' => 'id']
            ],
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
            'id' => 'ID товара',
            'id_category' => 'Категория',
            'name' => 'Название товара',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::className(), ['id_product_type' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(
            ProductCategories::className(), ['id' => 'id_category']
        );
    }

    /**
     * Find rows
     *
     * @return \app\models\db\query\ProductTypesQuery
     * the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\db\query\ProductTypesQuery(get_called_class());
    }
}
