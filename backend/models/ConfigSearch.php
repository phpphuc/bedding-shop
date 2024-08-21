<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Config;

/**
 * ConfigSearch represents the model behind the search form of `backend\models\Config`.
 */
class ConfigSearch extends Config
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'lang'], 'integer'],
            [['name_vi', 'name_en', 'phone', 'address_vi', 'email', 'fanpage', 'website', 'map', 'address_en', 'title', 'keyword', 'description', 'logo', 'favicon', 'banner', 'headtag', 'bodytag', 'heading', 'customcss'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Config::find();

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
            'ID' => $this->ID,
            'lang' => $this->lang,
        ]);

        $query->andFilterWhere(['like', 'name_vi', $this->name_vi])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address_vi', $this->address_vi])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'fanpage', $this->fanpage])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'map', $this->map])
            ->andFilterWhere(['like', 'address_en', $this->address_en])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'favicon', $this->favicon])
            ->andFilterWhere(['like', 'banner', $this->banner])
            ->andFilterWhere(['like', 'headtag', $this->headtag])
            ->andFilterWhere(['like', 'bodytag', $this->bodytag])
            ->andFilterWhere(['like', 'heading', $this->heading])
            ->andFilterWhere(['like', 'customcss', $this->customcss]);

        return $dataProvider;
    }
}
