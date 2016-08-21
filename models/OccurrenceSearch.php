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
            [['id', 'protocol', 'subject', 'returntype', 'status', 'updated_by'], 'integer'],
            [['protocol'], 'required'],
            [['message', 'created', 'updated','answer'], 'safe'],
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
            'subject' => $this->subject,
            'returntype' => $this->returntype,
            'location' => $this->location,
            'status' => $this->status,
            'created' => $this->created,
            'updated' => $this->updated,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }

    public function searchprotocol($params)
    {
        $query = Occurrence::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        // if (!$this->validate()) {
        //     return $dataProvider;
        // }
        if (isset($_GET['protocol']) && !($this->load($params) && $this->validate())) {
            return $dataProvider;
        }        

        $query->andWhere([
            'protocol' => $this->protocol,
        ]);

        return $dataProvider;
    }    
}