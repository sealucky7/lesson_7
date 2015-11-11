<form  method="post"  >
    <table>
			<tr>
				<td></td>
				<td><input type="radio" <?php echo (!isset($change_id) || $changeAd['private']==1) ? 'checked=""' : '';?> value="1" name="private">Частное лицо 
				    <input type="radio" <?php echo (isset($change_id) && $changeAd['private']==0) ? 'checked=""' : '';?> value="0" name="private">Компания
				</td>
			</tr>
			<tr>
				<td>Ваше имя</td>    
				<td><input type="text" maxlength="40" value="<?php echo (isset($change_id)) ? $changeAd['firstname'] : '';?>" name="firstname" ></td>
			</tr>
			<tr>
				<td>Электронная почта</td>
				<td><input type="email" value="<?php echo (isset($change_id)) ? $changeAd['email'] : '';?>" name="email" ></td>
        	</tr>
			<tr>
				<td></td>
				<td><input type="checkbox" <?php echo isset($changeAd['no_mails']) ? 'checked=""' : '';?> value="" name="no_mails" >Я не хочу получать вопросы по объявлению по e-mail</td>
    
			</tr>
			<tr>
				<td>Номер телефона</td>
				<td><input type="tel"  value="<?php echo (isset($change_id)) ? $changeAd['phone'] : '';?>" name="phone" ></td>
     
			</tr>
			<tr>
				<td>Город</td>
				<td>
					<select title="Выберите Ваш город" name="location_id" > 
						<option value="">-- Выберите город --</option>
						<option disabled="disabled">-- Города --</option>
						<?php
							$location_sel=641780;
							foreach ($location_id as $id => $location) {
								if (!isset($change_id) && $id ==$location_sel ){ ?>
									<option <?php echo 'selected=""';?> data-coords=",," value="<?php echo $id;?>"><?php echo $location;?></option>
								<?php
								}
								else {?>
									<option <?php echo (isset($change_id) && $changeAd['location_id']==$id) ? 'selected=""' : '';?> data-coords=",," value="<?php echo $id;?>"><?php echo $location;?></option>   
						
								<?php
								}
							}	
								?>
					</select>
				</td>
      
			</tr>
			<tr>
				<td>Категория</td>
				<td>
					<select title="Выберите категорию объявления" name="category_id"  required>
						<option value="">-- Выберите категорию --</option>
						<?php
								foreach ($categories as $id => $category) {
                                                                ?>	
                                                <optgroup label="<?=$id?>">
							<?php foreach ($category as $key => $value){
                                                            ?>
                                                    <option <?php echo (isset($change_id) && $changeAd['category_id']==$key) ? 'selected=""' : '';?> value="<?php echo $key;?>">  
                                                                <?php echo $value;?>
                                                    </option>
								<?php }?>
							</optgroup>
                                                        <?php
								}
								?>

					</select>
				</td>	
			</tr>
			<tr>
				<td>Название объявления</td>
				<td><input type="text" maxlength="50"  value="<?php echo (isset($change_id)) ? $changeAd['title'] : '';?>" name="title" required></td>
    		</tr>
			<tr>
				<td>Описание объявления</td>
				<td><textarea maxlength="3000"  name="description" ><?php echo (isset($change_id)) ? $changeAd['description'] : '';?></textarea></td>
      		</tr>
			<tr>
				<td>Цена</td>
				<td><input type="text" maxlength="9" value="<?php echo (isset($change_id)) ? $changeAd['price'] : '0';?>" name="price" >&nbsp;руб.</td>
                                <td><input type="hidden" name="hidden_id" value="<?php if(isset($change_id)) echo $change_id; ?>"></td>
      		</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="<?php if(!isset($change_id)) {echo 'Подать объявление';}
                                                                                                          else { echo 'Сохранить'; }?>" name="main_form_submit" >
				</td> 
			</tr>
                     
	</table>
</form>

<div style="border-bottom: 2px solid #000; width: 500px; height: 2px; display: block; margin-bottom: 20px;"></div>

