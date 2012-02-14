<?php
class Movie extends AppModel {

	var $name = 'Movie';
	var $validate = array(
		'director_id' => array('numeric'=>array('rule'=>'numeric','message'=>'Invalid director')),
		'name' => array('notempty'),
		'year' => array('numeric'=>array('rule'=>'numeric','message'=>'Must be a year'))
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Director' => array(
			'className' => 'Director',
			'foreignKey' => 'director_id',
		)
	);

	var $hasAndBelongsToMany = array(
		'Actor' => array(
			'className' => 'Actor',
			'joinTable' => 'movies_actors',
			'foreignKey' => 'movie_id',
			'associationForeignKey' => 'actor_id',
			'unique' => true,
		)
	);
	var $actsAs = array(
        "Bancha.BanchaRemotable"
	);	

}
?>