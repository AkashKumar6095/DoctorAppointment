<footer id="footer">
<div id="midWrap">
	<ul class="footerLinks">
		<li><a href="<?php echo $siteroot;?>/contact.php">Contact Us</a></li>
		<li><a href="<?php echo $siteroot;?>/privacy.php">Privacy policy</a></li>
		<li><a href="<?php echo $siteroot;?>/help.php">Help</a></li>
	</ul>
</div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).on('click', '.tabMain li', function(event) {
		var target = $(this).attr('data-id');
		$('.tabContainer').hide();
		$(target).show();
		$(".tabMain li").removeClass('activeTab');
		$(this).addClass('activeTab');
	});

/*resultChange script start*/
$(document).on('click', '.dantistList li', function() {
	var target = $(this).attr('data-id');
	$(".resultChange").hide();
	$(target).show();
	$(".dantistList li").removeClass('doctorActive');
	$(this).addClass('doctorActive');
});
// search overlay script
$(document).on('click', '.searchTab li', function(event) {
	var target = $(this).attr('data-id');
	$(".searchTabContainer").hide();
	$(target).show();
	$(".searchTab li").removeClass('searchTabActive');
	$(this).addClass('searchTabActive');
});
// search overlay script
$(document).on('click', '.searchCancel', function(event) {
	$(".banOverlay").hide();
});
$(document).on('click', '.searchOverlayTrigger', function(event) {
	event.preventDefault();
	$(".banOverlay").show();
});
</script>

</body>
</html>