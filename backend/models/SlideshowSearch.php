<?php

namespace backend\models;

use backend\models\Slideshow;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SlideshowSearch represents the model behind the search form of `backend\models\Slideshow`.
 */
class SlideshowSearch extends Slideshow {

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
        $query = Slideshow::find();

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
