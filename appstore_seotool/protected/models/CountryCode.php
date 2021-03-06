<?php

/**
 * This is the model class for table "country_code".
 *
 * The followings are the available columns in table 'country_code':
 * @property integer $country_id
 * @property string $country_code
 * @property string $country_name
 * @property string $ip_address
 * @property integer $port
 * @property string $insert_date
 * @property string $update_date
 * @property string $delete_date
 * @property integer $delete_flag
 * @property int $proxy_status proxy status
 */
class CountryCode extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CountryCode the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'country_code';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('country_code, country_name', 'required'),
            array('port, delete_flag', 'numerical', 'integerOnly' => true),
            array('country_code', 'length', 'max' => 2),
            array('country_name, ip_address', 'length', 'max' => 255),
            array('insert_date, update_date, delete_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('country_id, country_code, country_name, ip_address, port, insert_date, update_date, delete_date, delete_flag', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'country_id' => 'Country',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
            'proxy_status' => 'Proxy Status',
            'ip_address' => 'Ip Address',
            'port' => 'Port',
            'insert_date' => 'Insert Date',
            'update_date' => 'Update Date',
            'delete_date' => 'Delete Date',
            'delete_flag' => 'Delete Flag',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('country_id', $this->country_id);
        $criteria->compare('country_code', $this->country_code, true);
        $criteria->compare('country_name', $this->country_name, true);
        $criteria->compare('proxy_status', $this->proxy_status, true);
        $criteria->compare('ip_address', $this->ip_address, true);
        $criteria->compare('port', $this->port);
        $criteria->compare('insert_date', $this->insert_date, true);
        $criteria->compare('update_date', $this->update_date, true);
        $criteria->compare('delete_date', $this->delete_date, true);
        $criteria->compare('delete_flag', $this->delete_flag);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    /**
     * Retrieves list all Country (country_id and country_name only)
     */
    public static function allCountry() {

        $models = self::model()->findAll();

        $result = CHtml::listData($models, 'country_id', 'country_name');
//        var_dump($result);
        return $result;
    }

}