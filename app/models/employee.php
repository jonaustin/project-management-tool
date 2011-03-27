<?php
class Employee extends AppModel {

	var $name = 'Employee';
	var $useTable = 'employees';
    var $displayField = 'common_name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
			'Project' => array('className' => 'Project',
						'joinTable' => 'employees_projects',
						'foreignKey' => 'employee_id',
						'associationForeignKey' => 'project_id',
						'unique' => true,
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'limit' => '',
						'offset' => '',
						'finderQuery' => '',
						'deleteQuery' => '',
						'insertQuery' => ''
			)
	);

}
?>
