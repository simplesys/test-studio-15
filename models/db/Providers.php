<?php

namespace app\models\db;

/**
 * Class Providers
 * This is the model class for table "providers".
 *
 * @package   app\models\db
 * @author    Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @copyright 2017 Chuvashin Viacheslav
 * @created   14.09.2017 10:34
 *
 * @property integer $id
 * @property string $name
 * @property integer $inn
 * @property integer $kpp
 * @property string $address
 * @property integer $phone
 *
 * @property Items[] $items
 */
class Providers extends \app\components\yii\db\AppActiveRecord
{
    /**
     * Get table name
     *
     * @return string
     */
    public static function tableName(): string
    {
        return 'providers';
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
            [['inn', 'kpp', 'phone'], 'integer'],
            [['address'], 'string'],
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
            'name' => 'Название',
            'inn' => 'ИНН',
            'kpp' => 'КПП',
            'address' => 'Адрес',
            'phone' => 'Телефон',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::className(), ['id_provider' => 'id']);
    }

    /**
     * Find rows
     * @return \app\models\db\query\ProvidersQuery
     * the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\db\query\ProvidersQuery(get_called_class());
    }
}
