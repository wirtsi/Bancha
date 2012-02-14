<?php
class Director extends AppModel {

	var $name = 'Director';
	var $validate = array(
		'name' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Movie' => array(
			'className' => 'Movie',
			'foreignKey' => 'director_id',
		)
	);
var $actsAs = array(
        "Bancha.BanchaRemotable"
	);	

}
?>