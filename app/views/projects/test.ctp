<meta name="robots" content="NONE,NOARCHIVE" />

<script type="text/javascript">
/*
$().ready(function() {

    function findValueCallback(event, data, formatted) {
        $("<li>").text( !data ? "No match!" : "Selected: " + formatted).appendTo("#result");
    }
    
    function formatItem(row) {
        return row[0];
    }
    
    function formatResult(row) {
        return row[0];
    }
    $("#id_message_search").autocomplete("/messages/autocomplete/", {
        delay: 150,
        width: 500,
        formatItem: formatItem,
        formatResult: formatResult,
        selectFirst: false
    });
    $(":text, textarea").result(findValueCallback).next().click(function() {
        $(this).prev().search();
    });
    $("#id_message_search").result(function(event, data, formatted) {
        $(this).find("..+/input").val(data[1]);
    });
});
*/
</script>


        
        
        



<form action="" method="POST">
    <h3>Project Creation:</h3>

    <fieldset class="module aligned">
        <h2> Project Description: </h2>
        
        <div class="form-row">
            <label>Project Name: </label> <input type="text" id="project_name">
        </div>
        <div class="form-row">
            <label>Job Code: </label> <input type="text" id="job_code">
        </div>
        <div class="form-row">
            <label>Client: </label> <input type="text" id="client">
        </div>
        <div class="form-row">
            <div class="info"> Each of the selected members will be emailed project information </div>
            <label>Team Members: </label> 
            <select multiple="multiple" id="team_members"> 
                <option>[multi-select] Fill names/emails from LDAP query</option>
            </select>
        </div>
        <div class="form-row plainlist">
            <div class="info"> The language chosen will effect factors such as database creation method </div>
            <label>Development Language: </label> 
            <ul>
                <li><label><input type="radio" name="dev_lang" value="PHP" id="id_dev_lang_php" /> PHP</label></li>
                <li><label><input type="radio" name="dev_lang" value="ASP.NET" id="id_dev_lang_aspnet" /> ASP.NET</label></li>
                <li><label><input type="radio" name="dev_lang" value="Other" id="id_dev_lang_other" /> Other</label></li>
            </ul>
    </fieldset>

    <fieldset class="module aligned">
        <h2>Website URLs:</h2>
        <div class="form-row">
            <div class="info"> IS will be sent an email to set up dev/proto DNS entries </div>
            <label>Dev:</label> <input type="text" value="project_name.dev.cmdpdx.com">
        </div>
        <div class="form-row">
            <label>Proto:</label> <input type="text" value="project_name.proto.cmdpdx.com">
        </div>
        <div class="form-row">
            <label>Live:</label> <input type="text" value="">
        </div>
    </fieldset>

    <fieldset class="module aligned">
        <h2> Database Creation: </h2>
        <div class="form-row">
            <label> Database Name: </label> <input type="text" id="database_name" name="database_name">
        </div>
    </fieldset>

    <fieldset class="module aligned">
        <h2> Bugtracker Project Creation: </h2>
        <div class="form-row">
            <div class="info">  Checking this will cause a new bugtracker project to be created and team members assigned </div>
            <label> <input type="checkbox" name="bugtracker" id="bugtracker" value="bugtracker"> Bugtracker Project </label>
        </div>
    </fieldset>

    <fieldset class="module aligned">
        <h2> Wiki Topic Creation: </h2>
        <div class="form-row">
            <label> <input type="checkbox" name="wiki" id="wiki" value="wiki"> Wiki Topic </label>
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
