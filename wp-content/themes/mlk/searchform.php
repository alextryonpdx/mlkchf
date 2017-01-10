<!-- search -->
<form class="searcher" method="get" action="<?php echo home_url(); ?>" role="search">
	<input class="search-input" onclick="showSearch()" type="search" name="s" placeholder="Search">
	<input class="search-submit" type="submit" role="button"></input>
</form>
<script>
$('#search-standin').click( function() {
		$('.searcher').css('display', 'inline-block');
		$('#search-standin').css('display', 'none');
	});

</script>
<!-- /search -->
