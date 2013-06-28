<?php

/**
 * This is the model class for table "cm_score".
 *
 * The followings are the available columns in table 'cm_score':
 * @property integer $id
 * @property integer $zongsx
 * @property integer $fatie
 * @property integer $fatiesx
 * @property integer $huitie
 * @property integer $huitiesx
 * @property integer $xihuansx
 * @property integer $xihuan
 * @property integer $zhuce
 * @property integer $shoujiyz
 * @property integer $emailyz
 * @property integer $yaoqing
 * @property integer $yaoqingsx
 * @property integer $jiajingsx
 * @property integer $jiajing
 * @property integer $zhidingsx
 * @property integer $zhiding
 * @property integer $denglu
 * @property integer $shantie
 * @property integer $jiahaoyou
 * @property integer $jiahaoyousx
 * @property integer $jiangli
 * @property integer $xiaozusx
 * @property integer $xiaozu
 * @property integer $qiandao
 * @property integer $caina
 * @property integer $sanfen
 * @property integer $chenfa
 * @property integer $jianglisx
 */
class Score extends CActiveRecord
{

	public $_modelName = '表名称(新建模型需要在模型里面修改)';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Score the static model class
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
		return 'cm_score';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('zongsx', 'required'),
			array('zongsx, fatie, fatiesx, huitie, huitiesx, xihuansx, xihuan, zhuce, shoujiyz, emailyz, yaoqing, yaoqingsx, jiajingsx, jiajing, jiazu,jiazusx,zhidingsx, zhiding, denglu, shantie, jiahaoyou, jiahaoyousx, jiangli,shanchu, xiaozusx, xiaozu, qiandao, caina, sanfen, chengfa, jianglisx,touxiang', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, zongsx, fatie, fatiesx, huitie, huitiesx, xihuansx, xihuan, zhuce, shoujiyz, emailyz, yaoqing, yaoqingsx, jiajingsx, jiajing, zhidingsx, zhiding, denglu, shantie, jiahaoyou, jiahaoyousx, jiangli, xiaozusx, xiaozu,jiazu,jiazusx, qiandao, caina, sanfen, chengfa, jianglisx', 'safe', 'on'=>'search'),
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
			'zongsx' => 'Zongsx',
			'fatie' => 'Fatie',
			'fatiesx' => 'Fatiesx',
			'huitie' => 'Huitie',
			'huitiesx' => 'Huitiesx',
			'xihuansx' => 'Xihuansx',
			'xihuan' => 'Xihuan',
			'zhuce' => 'Zhuce',
			'shoujiyz' => 'Shoujiyz',
			'emailyz' => 'Emailyz',
			'yaoqing' => 'Yaoqing',
			'yaoqingsx' => 'Yaoqingsx',
			'jiajingsx' => 'Jiajingsx',
			'jiajing' => 'Jiajing',
			'zhidingsx' => 'Zhidingsx',
			'zhiding' => 'Zhiding',
			'denglu' => 'Denglu',
			'shantie' => 'Shantie',
			'jiahaoyou' => 'Jiahaoyou',
			'jiahaoyousx' => 'Jiahaoyousx',
			'jiangli' => 'Jiangli',
			'xiaozusx' => 'Xiaozusx',
			'xiaozu' => 'Xiaozu',
			'qiandao' => 'Qiandao',
			'caina' => 'Caina',
			'sanfen' => 'Sanfen',
			'chengfa' => 'chengfa',
			'jianglisx' => 'Jianglisx',
			'touxiang' => 'touxiang',
			'shanchu' => 'shanchu',
			'jiazu' => 'jiazu',
			'jiazusx' => 'jiazusx',
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
		$criteria->compare('zongsx',$this->zongsx);
		$criteria->compare('fatie',$this->fatie);
		$criteria->compare('fatiesx',$this->fatiesx);
		$criteria->compare('huitie',$this->huitie);
		$criteria->compare('huitiesx',$this->huitiesx);
		$criteria->compare('xihuansx',$this->xihuansx);
		$criteria->compare('xihuan',$this->xihuan);
		$criteria->compare('zhuce',$this->zhuce);
		$criteria->compare('shoujiyz',$this->shoujiyz);
		$criteria->compare('emailyz',$this->emailyz);
		$criteria->compare('yaoqing',$this->yaoqing);
		$criteria->compare('yaoqingsx',$this->yaoqingsx);
		$criteria->compare('jiajingsx',$this->jiajingsx);
		$criteria->compare('jiajing',$this->jiajing);
		$criteria->compare('zhidingsx',$this->zhidingsx);
		$criteria->compare('zhiding',$this->zhiding);
		$criteria->compare('denglu',$this->denglu);
		$criteria->compare('shantie',$this->shantie);
		$criteria->compare('jiahaoyou',$this->jiahaoyou);
		$criteria->compare('jiahaoyousx',$this->jiahaoyousx);
		$criteria->compare('jiangli',$this->jiangli);
		$criteria->compare('xiaozusx',$this->xiaozusx);
		$criteria->compare('xiaozu',$this->xiaozu);
		$criteria->compare('qiandao',$this->qiandao);
		$criteria->compare('caina',$this->caina);
		$criteria->compare('sanfen',$this->sanfen);
		$criteria->compare('chengfa',$this->chengfa);
		$criteria->compare('jianglisx',$this->jianglisx);
		$criteria->compare('touxiang',$this->touxiang);
		$criteria->compare('shanchu',$this->shanchu);
		$criteria->compare('jiazu',$this->jiazu);
		$criteria->compare('jiazusx',$this->jiazusx);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}