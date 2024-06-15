<aside id="my_aside" class="bg-light">
	<div class="container">
		<div class="row flex-column justify-content-around gap-3 py-5 px-3">

			<div>
				<h4>Your Restaurant</h4>
			</div>
			<div>
				<ul class="list-unstyled lh-lg">
					<li>
						<a class="nav-link" href="{{ route('dashboard') }}">
							<i class="fa-solid fa-house-chimney"></i> Home
						</a>
					</li>
					<li>
						<a class="nav-link" href="{{ route('admin.dishes.index') }}">
							<i class="fa-solid fa-utensils"></i> Menu
						</a>
					</li>
					<li>some nav voice</li>
					<li>some nav voice</li>
				</ul>
			</div>

		</div>
	</div>
</aside>
