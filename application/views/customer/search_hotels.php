<?php include('public_header.php');?>
<div class="container">	
		<h1>Search Results</h1>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Sr. no.</th>
					<th>Hotel Name</th>
					<th>Location</th>
					<th>Available Meals</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<?php if(count($hotels)): ?>
					<?= $count =$this->uri->segment(4);?>
					<?php foreach($hotels as $hotel): ?>
					<td><?= ++$count ?></td>
					<td><a href="<?=base_URL('index.php/customer/view_hotel_details/'."{$hotel->hotel_id}")?>"><?=$hotel->hotel_name ?></a></td>
					<td><?=$hotel->location ?></td>
					<td><?php if($hotel->meals):echo 'yes'; else: echo 'no'; endif;?></td>
					
				</tr>
				<?php endforeach; ?>
				<?php else: ?>
				<tr>
					<td colspan="3">No records found.</td>
				</tr>	
				<?php endif;?>
			</tbody>
		</table>
	<?= $this->pagination->create_links();?>
</div>
<?php include('public_footer.php');?>