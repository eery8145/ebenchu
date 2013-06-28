<?php

/**
 * This is the model class for table "cm_huodong".
 *
 * The followings are the available columns in table 'cm_huodong':
 * @property integer $id
 * @property integer $uid
 * @property integer $cid
 * @property string $title
 * @property string $time
 * @property string $address
 * @property string $feiyong
 * @property string $zhuban
 * @property string $info
 * @property string $logo
 * @property integer $create_time
 */
class Huodong extends CActiveRecord
{

	public $_modelName = '活动';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Huodong the static model class
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
		return Yii::app()->params['tablePrefix'].'huodong';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, cid', 'numerical', 'integerOnly'=>true),
			array('title, time, feiyong, zhuban, logo', 'length', 'max'=>100),
			array('address', 'length', 'max'=>255),
			array('info', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, cid, title, time, address, feiyong, zhuban, info, logo, create_time', 'safe'),
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
			'MemberOne'=>array(self::BELONGS_TO, 'Member', 'uid'), 
			'HdcateOne'=>array(self::BELONGS_TO, 'Hdcate', 'cid', 'condition'=>'pid != 0'),
		);
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'uid' => '组织者',
			'cid' => '活动分类',
			'title' => '活动名称',
			'time' => '活动时间',
			'address' => '活动地址',
			'feiyong' => '费用',
			'zhuban' => '主办方',
			'info' => '活动详情',
			'logo' => '活动logo',
			'create_time' => '创建时间',
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
		$criteria->compare('uid',$this->uid);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('feiyong',$this->feiyong,true);
		$criteria->compare('zhuban',$this->zhuban,true);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('create_time',$this->create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	// 获取图片链接
	public function getImgLink(){
		$imgLink = '/upload/huodong/'.$this->logo;
		return $imgLink;
	}
}