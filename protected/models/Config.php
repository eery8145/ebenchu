<?php

/**
 * This is the model class for table "cm_config".
 *
 * The followings are the available columns in table 'cm_config':
 * @property integer $id
 * @property string $site_name
 * @property string $site_url
 * @property string $seo_description
 * @property string $seo_keywords
 * @property string $site_logo
 */
class Config extends CActiveRecord
{

	public $_modelName = '网站设置';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Config the static model class
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
		return Yii::app()->params['tablePrefix'].'config';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('site_name, site_url, seo_description, seo_keywords,site_copyright', 'length', 'max'=>255),
			array('site_logo', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id,site_code,seo_title,site_slogan, site_name, site_url, seo_description, seo_keywords, site_logo,qq_key,sina_key,qq_secret,sina_secret,host,port,username,password,from', 'safe'),
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
			'site_name' => '网站名称',
			'site_url' => '网站地址',
			'seo_title' => '网站标题',
			'seo_description' => '网站描述',
			'seo_keywords' => '网站简介',
			'site_logo' => '网站LOGO',
			'site_code' => '第三方统计代码',
			'site_slogan' => '标语',
			'site_copyright' => '首页底部版权信息',
			'qq_key' => 'qq App Key',
			'qq_secret' => 'qq App Secret',
			'sina_key' => 'sina App Key',
			'sina_secret' => 'sina App Secret',
			'host'=>'邮箱host',
			'port'=>'邮箱端口',
			'username'=>'用户名',
			'password'=>'密码',
			'from'=>'发件人',
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
		$criteria->compare('site_name',$this->site_name,true);
		$criteria->compare('site_url',$this->site_url,true);
		$criteria->compare('seo_description',$this->seo_description,true);
		$criteria->compare('seo_keywords',$this->seo_keywords,true);
		$criteria->compare('site_logo',$this->site_logo,true);
		$criteria->compare('site_copyright',$this->site_copyright,true);
		$criteria->compare('site_code',$this->site_code,true);
		$criteria->compare('site_slogan',$this->site_slogan,true);
		$criteria->compare('seo_title',$this->seo_title,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}