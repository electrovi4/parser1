<?php 




?>
<article> 
 		<!-- content -->
 		<?php
 		while($row = mysql_fetch_assoc($otvet)){
 			echo "<section>
 			<h2>{$row['title']}</h2>
 			{$row['content']}
 			<p class=\"date\">{$row['date']}</p>
 			</section>";
 		
 		}
 		?>
 	</article>
<nav>
<?php
if( $page > 1 ) echo '<a href="index.php?page='.($page-1).'">← туда</a>';
if( $page < $pages ) echo '<a href="index.php?page='.($page+1).'">туда →</a>';
?>
</nav>