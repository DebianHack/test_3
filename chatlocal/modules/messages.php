<!-- Отвечает за вывод сообщений в окне -->

<?php 


?>
<!-- Отвечает за вывод сообщений в окне -->
<div id="spispok-message">
<ul>
	<?php
		$j = 0;
		// Если в запросе есть выбранный пользователь
		if(isset($_GET["user"]) || isset($send_polzovatel_id))
		{
			$user_id = null;

			if (isset($_GET["user"])) 
			{
				$user_id = $_GET["user"];
			}
			else
			{
				$user_id = $send_polzovatel_id;
			}


				// Получить сообщения которые отправлены пользователю
				 $sql = "SELECT * FROM messages ". // Выбираем все сообщения
				" WHERE (user_id_to = " . $user_id. // Где id отравляемому пользователю = $_GET["user"]
				 	" AND ot_user_to = ". $polzovatel_id.") ". // и отправлено от пользователя с id = 2
				 	" OR (user_id_to = ". $polzovatel_id." AND ot_user_to = ". $user_id .")"; // ИЛИ отправлено пользователю с id 2 и от пользователя с id = $_GET["user"]
				//
				$resultat = mysqli_query($connect,$sql);
				//
				$col_messages = mysqli_num_rows($resultat);
		
		while($j < $col_messages)
			{ 
			 $sms = mysqli_fetch_assoc($resultat);
			//  Вывод сообщений в окне 
			
					?>
							<li>
								
							 	<div class="avatar">
							 		<a href='/index.php?user=<?php echo $sms["id"]; ?>'>
							 		<img src='<?php echo $sms["photo"]; ?>'>

							 		</a></div>
							 		<?php
							 			// Вывести имея конкретного пользователя
							 			$sql = "SELECT name FROM polzovateli WHERE id = ".$sms["ot_user_to"];
							 			// var_dump($sql);
							 			// Выполняем запрос
							 			$polzovatel = mysqli_query($connect, $sql);
							 			// записываем в переменную запрос с данными 
							 			$polzovatel = mysqli_fetch_assoc($polzovatel);
							 		?>
									
							 <h2> <?php echo$polzovatel["name"] ?> </h2>
							 <p> <?php echo $sms["message"] ?> </p>
							 <div class="time"><?php echo $sms["time"] ?></div>
							
							 </li>
							 <?php
							 $j = $j + 1;		
				}
		}
			else 
			{
				echo "<h2>Пользователь не выбран</h2>";
			 
			}
	?>
</ul>
</div>