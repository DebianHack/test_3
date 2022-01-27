<?php 

$sql = "SELECT * FROM polzovateli";

// выполнить sql запрос
$result = mysqli_query($connect, $sql);
// mysqli_num_rows - получить количество результатов
$col_polzovateletey = mysqli_num_rows($result);

 ?>



<!-- Отвечает за пользователей в окне -->

<div id="spisok">
				
				<ul>
					<?php
						$i = 0;

						
						
						if(isset($_COOKIE["polzovatel_id"]))
						{
							if(isset($_GET["poisk-text"]))
						{
							$sql = "SELECT * FROM polzovateli WHERE name LIKE '%".$_GET["poisk-text"]."%'";
							
							$result3 = mysqli_query($connect,$sql);
							$col_polzovateletey3 = mysqli_num_rows($result3);
							while ($i < $col_polzovateletey3) 
						 	{
						 	$polzovatel = mysqli_fetch_assoc($result3);
						 	?>
						 	<li>
						 		<a href='/index.php?user=<?php echo $polzovatel["id"]; ?>'>
							 		<div class="avatar">
											<img src='<?php echo $polzovatel["photo"]; ?>'>
										</div>
									<h2><?php echo $polzovatel["name"]; ?></h2>
									<p>HI</p>
									<div class="time">09:10</div>
									
								</a>
						 	</li>
						 	<?php
						 	$i = $i + 1;
							}
						}
						else
						{
							$sql2 = "SELECT * FROM polzovateli WHERE id != '".$_COOKIE["polzovatel_id"]."'";
							$result2 = mysqli_query($connect, $sql2);

							$col_polzovateletey2 = mysqli_num_rows($result2);
							while ($i < $col_polzovateletey2) 
						 {
						 	$polzovatel = mysqli_fetch_assoc($result2);
						 	?>
						 		<li>
						 		<a href='/index.php?user=<?php echo $polzovatel["id"]; ?>'>
							 		<div class="avatar">
											<img src='<?php echo $polzovatel["photo"]; ?>'>
										</div>
									<h2><?php echo $polzovatel["name"]; ?></h2>
									<p>HI</p>
									<div class="time">09:10</div>
									
								</a>
						 	</li>
						 	<?php
						 	$i = $i + 1;
						 }
						}
							
						}
				?>
				</ul>
</div>


