<div>
<ul>
	<li><a href="/">Home</a></li>
	<?php if(!User::isGuest()): ?>
		<li><a href="/sign">Sign In</a></li>
	<?php else: ?>
		<li><a href="/cabinet">Cabinet</a></li>
		<li><a href="/logout">Logout</a></li>
	<?php endif; ?>
</ul>
</div>