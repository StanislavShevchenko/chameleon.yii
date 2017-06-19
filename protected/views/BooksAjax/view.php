	<div class="row">
		<div class="col-lg-12">
			<?php if(!empty($book->attributes['preview'])):?>
				<div class="row">
					<div class="col-lg-12">
						<img src="<?=$book->attributes['preview']?>" width="300">
					</div>
				</div>				
			<?php endif; ?>					
			<div class="row">
				<div class="col-lg-12">
					<h3><?=$book->attributes['name']?> (<?=date('d.m.y', $book->attributes['date'])?>) </h3>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<h4><?=$book->authors->attributes['firstname']?> <?=$book->authors->attributes['lastname']?></h4>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-lg-5">
					<h5>Дата создания записи:</h5>
				</div>
				<div class="col-lg-6">
					<h5><?=date('d.m.y', $book->attributes['date_create'])?></h5>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-5">
					<h5>Дата редактирования записи:</h5>
				</div>
				<div class="col-lg-6">
					<h5><?=date('d.m.y', $book->attributes['date_update'])?></h5>
				</div>
			</div>
		
		</div>								
	</div>

