<?php

namespace app\models\db\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\db\Providers;

/**
 * Class ProvidersSearch
 * ProvidersSearch represents the model behind the search form about
 * `app\models\db\Providers`.
 *
 * @package   app\models\db\search
 * @author    Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @copyright 2017 Chuvashin Viacheslav
 * @created   14.09.2017 11:20
 */
class ProvidersSearch extends Providers
{
    /**
    * Get rules from validation
    *
    * @return array
    */
    public function rules(): array
    {
        return [
            [['id', 'inn', 'kpp', 'phone'], 'integer'],
            [['name', 'address'], 'safe'],
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
        $query = Providers::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'inn' => $this->inn,
            'kpp' => $this->kpp,
            'phone' => $this->phone,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
