<?php

/**
 * This is the model class for table "cm_cate".
 *
 * The followings are the available columns in table 'cm_cate':
 * @property integer $id
 * @property string $name
 * @property integer $create_time
 * @property integer $status
 * @property integer $sort
 * @property string $img
 * @property integer $pid
 */
class Cate extends CActiveRecord
{

	public $_modelName = '文章分类';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cate the static model class
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
		return Yii::app()->params['tablePrefix'].'cate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, create_time, status, sort, img, pid', 'required'),
			array('status, sort, pid', 'numerical', 'integerOnly'=>true),
			array('name, img', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('create_time,type,con,title,des,keywords', 'safe'),
			array('id, name, create_time, status, sort, img, pid', 'safe', 'on'=>'search'),
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
			'FuleiOne'=>array(self::BELONGS_TO, 'Cate', 'id', 'condition'=>'pid = 0'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '分类名称',
			'create_time' => '创建时间',
			'status' => '状态',
			'sort' => '排序',
			'img' => '缩略图',
			'pid' => '父类',
			'type' => '类型',
			'con' => '单页内容',
			'des' => '单页描述',
			'title' => '单页标题',
			'keywords' => '关键词(以,号分割)',
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

	// 获取图片链接
	public function getImgLink(){
		$imgLink = "<a href='#'><img src='/upload/fenlei/".$this->img."' /></a>";
		$imgLink = "/upload/fenlei/".$this->img;
		return $imgLink;
	}

	// 获取状态列表
	public function getStatusList(){
		return array(
			1=>'审核通过',
			2=>'审核未通过',
			);
	}

	public function getStatusName(){
		return $this->statusList[$this->status];
	}

	// 获取状态列表
	public function getTypeList(){
		return array(
			1=>'分类',
			2=>'单页',
			);
	}

	// 获取状态名称
	public function getTypeName(){
		switch ($this->type) {
			case 1:
				return '分类';
				break;
			case 2:
				return '单页';
				break;
			
			default:
				return '分类';
				break;
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('type',$this->type);
		$criteria->compare('title',$this->title);
		$criteria->compare('des',$this->des);
		$criteria->compare('keywords',$this->keywords);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getDanyeurl(){
		if($this->type == 2){
			return Yii::app()->controller->createUrl('/about/index',array('id'=>$this->id));
		}
	}
}