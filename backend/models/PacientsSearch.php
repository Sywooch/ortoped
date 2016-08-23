<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pacients;

/**
 * PacientsSearch represents the model behind the search form about `backend\models\Pacients`.
 */
class PacientsSearch extends Pacients
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'doctor_id', 'order_id', 'vp_id', 'code', 'age', 'date', 'gender', 'status', 'alert_date', 'type_paid', 'var_paid'], 'integer'],
            [['alert_msg', 'firstname', 'lastname', 'thirdname', 'phone', 'diagnosis', 'result', 'files'], 'safe'],
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
        $query = Pacients::find();

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
            'doctor_id' => $this->doctor_id,
            'order_id' => $this->order_id,
            'vp_id' => $this->vp_id,
            'code' => $this->code,
            'age' => $this->age,
            'date' => $this->date,
            'gender' => $this->gender,
            'status' => $this->status,
            'alert_date' => $this->alert_date,
            'type_paid' => $this->type_paid,
            'var_paid' => $this->var_paid,
        ]);

        $query->andFilterWhere(['like', 'alert_msg', $this->alert_msg])
            ->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'thirdname', $this->thirdname])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'diagnosis', $this->diagnosis])
            ->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'files', $this->files]);

        return $dataProvider;
    }
}
