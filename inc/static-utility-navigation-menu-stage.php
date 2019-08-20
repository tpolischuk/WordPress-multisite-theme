<div id="utility-nav" class="wrap">
	<ul id="menu-utitility-nav" class="utility-nav genesis-nav-menu mobile-hidden">
		<li id="menu-item-38014" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-38014">
			<a href="https://www.plos.org/">PLOS.ORG</a>
		</li>
		<li id="menu-item-38015" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-38015">
			<a href="https://www.plos.org/publications/journals/">PUBLICATIONS</a>
		</li>

		<li class="right menu-item">
			<form class="search-form" id="header_searchform" method="get" action="/">
				<div>
					<input type="text" value="Search PLOS Blogs" name="s" id="s" onfocus="if (this.value == 'Search PLOS Blogs') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search PLOS Blogs';}" />
					<!-- Because Relevannsi doesn't let you implicitly include all blogs, we do a hacky loop to include all (100) blog IDs -->
					<input type="hidden" name="searchblogs" value=" <?php $count = 1; while ($count<=100) {echo $count . ','; $count++; }?> "/>
					<input type="submit" id="searchsubmit" value="Search"/>
				</div>
			</form>
		</li>
	</ul>
</div>
