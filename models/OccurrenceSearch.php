<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Occurrence;

class OccurrenceSearch extends Occurrence
{
    public function rules()
    {
        return [
            [['id', 'protocol', 'type', 'returntype', 'status', 'user_id', 'updated_by'], 'integer'],
            [['subject', 'message', 'created', 'updated','answer'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Occurrence::find();

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
            'protocol' => $this->protocol,
            'type' => $this->type,
            'returntype' => $this->returntype,
            'status' => $this->status,
            'created' => $this->created,
            'updated' => $this->updated,
            'user_id' => $this->user_id,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }

    public function mylist($params)
    {
        $query = Occurrence::find();

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
            'type' => $this->type,
            'returntype' => $this->returntype,
            'status' => $this->status,
            'created' => $this->created,
            'updated' => $this->updated,
            'user_id' => $this->user_id,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }    
}