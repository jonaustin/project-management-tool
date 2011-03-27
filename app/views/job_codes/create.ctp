
<?= $form->create('Project', array('action'=>'create')) ?>
    <h3>Project Creation:</h3>

    <fieldset class="module aligned">
        <h2> Project Description: </h2>
        
        <div class="form-row">
        		<? echo $form->input('name'); ?>
        </div>
        <div class="form-row">
            <div class="input required">
                <?php echo $form->input('JobCode.code', array('type'=>'text','label'=>'Initial Job Code', 'div'=>false)); ?>
            </div>
            <div class="input required">
                <?php echo $form->input('JobCode.description', array('type'=>'text','label'=>'Description', 'div'=>false)); ?>
            </div>
        </div>
        <div class="form-row">
                <?php echo $form->input('client'); ?>
        </div>
        <div class="form-row">
            <div class="info"> Each of the selected members will be emailed project information </div>
                <?php echo $form->input('Employee', array('type'=>'select','multiple'=>true, 'options'=>$employees)); ?>
        </div>
        <div class="form-row plainlist">
            <div class="info"> The language chosen will effect factors such as database creation method </div>
            <label>Development Language: </label> 
                <?php echo $form->input('language', array('type'=>'radio', 'options'=>array('php'=>'PHP','asp'=>'ASP.NET','other'=>'Other'), 'legend'=>false,'label'=>false)); ?>
    </fieldset>

    <fieldset class="module aligned">
        <h2>Website URLs:</h2>
        <div class="form-row">
            <div class="info"> IS will be sent an email to set up dev/proto DNS entries </div>
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
        <h2> Database Creation: </h2>
        <div class="form-row">
                <?php echo $form->input('database_name'); ?>
        </div>
    </fieldset>

    <fieldset class="module aligned">
        <h2> Bugtracker Project Creation: </h2>
        <div class="form-row">
            <div class="info">  Checking this will cause a new bugtracker project to be created and team members assigned </div>
                <?php echo $form->input('bugtracker_id'); ?>
        </div>
    </fieldset>

    <fieldset class="module aligned">
        <h2> Wiki Topic Creation: </h2>
        <div class="form-row">
                <?php echo $form->input('wiki_url'); ?>
        </div>
    </fieldset>

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
              

    </fieldset>
        <div class="submit-row">
            <label>&nbsp;</label><input type="submit" value="Create Project" />
        </div>
</form>



        
        <br class="clear" />
