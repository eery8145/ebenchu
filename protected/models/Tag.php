<?php

/**
 * This is the model class for table "cm_tag".
 *
 * The followings are the available columns in table 'cm_tag':
 * @property integer $id
 * @property integer $pid
 * @property string $title
 * @property integer $sort
 * @property integer $createtime
 */
class Tag extends CActiveRecord
{
	public $_modelName = '标签';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tag the static model class
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
		return Yii::app()->params['tablePrefix'].'tag';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pid, title, sort', 'required'),
			array('pid, sort', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>50),
			array('createtime','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, pid, title, sort, createtime', 'safe', 'on'=>'search'),
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
			//获取父类
			'FuleiOne'=>array(self::BELONGS_TO, 'Tag', 'id', 'condition'=>'pid = 0'),
			'TagZilei'=>array(self::HAS_MANY, 'Tag', 'pid', 'condition'=>'pid > 0'),
		);
	}

	// 获取父类列表
	public function getFuleiList(){
		if($this->isNewRecord){
			$fuleiList = $this->findAll(array('condition'=>'pid = 0'));
		}else{
			$fuleiList = $this->findAll(array('condition'=>'pid = 0 and id != '.$this->id));
		}
		$fulei = array();
		$fulei[0] = '顶级分类';
		foreach ($fuleiList as $key => $value) {
			$fulei[$value->id] = $value->title;
		}
		return $fulei;
	}

	// 获取父类名称
	public function getFuleiname(){
		if($this->pid == 0){
			return '顶级分类';
		}else{
			$fulei = $this->find('id = '.$this->pid);
			return $fulei->title;
		}
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pid' => '父类',
			'title' => '标题',
			'sort' => '排序',
			'createtime' => '创建时间',
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
		$criteria->compare('pid',$this->pid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('createtime',$this->createtime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}