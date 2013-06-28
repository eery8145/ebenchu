<?php

/**
 * This is the model class for table "cm_hdcate".
 *
 * The followings are the available columns in table 'cm_hdcate':
 * @property integer $id
 * @property integer $pid
 * @property string $name
 * @property integer $create_time
 */
class Hdcate extends CActiveRecord
{

	public $_modelName = '活动分类';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Hdcate the static model class
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
		return Yii::app()->params['tablePrefix'].'hdcate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pid, create_time', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, pid, name, create_time', 'safe', 'on'=>'search'),
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
			'pid' => '父类',
			'name' => '分类名称',
			'create_time' => '创建时间',
		);
	}

	// 获取父类列表
	public function getFuleiList(){
		if($this->isNewRecord){
			$fuleiList = $this->findAll(array('condition'=>'pid = 0'));
		}else{
			if(!empty($this->id))
				$fuleiList = $this->findAll(array('condition'=>'pid = 0 and id != '.$this->id));
		}
		$fulei = array();
		$fulei[0] = '顶级分类';
		if(!empty($fuleiList)){
			foreach ($fuleiList as $key => $value) {
				$fulei[$value->id] = $value->name;
			}
		}
			
		return $fulei;
	}

	// 获取父类名称
	public function getFuleiname(){
		if($this->pid == 0){
			return '顶级分类';
		}else{
			$fulei = $this->find('id = '.$this->pid);
			return $fulei->name;
		}
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
		$criteria->compare('pid',$this->pid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('create_time',$this->create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}