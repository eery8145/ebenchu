<?php

/**
 * This is the model class for table "cm_caiji_article".
 *
 * The followings are the available columns in table 'cm_caiji_article':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $keywords
 * @property string $des
 * @property integer $creater_time
 * @property integer $status
 * @property string $mark
 * @property integer $caiji_id
 */
class CaijiArticle extends CActiveRecord
{

	public $_modelName = '采集的文章';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaijiArticle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cm_caiji_article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('create_time,laiyuan,guize_id, status,cate_id, caiji_id,click', 'numerical', 'integerOnly'=>true),
			array('title, keywords, des', 'length', 'max'=>255),
			array('content, mark', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, content, keywords, des, creater_time, status, mark, caiji_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => '标题',
			'content' => '内容',
			'keywords' => '关键字',
			'des' => '简介',
			'create_time' => '创建时间',
			'status' => '状态',
			'mark' => '备注',
			'caiji_id' => '采集ID',
			'click' => '点击',
			'cate_id' => '分类ID',
			'guize_id' => '规则ID',
			'laiyuan' => '来源',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('des',$this->des,true);
		$criteria->compare('create_time',$this->creater_time);
		$criteria->compare('status',$this->status);
		$criteria->compare('mark',$this->mark,true);
		$criteria->compare('caiji_id',$this->caiji_id);
		$criteria->compare('click',$this->click);
		$criteria->compare('cate_id',$this->cate_id);
		$criteria->compare('guize_id',$this->guize_id);
		$criteria->compare('laiyuan',$this->laiyuan);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}