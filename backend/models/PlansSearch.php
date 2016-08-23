<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Plans;

/**
 * PlansSearch represents the model behind the search form about `backend\models\Plans`.
 */
class PlansSearch extends Plans
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ready', 'count_models', 'count_elayners', 'count_attachment', 'count_checkpoint', 'count_reteiners', 'count_models_vp', 'count_elayners_vp', 'count_attachment_vp', 'count_checkpoint_vp', 'count_reteiners_vp', 'doctor_id', 'pacient_id', 'order_id', 'level_1_doctor_id', 'level_2_doctor_id', 'level_3_doctor_id', 'level_4_doctor_id', 'level_5_doctor_id', 'level_1_status', 'level_2_status', 'level_3_status', 'level_4_status', 'level_5_status'], 'integer'],
            [['version', 'ver_confirm', 'correct', 'approved', 'level_1_result', 'level_2_result', 'level_3_result', 'level_4_result', 'level_5_result', 'comments', 'files'], 'safe'],
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
        $query = Plans::find();

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
            'ready' => $this->ready,
            'count_models' => $this->count_models,
            'count_elayners' => $this->count_elayners,
            'count_attachment' => $this->count_attachment,
            'count_checkpoint' => $this->count_checkpoint,
            'count_reteiners' => $this->count_reteiners,
            'count_models_vp' => $this->count_models_vp,
            'count_elayners_vp' => $this->count_elayners_vp,
            'count_attachment_vp' => $this->count_attachment_vp,
            'count_checkpoint_vp' => $this->count_checkpoint_vp,
            'count_reteiners_vp' => $this->count_reteiners_vp,
            'doctor_id' => $this->doctor_id,
            'pacient_id' => $this->pacient_id,
            'order_id' => $this->order_id,
            'level_1_doctor_id' => $this->level_1_doctor_id,
            'level_2_doctor_id' => $this->level_2_doctor_id,
            'level_3_doctor_id' => $this->level_3_doctor_id,
            'level_4_doctor_id' => $this->level_4_doctor_id,
            'level_5_doctor_id' => $this->level_5_doctor_id,
            'level_1_status' => $this->level_1_status,
            'level_2_status' => $this->level_2_status,
            'level_3_status' => $this->level_3_status,
            'level_4_status' => $this->level_4_status,
            'level_5_status' => $this->level_5_status,
        ]);

        $query->andFilterWhere(['like', 'version', $this->version])
            ->andFilterWhere(['like', 'ver_confirm', $this->ver_confirm])
            ->andFilterWhere(['like', 'correct', $this->correct])
            ->andFilterWhere(['like', 'approved', $this->approved])
            ->andFilterWhere(['like', 'level_1_result', $this->level_1_result])
            ->andFilterWhere(['like', 'level_2_result', $this->level_2_result])
            ->andFilterWhere(['like', 'level_3_result', $this->level_3_result])
            ->andFilterWhere(['like', 'level_4_result', $this->level_4_result])
            ->andFilterWhere(['like', 'level_5_result', $this->level_5_result])
            ->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'files', $this->files]);

        return $dataProvider;
    }
}
