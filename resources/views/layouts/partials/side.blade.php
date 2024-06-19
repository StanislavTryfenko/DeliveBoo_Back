<aside id="my_aside" class="bg-light">
	<div class="container">
		<div class="row flex-column justify-content-around gap-3 py-5 px-3">

			<div>
				<h4>Il Tuo Ristorante</h4>
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
					<li>Altre Voci</li>
					<li>Altre Voci</li>
				</ul>
			</div>

		</div>
	</div>
</aside>