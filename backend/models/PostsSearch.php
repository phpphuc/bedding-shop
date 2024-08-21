<?php

namespace backend\models;

use backend\models\Posts;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PostsSearch represents the model behind the search form of `backend\models\Posts`.
 */
class PostsSearch extends Posts {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'parent'], 'integer'],
            [['name_vi'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Posts::find();

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
            'parent' => $this->parent,
        ]);

        $query->andFilterWhere(['like', 'name_vi', $this->name_vi])
                ->orderBy('number asc, id desc');

        return $dataProvider;
    }

}
