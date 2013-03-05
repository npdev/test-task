<?php
/**
	* This is the model class for table "{{messages}}".
	*
	* The followings are the available columns in table '{{messages}}':
	* @property integer $id
	* @property string $date
	* @property string $user
	* @property string $text
	*/
class Messages extends CActiveRecord
{
				/**
					* Returns the static model of the specified AR class.
					* @param string $className active record class name.
					* @return Messages the static model class
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
								return '{{messages}}';
				}

				/**
					* @return array validation rules for model attributes.
					*/
				public function rules()
				{
								// NOTE: you should only define rules for those attributes that
								// will receive user inputs.
								return array(
												array('date, user, text', 'required'),
												array('user', 'length', 'max'=>255),
												array('text', 'length', 'max'=>100),
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
												'date' => 'Date',
												'user' => 'User',
												'text' => 'Text',
								);
				}

				public function addMessage($user, $text){
								$messages = new Messages;
								$messages->user = $user;
								$messages->text = $text;
								$messages->date = date('Y-m-d H:i:s');
								if(!$messages->save()){
												return array('error'=>'Error: database request fail');
								}
								return false;
				}
				
				public function getMessages(){
								$messages = new Messages;
								$TMessages = $messages->model()->tableAlias;
								$result = $messages->findAll(array(
												'select'=>'*',
												'order'=>$TMessages . ".id desc",
												'limit'=>15
								));
								return $result;
								
				}
}
?>