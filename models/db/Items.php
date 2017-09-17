<?php

namespace app\models\db;

/**
 * Class Items
 * This is the model class for table "items".
 *
 * @package   app\models\db
 * @author    Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @copyright 2017 Chuvashin Viacheslav
 * @created   14.09.2017 10:40
 *
 * @property integer $id
 * @property integer $id_category
 * @property integer $id_product_type
 * @property integer $quantity
 * @property integer $id_provider
 * @property string $date_delivery
 * @property string $price
 *
 * @property ProductCategories $idCategory
 * @property ProductTypes $idProductType
 * @property Providers $idProvider
 */
class Items extends \app\components\yii\db\AppActiveRecord
{
    /**
     * Get table name
     *
     * @return string
     */
    public static function tableName(): string
    {
        return 'items';
    }

    /**
     * Get rules from validation
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            [
                [
                    'id_category', 'id_product_type', 'quantity', 'id_provider'
                ], 'integer'
            ],
            [['id_product_type', 'id_provider', 'date_delivery'], 'required'],
            [['date_delivery'], 'safe'],
            [['price'], 'number'],
            [
                ['id_category'], 'exist', 'skipOnError' => true,
                'targetClass' => ProductCategories::className(),
                'targetAttribute' => ['id_category' => 'id']
            ],
            [
                ['id_product_type'], 'exist', 'skipOnError' => true,
                'targetClass' => ProductTypes::className(),
                'targetAttribute' => ['id_product_type' => 'id']
            ],
            [
                ['id_provider'], 'exist', 'skipOnError' => true,
                'targetClass' => Providers::className(),
                'targetAttribute' => ['id_provider' => 'id']
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
            'id_product_type' => 'Тип товара',
            'quantity' => 'Количество',
            'id_provider' => 'Поставщик',
            'date_delivery' => 'Дата поставки',
            'price' => 'Цена',
            'categoryName' => 'Категория',
            'productTypeName' => 'Название товара',
            'providerName' => 'Поставщик',
        ];
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
     * @return string
     */
    public function getCategoryName()
    {
        return $this->category->name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductType()
    {
        return $this->hasOne(ProductTypes::className(), ['id' => 'id_product_type']);
    }

    /**
     * @return string
     */
    public function getProductTypeName()
    {
        return $this->productType->name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvider()
    {
        return $this->hasOne(Providers::className(), ['id' => 'id_provider']);
    }

    /**
     * @return string
     */
    public function getProviderName()
    {
        return $this->provider->name;
    }

    /**
     * Find rows
     *
     * @return \app\models\db\query\ItemsQuery
     * the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\db\query\ItemsQuery(get_called_class());
    }
}
