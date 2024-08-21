<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Khachhang;

/**
 * KhachhangSearch represents the model behind the search form of `backend\models\Khachhang`.
 */
class KhachhangSearch extends Khachhang {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'status'], 'integer'],
            [['fullname', 'phone', 'email', 'bacsi', 'phongkham'], 'safe'],
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
        $query = Khachhang::find();

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
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
                ->andFilterWhere(['like', 'phone', $this->phone])
                ->andFilterWhere(['like', 'bacsi', $this->bacsi])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'phongkham', $this->email])
                ->orderBy('status asc, id desc');

        return $dataProvider;
    }

}
