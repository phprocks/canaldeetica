<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Department;

class DepartmentSearch extends Department
{
    public $start_date;
    public $end_date;

    public function rules()
    {
        return [
            [['id', 'subject', 'status', 'updated_by'], 'integer'],
            [['start_date', 'end_date','protocol', 'message', 'created', 'updated', 'answer', 'reporter_name', 'reporter_email', 'reporter_phone', 'reporter_celphone'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Department::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC, 
                ]
            ],
            'pagination' => [
                'pageSize' => 50,
            ],
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
            'subject' => $this->subject,
            'status' => $this->status,
            'created' => $this->created,
            'updated' => $this->updated,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['between', 'created', $this->start_date, $this->end_date]);

        $query->andFilterWhere(['like', 'protocol', $this->protocol])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'answer', $this->answer])
            ->andFilterWhere(['like', 'reporter_name', $this->reporter_name])
            ->andFilterWhere(['like', 'reporter_email', $this->reporter_email])
            ->andFilterWhere(['like', 'reporter_phone', $this->reporter_phone])
            ->andFilterWhere(['like', 'reporter_celphone', $this->reporter_celphone]);

        return $dataProvider;
    }
}