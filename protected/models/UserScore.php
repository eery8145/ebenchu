<?php

/**
 * This is the model class for table "cm_user_score".
 *
 * The followings are the available columns in table 'cm_user_score':
 * @property integer $id
 * @property integer $mid
 * @property integer $fatiedf
 * @property integer $huitiedf
 * @property integer $xihuandf
 * @property integer $zhuce
 * @property integer $shoujiyz
 * @property integer $jiajingdf
 * @property integer $emailyz
 * @property integer $yaoqingdf
 * @property integer $jiahaoyoudf
 * @property integer $zhidingdf
 * @property integer $shanchu
 * @property integer $jiajing
 * @property integer $denglu
 * @property integer $xiaozudf
 * @property integer $jianglidf
 * @property integer $caina
 * @property integer $sanfen
 * @property integer $shantie
 * @property integer $chenfa
 * @property integer $qiandao
 */
class UserScore extends CActiveRecord
{

	public $_modelName = '表名称(新建模型需要在模型里面修改)';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserScore the static model class
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
		return 'cm_user_score';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mid, fatiedf, huitiedf, xihuandf, zhuce, shoujiyz, jiajingdf, emailyz, yaoqingdf, jiahaoyoudf, zhidingdf, shanchu, denglu,jiazudf, xiaozudf, jianglidf, caina, sanfen, shantie, chengfa, qiandao,touxiang', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, mid, fatiedf, huitiedf, xihuandf, zhuce, shoujiyz, jiajingdf, emailyz, yaoqingdf, jiahaoyoudf, zhidingdf, shanchu, jiajing,jiazudf, denglu, xiaozudf, jianglidf, caina, sanfen, shantie, chengfa, qiandao', 'safe', 'on'=>'search'),
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
			'mid' => 'Mid',
			'fatiedf' => 'Fatiedf',
			'huitiedf' => 'Huitiedf',
			'xihuandf' => 'Xihuandf',
			'zhuce' => 'Zhuce',
			'shoujiyz' => 'Shoujiyz',
			'jiajingdf' => 'Jiajingdf',
			'emailyz' => 'Emailyz',
			'yaoqingdf' => 'Yaoqingdf',
			'jiahaoyoudf' => 'Jiahaoyoudf',
			'zhidingdf' => 'Zhidingdf',
			'shanchu' => 'Shanchu',
			'denglu' => 'Denglu',
			'xiaozudf' => 'Xiaozudf',
			'jianglidf' => 'Jianglidf',
			'caina' => 'Caina',
			'sanfen' => 'Sanfen',
			'shantie' => 'Shantie',
			'chengfa' => 'chengfa',
			'qiandao' => 'Qiandao',
			'touxiang' => 'touxiang',
			'jiazudf' => 'jiazudf',
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
		$criteria->compare('mid',$this->mid);
		$criteria->compare('fatiedf',$this->fatiedf);
		$criteria->compare('huitiedf',$this->huitiedf);
		$criteria->compare('xihuandf',$this->xihuandf);
		$criteria->compare('zhuce',$this->zhuce);
		$criteria->compare('shoujiyz',$this->shoujiyz);
		$criteria->compare('jiajingdf',$this->jiajingdf);
		$criteria->compare('emailyz',$this->emailyz);
		$criteria->compare('yaoqingdf',$this->yaoqingdf);
		$criteria->compare('jiahaoyoudf',$this->jiahaoyoudf);
		$criteria->compare('zhidingdf',$this->zhidingdf);
		$criteria->compare('shanchu',$this->shanchu);
		$criteria->compare('denglu',$this->denglu);
		$criteria->compare('xiaozudf',$this->xiaozudf);
		$criteria->compare('jianglidf',$this->jianglidf);
		$criteria->compare('caina',$this->caina);
		$criteria->compare('sanfen',$this->sanfen);
		$criteria->compare('shantie',$this->shantie);
		$criteria->compare('chengfa',$this->chengfa);
		$criteria->compare('qiandao',$this->qiandao);
		$criteria->compare('touxiang',$this->touxiang);
		$criteria->compare('jiazudf',$this->jiazudf);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}