<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AssessmentFormL1 as AssessmentFormL1Model;

/**
 * AssessmentFormL1 represents the model behind the search form of `common\models\AssessmentFormL1`.
 */
class AssessmentFormL1 extends AssessmentFormL1Model
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'create_by'], 'integer'],
            [['title', 'explanation', 'sex', 'status', 'status_other', 'department', 'department_other', 'create_date'], 'safe'],
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
        $query = AssessmentFormL1Model::find();

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
            'create_date' => $this->create_date,
            'create_by' => $this->create_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'explanation', $this->explanation])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'status_other', $this->status_other])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'department_other', $this->department_other]);

        return $dataProvider;
    }
}
