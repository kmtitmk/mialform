/*-----------------------------------
 * 処理の実行
 -----------------------------------*/
$(function(){
	/**
	 * バリデーションの実行タイミング
	 */
	$('.js-text-require input[type="text"]').blur(function(){
		text_require($(this));
	});
	$('.js-checkbox-require input[type="checkbox"]').on('change', function(){
		check_require($(this));
	});
	$('.js-radio-require input[type="radio"]').on('change', function(){
		radio_require($(this));
	});
	$('.js-select-require select').on('change', function(){
		select_require($(this));
	});	
	
	
	/**
	 * エラーがある場合submitのを止める
	 */
	$('[name="mailform"]').submit(function() {
		if($('.error.on').length > 0){
			return false
		}
	});
});


/*-----------------------------------
 * 各種関数のまとめ
 -----------------------------------*/
/**
 * input[type="text"]のバリデーション
 */ 		
function text_require(_this) {
	if(_this.val() == false){	
		_this.next('.error').addClass('on');
	} else {
		_this.next('.error').removeClass('on');
	}
}


/**
 * チェックボックスのバリデーション
 */		
function check_require(_this) {
	var check_require = _this.parents('td.js-checkbox-require').find('input[type="checkbox"]:checked').length
	if(check_require > 0){
		_this.parents('td.js-checkbox-require').children('.error').removeClass('on');
	} else {
		_this.parents('td.js-checkbox-require').children('.error').addClass('on');
	}
}


/**
 * ラジオボタンのバリデーション
 */
function radio_require(_this) {
	var radio_require = _this.parents('td.js-radio-require').find('input[type="radio"]:checked').length
	if(radio_require > 0){
		_this.parents('td.js-radio-require').children('.error').removeClass('on');
	} else {
		_this.parents('td.js-radio-require').children('.error').addClass('on');
	}
}


/**
 * セレクトのバリデーション
 */
function select_require(_this) {
	var select_require = _this.val();
	if(select_require == false){
		_this.parents('td.js-select-require').children('.error').addClass('on');
	} else {
		_this.parents('td.js-select-require').children('.error').removeClass('on');
	}
}




