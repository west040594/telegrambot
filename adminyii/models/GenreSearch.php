<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Genre;

/**
 * GenreSearch represents the model behind the search form of `app\models\Genre`.
 */
class GenreSearch extends Genre
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['genre_id'], 'integer'],
            [['genre'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Genre::find();

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
            'genre_id' => $this->genre_id,
        ]);

        $query->andFilterWhere(['ilike', 'genre', $this->genre]);

        return $dataProvider;
    }
}
