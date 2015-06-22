<?php

?>



<footer class="footer container">

    <p class="copy-right">Power Dahua - 2015</p>

    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.2.min.js"></script>

</footer>

<style type="text/css">
.tooltip {
	display:none;
	position:absolute;
	border:1px solid red;
	background-color:#fff;
	border-radius:0;
	padding:10px;
	color:#000;
	font-size:12px Arial;
	z-index:99999;
	opacity:1;
}
</style>


<script type="text/javascript">
jQuery(document).ready(function($) {
        // Tooltip only Text
        $('#main area').hover(function(){
                // Hover over code
                var title = $(this).attr('title');
                var ads = $(this).attr('alt');
                var company = $(this).attr('data');				
				ads += ' - ' + company;                
                $('<p class="tooltip"></p>')
                .text(ads)
                .appendTo('body')
                .fadeIn('slow');				
        }, function() {
                // Hover out code                
                $('.tooltip').remove();
        }).mousemove(function(e) {
                var mousex = e.pageX + 15; //Get X coordinates
                var mousey = e.pageY + 5; //Get Y coordinates
                $('.tooltip')
                .css({ top: mousey, left: mousex })
        });
});
</script>

</html>