<?php
	session_start();
	include 'include/header.php';
?>

<script>
	$(function(){
		<?php
			/**
			 * エラーでリダイレクトされた時に実行される
			 */
			if($_SESSION['error']){
				echo '
					text_require($(".js-text-require input[type=text]"));
					check_require($(".js-checkbox-require input[type=checkbox]"));
					radio_require($(".js-radio-require input[type=radio]"));
					select_require($(".js-select-require select"));
				';
			}
		?>
	});
</script>

<div id="content">
	
	<form name="mailform" action="complete.php" method="POST">
		<table>
			<tr>
				<th>名前</th>
				<td class="js-text-require">
					<input type="text" name="name" value="<?php print $_SESSION['name']; ?>">
					<div class="error">必須項目です。</div>
				</td>
			</tr>
			<tr>
				<th>電話番号</th>
				<td class="js-text-require">
					<input type="text" name="phone" value="<?php print $_SESSION['phone']; ?>">
					<div class="error">必須項目です。</div>
				</td>
			</tr>
			<tr>
				<th>ラジオボタン</th>
				<td class="js-radio-require">
					<?php 
						$radio_sample = ['ラジオサンプル1','ラジオサンプル2','ラジオサンプル3'];
						foreach($radio_sample as $v){
							if($_SESSION['radio-sample'] == $v){
								print '<label><input type="radio" name="radio-sample" value="'.$v.'" checked="checked">'.$v.'</label>';	
							} else {
								print '<label><input type="radio" name="radio-sample" value="'.$v.'">'.$v.'</label>';
							}
						}
						unset($v);
					?>
					<div class="error">必須項目です。</div>
				</td>
			</tr>
			<tr>
				<th>チェックボックス</th>
				<td class="js-checkbox-require">
					<?php 
						$checkbox_sample = ['チェックサンプル1','チェックサンプル2','チェックサンプル3'];
						foreach($checkbox_sample as $v){
							if(in_array($v, $_SESSION['checkbox-sample'])){
								print '<label><input type="checkbox" name="checkbox-sample[]" value="'.$v.'" checked="checked">'.$v.'</label>';	
							} else {
								print '<label><input type="checkbox" name="checkbox-sample[]" value="'.$v.'">'.$v.'</label>';
							}
						}
						unset($v);
					?>
					<div class="error">必須項目です。</div>
				</td>
			</tr>
			<tr>
				<th>セレクトボックス</th>
				<td class="js-select-require">
					<select name="select-sample">
						<option></option>
						<?php
							$select_sample = ['セレクトサンプル1','セレクトサンプル2','セレクトサンプル3'];
							foreach($select_sample as $v){
								if($_SESSION['select-sample'] == $v){
									print '<option selected="selected">'.$v.'</option>';		
								} else {
									print '<option>'.$v.'</option>';		
								}
							}
							unset($v);
						?>
					</select>					
					<div class="error">必須項目です。</div>
				</td>
			</tr>
			<tr>
				<th>本文</th>
				<td class="js-text-require"><textarea name="content" cols="30" rows="10"><?php print $_SESSION['content']; ?></textarea></td>
			</tr>
		</table>
		<input class="btn" type="submit">
	</form>
</div>

<?php include 'include/footer.php'; ?>