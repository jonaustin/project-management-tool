
<?= $form->create('Project', array('action'=>'edit')) ?>
    <h3>Project Edit:</h3>

    <fieldset class="module aligned">
        <h2> Project Description: </h2>
        
        <div class="form-row">
        		<? echo $form->input('name'); ?>
        </div>
        <div class="form-row">

            <div>
                <label>Initial Job Code</label>
                <?php echo $this->data['JobCode']['code'] ?>
                <?php #echo $form->hidden('JobCode.code', array('value'=>$this->data['JobCode']['code'])); ?>
                <br><br>
            </div>
            <div>
                <label>Description</label>
                <?php echo $this->data['JobCode']['description'] ?>
                <?php #echo $form->hidden('JobCode.description', array('value'=>$this->data['JobCode']['description'])); ?>
            </div>
        </div>
        <div class="form-row">
            <div class="input optional">
                <label for="ProjectClientId">Client</label>
                <?php echo $this->data['Client']['name'] ?>
                <?php echo $form->hidden('Project.client_id', array('value'=>$this->data['Project']['client_id'])); ?>
                <?php echo $form->hidden('Client.name', array('value'=>$this->data['Client']['name'])); ?>
            </div>
        </div>
        <div class="form-row">
                <?php echo $form->input('Employee', array('type'=>'select','multiple'=>true, 'options'=>$employees)); ?>
        </div>
        <div class="form-row plainlist">
            <label>Development Language: </label> 
                <?php echo $form->input('language', array('type'=>'radio', 'options'=>array('php'=>'PHP','asp'=>'ASP.NET','other'=>'Other'), 'legend'=>false,'label'=>false)); ?>
    </fieldset>

    <fieldset class="module aligned">
        <h2>Website URLs:</h2>
        <div class="form-row">
                <?php echo $form->input('dns_dev'); ?>
        </div>
        <div class="form-row">
                <?php echo $form->input('dns_proto'); ?>
        </div>
        <div class="form-row">
                <?php echo $form->input('dns_live'); ?>
        </div>
    </fieldset>

    <fieldset class="module aligned">
        <h2> Database: </h2>
        <div class="form-row">
                <?php echo $form->input('database_name'); ?>
        </div>
    </fieldset>

    <fieldset class="module aligned">
        <h2> Subversion Browse: </h2>
        <div class="form-row">
                <?php echo $html->link(SVN_URL . $this->data['Project']['subversion_url']) ?>
        </div>
    </fieldset>

    <fieldset class="module aligned">
        <h2> Linkchecker </h2>
        <div class="form-row">
                <?php echo $form->checkbox('linkchecker'); ?> Linkchecker
        </div>
    </fieldset>

    

<!--
    <fieldset class="module aligned">
        <h2> Wiki Topic: </h2>
        <div class="form-row">
                <?php echo $html->link($this->data['Project']['wiki_url']) ?>
        </div>
    </fieldset>
-->

<!--
    <fieldset class="module">
        <h2>QA Tools</h2>
            
            <div class="info"> Note: Once checked each of these will unhide a div containing further options </div>
<br>
            <div class="info"> The general idea is that one would set a recurring time (i.e. weekly) for these to be checked and any errors found would be emailed to a specified person or persons</div>
        <div class="form-row plainlist">
            <ul>
                <li><label><input type="checkbox" name="qa" id="linkchecker" value="linkchecker"> Link Checker </label> </li>
                <li><label><input type="checkbox" name="qa" id="linkchecker" value="linkchecker"> HTML Validator </li>
                <li><label><input type="checkbox" name="qa" id="linkchecker" value="linkchecker"> CSS Validator </li>
                <li><label><input type="checkbox" name="qa" id="linkchecker" value="linkchecker"> RSS Validator </li>
                <li><label><input type="checkbox" name="qa" id="linkchecker" value="linkchecker"> XML Validator </li>
            </ul>

        </div>
-->
              

    </fieldset>
        <div class="submit-row">
            <label>&nbsp;</label><input type="submit" value="Update Project" />
        </div>
</form>

<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Project', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Projects', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Job Codes', true), array('controller'=> 'job_codes', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Job Code', true), array('controller'=> 'job_codes', 'action'=>'add')); ?> </li>
	</ul>
</div>


        
        <br class="clear" />
