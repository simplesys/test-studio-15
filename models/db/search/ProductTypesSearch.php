<?php

namespace app\models\db\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\db\ProductTypes;

/**
 * Class ProductTypesSearch
 * ProductTypesSearch represents the model behind the search form about
 * `app\models\db\ProductTypes`.
 *
 * @package   app\models\db\search
 * @author    Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @copyright 2017 Chuvashin Viacheslav
 * @created   14.09.2017 11:15
 */
class ProductTypesSearch extends ProductTypes
{
    /**
     * Get rules from validation
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            [['id', 'id_category'], 'integer'],
            [['name'], 'safe'],
        ];
    }

    /**
     * Bypass scenarios() implementation in the parent class
     *
     * @return array
     */
    public function scenarios(): array
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params): ActiveDataProvider
    {
        $query = ProductTypes::find();
        $dataProvider = new ActiveDataProvider(['query' => $query]);
        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(
            ['id' => $this->id, 'id_category' => $this->id_category]
        );
        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
