<?php

/**
 * This is the model class for table "cm_caiji_guize".
 *
 * The followings are the available columns in table 'cm_caiji_guize':
 * @property integer $id
 * @property integer $caiji_id
 * @property string $a_guize
 * @property string $title_guize
 * @property string $content_guize
 * @property integer $auto_keywords
 */
class CaijiGuize extends CActiveRecord
{

	public $_modelName = '采集规则';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaijiGuize the static model class
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
		return 'cm_caiji_guize';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('guize_name, auto_keywords,des_guize,keywords_guize', 'numerical', 'integerOnly'=>true),
			array('a_guize, title_guize, content_guize', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, caiji_id, a_guize, title_guize, content_guize, auto_keywords', 'safe', 'on'=>'search'),
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
			'guize_name' => '规则名称',
			'a_guize' => 'A链接规则',
			'title_guize' => 'title规则',
			'content_guize' => 'content规则',
			'auto_keywords' => '是否自动获取关键字',
			'keywords_guize' => 'keywords规则',
			'des_guize' => 'description规则',
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
		$criteria->compare('guize_name',$this->guize_name);
		$criteria->compare('a_guize',$this->a_guize,true);
		$criteria->compare('title_guize',$this->title_guize,true);
		$criteria->compare('content_guize',$this->content_guize,true);
		$criteria->compare('auto_keywords',$this->auto_keywords);
		$criteria->compare('keywords_guize',$this->keywords_guize);
		$criteria->compare('des_guize',$this->des_guize);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}