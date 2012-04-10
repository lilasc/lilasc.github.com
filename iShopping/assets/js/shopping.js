function categoryChanged() {
	$("#select_category").text($(this).text());
}

function loginBefore() {
	$("#login-message").css("display", "none");
}

function login() {
	var name = $("#user-name").val();
	var password = $("#password").val();

	$.ajax({
		type : "POST",
		url : "login.php",
		data : "name=" + name + "&password="+password
	}).done(loginResult);
}

function loginResult(result) {
	if (result == "success") {
		$("#user-info").text($("#user-name").val());
		$("#login-model").modal('hide')
		loginUserInfo();
	} 
	else {
		$("#login-message").css("display", "inline");
		$("#login-message").text(result);
	}
}

function loginUserInfo() {
	$("#trigger-login-btn").css("display", "none");
	$("#trigger-signup-btn").css("display", "none");
	$("#trigger-edit-btn").css("display", "block");
	$("#trigger-logout-btn").css("display", "block");
	$("#user-info-split").css("display", "block");
	$("#trigger-delete-btn").css("display", "block");
}

function initUserInfo() {
	$("#trigger-edit-btn").css("display", "none");
	$("#trigger-logout-btn").css("display", "none");
	$("#user-info-split").css("display", "none");
	$("#trigger-delete-btn").css("display", "none");
}

function userDelete() {
	$.ajax({
		type : "POST",
		url : "verify.php",
		data : ""
	}).done(userDeleteResult);
}

function userDeleteResult(result) {

}

function signUpBefore() {
	$("#sign-up-message").css("display", "none");
}

function signUp() {
	var name = $("#sign-up-user-name").val();
	var password = $("#sign-up-password").val();
	var vpassword = $("#verify-sign-up-password").val();

	if (name == "") {
		$("#sign-up-message").css("display", "inline");
		$("#sign-up-message").text("Oops, please enter the user name.");
		return;
	}
	
	if (password == "" || vpassword == "") {
		$("#sign-up-message").css("display", "inline");
		$("#sign-up-message").text("Oops, please enter the password.");
		return;
	}
	
	if (password != vpassword) {
		$("#sign-up-message").css("display", "inline");
		$("#sign-up-message").text("Oops, two passwords entered are not equal.");
		return;
	}

	$.ajax({
		type : "POST",
		url : "signup.php",
		data : "name=" + name + "&password=" + password
	}).done(signUpResult);
}

function signUpResult(result) {
	$("#user-info").text($("#sign-up-user-name").val());
	$("#sign-up-model").modal('hide')
	loginUserInfo();
}

function saveChanges() {
	var name = $.trim($("#user-info").text());
	var password = $("#new-password").val();
	var vpassword = $("#new-vpassword").val();
	
	if (password == "" || vpassword == "") {
		$("#edit-message").css("display", "inline");
		$("#edit-message").text("Oops, please enter the password.");
		return;
	}
	
	if (password != vpassword) {
		$("#edit-message").css("display", "inline");
		$("#edit-message").text("Oops, two passwords entered are not equal.");
		return;
	}
	
	$.ajax({
		type : "POST",
		url : "editinfo.php",
		data : "name=" + name + "&password=" + password
	}).done(saveChangesResult);
}

function saveChangesResult() {
	$("#edit-model").modal('hide');
}

function deleteUser() {
	var name = $.trim($("#user-info").text());
	$.ajax({
		type : "POST",
		url : "del_user.php",
		data : "name=" + name
	}).done(deleteUserResult);
}

function deleteUserResult() {
	$("#user-info").text("User");
	$("#delete-model").modal('hide');
}

function logout() {
	var name = $.trim($("#user-info").text());
	
	$.ajax({
		type : "POST",
		url : "logout.php",
		data : "data"
	}).done(logoutResult);
}

function logoutResult() {
	window.location.reload();
}

function showGoodModel() {
	var gid = $(this).attr('id');

	$.ajax({
		type : "POST",
		url : "get_goods_info.php",
		data : "gid=" + gid
	}).done(showGoodModelResult);
}

function showGoodModelResult(result) {
	if (result == "login") {
		$('#login-model').modal('show');
		return;
	}
	var info = result.split(",");
	$("#good-model a").attr("id", info[0]);
	$("#goods-name").text(info[1]);
	$("#goods-price").text("Price: $" + info[2]);
	$("#goods-img").attr("src", info[3]);
	$("#goods-number").text("Number: " + info[4]);
	$("#goods-description").text(info[5]);
	$('#good-model').modal('show');
}

function goodsBuy() {
	var gid = $(this).attr('id');
	var name = $.trim($("#user-info").text());
	$.ajax({
		type : "POST",
		url : "add2cart.php",
		data : "gid=" + gid + "&name=" + name
	}).done(goodsBuyResult);
}

function goodsBuyResult(result) {
	$('#good-model').modal('hide');
}

function shoppingCartShow() {
	var name = $.trim($("#user-info").text());
	
	$.ajax({
		type : "POST",
		url : "get_shopping_cart_info.php",
		data : "name=" + name
	}).done(shoppingCartShowResult);
}

function shoppingCartShowResult(result) {
	$("#shopping-cart-content").html(result);
	$('#shopping-cart-modal').modal('show');
}

function cartBuy() {
	var name = $.trim($("#user-info").text());
	
	$.ajax({
		type : "POST",
		url : "buy.php",
		data : "name=" + name
	}).done(cartBuyResult);
}

function cartBuyResult(result) {
	$('#shopping-cart-modal').modal('hide');
}

function triggerZelda() {
	var gid = "13";

	$.ajax({
		type : "POST",
		url : "get_goods_info.php",
		data : "gid=" + gid
	}).done(showGoodModelResult);
}

function init() {
	$(".category").click(categoryChanged);
	$("#login-button").click(login);
	$("#trigger-login-btn").click(loginBefore);
	$("#trigger-delete-btn").click(userDelete);
	$("#sign-up-button").click(signUp);
	$("#trigger-signup-btn").click(signUpBefore);
	$("#save-button").click(saveChanges);
	$("#delete-button").click(deleteUser);
	$("#trigger-logout-btn").click(logout);
	$("#goods-buy-button").click(goodsBuy);
	$("#shopping-cart-btn").click(shoppingCartShow);
	$("#cart-buy-button").click(cartBuy);
	$(".zelda").click(triggerZelda);
	
	$("div.good-block > a").click(showGoodModel);
	
	if ($.trim($("#user-info").text()) == "User")
		initUserInfo();
	else
		loginUserInfo();
	
	$('.carousel').carousel({
		interval : 4000
	});
}
window.onload = init;