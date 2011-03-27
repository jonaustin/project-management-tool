<?php
/* SVN FILE: $Id: default.ctp 6311 2008-01-02 06:33:52Z phpnut $ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.cake.libs.view.templates.layouts
 * @since			CakePHP(tm) v 0.10.0.1076
 * @version			$Revision: 6311 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2008-01-02 00:33:52 -0600 (Wed, 02 Jan 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>
		<?php __('CMD Project Tool:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->charset();
		echo $html->meta('icon');

		echo $scripts_for_layout;

		echo $html->css('grids.css')."\n";
		echo $html->css('forms.css')."\n";
		echo $html->css('jquery.autocomplete.css')."\n";
		echo $html->css('cake.generic');


        if (isset($javascript)) {
            echo $javascript->link('jquery-1.2.3.min.js')."\n";
            echo $javascript->link('jquery.form.js')."\n";
            #echo $javascript->link('jquery-1.2.3.js')."\n";
            /*
            echo $javascript->link('jquery.bgiframe.min.js')."\n";
            echo $javascript->link('dimensions.js')."\n";
            echo $javascript->link('jquery.autocomplete.js')."\n";
            */

        }



	?>


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

</head>
<body>
<div id="doc">

    
    <!-- Header -->
    <div id="hd">
        <div id="branding">
        
<h1 id="site-name">CMD Project Tool</h1>

        </div>
        <div id="user-tools">

            &nbsp;
            
        </div>
        <div id="nav">
            <form action="/messages/results/" method="POST"> 
                <!--<span id="navsearch"> <label for="id_message_search" class="small"> Template Search: </label> <input type="text" name="message_search" id="id_message_search"> </span>-->

            </form>
            <!--
            <span id="navtabs">
            <ul>
                <li id="" style="margin-left: 1px"><a href="/" title="Home"><span>Home</span></a></li>
                <li id=""><a href="/about/" title="about"><span>About</span></a></li>
                <li id=""><a href="/contact/" title="contact"><span>Contact</span></a></li>
                
                <li id="current"><a href="/accounts/prefs_advanced/" title="Preferences"><span>Preferences</span></a></li>

                <li id=""><a href="/accounts/messages/" title="My Advisories"><span>My Advisories</span></a></li>
                
            </ul>
        </span>
            -->
        </div> 


    </div>
    <!-- END Header -->
    <!--<div class="breadcrumbs"><a href="/">Home</a></div>-->
    
    <div id="bd" class="prefs">
			<?php
				if ($session->check('Message.flash')):
						$session->flash();
				endif;
			?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php echo $html->link(
							$html->image('cake.power.gif', array('alt'=> __("CakePHP: the rapid development php framework", true), 'border'=>"0")),
							'http://www.cakephp.org/',
							array('target'=>'_new'), null, false
						);
			?>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>
