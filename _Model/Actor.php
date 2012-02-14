<?php
class Actor extends AppModel {

	var $name = 'Actor';
	var $validate = array(
		'name' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
		'Movie' => array(
			'className' => 'Movie',
			'joinTable' => 'movies_actors',
			'foreignKey' => 'actor_id',
			'associationForeignKey' => 'movie_id',
			'unique' => true
		)
	);
    var $actsAs = array(
            "Bancha.BanchaRemotable"
    	);

}
?>