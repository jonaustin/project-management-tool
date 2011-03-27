<?php
class JobCode extends AppModel {

	var $name = 'JobCode';
	var $useTable = 'job_codes';
	var $validate = array(
        'code' => array(
            'rule' => 'numeric',
            'message' => 'Please enter a numeric job code' 
        ),
        'description' => array(
            'rule' => array('minLength', 1),
            'required' => true,
            'message' => 'Please enter a title or description'
        ),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Project' => array('className' => 'Project',
								'foreignKey' => 'project_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>
