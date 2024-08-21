<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Videos;

/**
 * VideosSearch represents the model behind the search form of `backend\models\Videos`.
 */
class VideosSearch extends Videos {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'parent'], 'integer'],
            [['name_vi', 'name_en', 'video_id'], 'safe'],
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
        $query = Videos::find();

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
            'number' => $this->number,
            'status' => $this->status,
            'parent' => $this->parent,
        ]);

        $query->andFilterWhere(['like', 'name_vi', $this->name_vi])
                ->andFilterWhere(['like', 'name_en', $this->name_en])
                ->andFilterWhere(['like', 'video_id', $this->video_id])
                ->orderBy('number asc, id desc');

        return $dataProvider;
    }

}
