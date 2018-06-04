<?php
	session_start();
	
	
    $post_data = filter_input_array(INPUT_POST, array(
        'name'=>array(
            'filter' => FILTER_SANITIZE_STRING),
            
        'phone'=>array(
            'filter' => FILTER_SANITIZE_STRING),
            
        'radio-sample'=>array(
            'filter' => FILTER_SANITIZE_STRING),
            
        'checkbox-sample' => array(
            'flags' => FILTER_REQUIRE_ARRAY,
            'filter' => FILTER_SANITIZE_STRING),
            
        'select-sample' => array(
            'filter' => FILTER_SANITIZE_STRING),
            
        'content' => array(
            'filter' => FILTER_SANITIZE_STRING)
    ));     
    
    $_SESSION = $post_data;
    
    
    /**
	 * 直接アクセスさせない
	 */
    if($post_data == false){
		header("Location: /");
		exit();
    }
    
    
    /**
     * 空欄にしても良い項目
     */
    $required_none = ['content'];


	/**
	 * 必須項目空欄の場合リダイレクト
	 */
	foreach($post_data as $k => $v){
		if(!in_array($k, $required_none)){
			if($v == false) {
				$_SESSION['error'] = true;
				header("Location: /");
				exit();
			}
		}
	}
	unset($v);
	session_destroy();


/**
 * ぺー字の表示
 */
include 'include/header.php'; ?>

<div id="content">
	<p>送信完了しました。</p>
	<a href="/">戻る</a>
</div>

<?php include 'include/footer.php';