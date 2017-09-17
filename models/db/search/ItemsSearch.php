<?php

namespace app\models\db\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\db\Items;

/**
 * Class ItemsSearch
 * ItemsSearch represents the model behind the search form about
 * `app\models\db\Items`.
 *
 * @package   app\models\db\search
 * @author    Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @copyright 2017 Chuvashin Viacheslav
 * @created   14.09.2017 11:05
 */
class ItemsSearch extends Items
{
    public $categoryName;
    public $productTypeName;
    public $providerName;

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
                    'id', 'id_category', 'id_product_type',
                    'quantity', 'id_provider'
                ], 'integer'
            ],
            [
                ['date_delivery', 'categoryName', 'productTypeName', 'providerName'],
                'safe'
            ],
            [['price'], 'number'],
        ];
    }

    /**
     * bypass scenarios() implementation in the parent class
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
        $query = Items::find();
        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
                'pagination' => [
                    'pageSize' => 10
                ]
            ]
        );

        $dataProvider->sort->attributes['categoryName'] = [
            'asc' => ['product_categories.name' => SORT_ASC],
            'desc' => ['product_categories.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['productTypeName'] = [
            'asc' => ['product_types.name' => SORT_ASC],
            'desc' => ['product_types.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['providerName'] = [
            'asc' => ['providers.name' => SORT_ASC],
            'desc' => ['providers.name' => SORT_DESC],
        ];

        $query->joinWith('category');
        $query->joinWith('productType');
        $query->joinWith('provider');

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(
            [
                'id_category' => $this->id_category,
                'id_product_type' => $this->id_product_type,
                'quantity' => $this->quantity,
                'id_provider' => $this->id_provider,
                'price' => $this->price,
            ]
        );

        $query->andFilterWhere(
            ['like', 'product_categories.name', $this->categoryName]
        )->andFilterWhere(['like', 'product_types.name', $this->productTypeName])
            ->andFilterWhere(['like', 'providers.name', $this->providerName])
            ->andFilterWhere(['like', 'date_delivery', $this->date_delivery]);

        return $dataProvider;
    }
}
