(function($){

	$(document).ready(function() {
		if($("body").hasClass("logged-in")) {
			$("#username").attr("disabled","disabled");
			$("#password").attr("disabled","disabled");
			$("#login").attr("disabled","disabled").text("LOGGED IN");
		}
		$("body")
			.on("click", "#login", function() {
				if($("body").hasClass("logged-in")) {
					$("#header_err").html("You are logged in").show();
				} else {
					var usr = $("#username").val();
					var pwd = $("#password").val();
					var init_usr = $("#usr-title").text();
					var init_pwd = $("#pwd-title").text();
					if( usr == '' ) {
						$("#usr-title").text( init_usr + "(Please fill in username field)" );
						if( !$("#usr-title").hasClass("err_msg") ) {
							$("#usr-title").addClass("err_msg")
						}
					}
					if( pwd == '' ) {
						$("#pwd-title").text( init_pwd + "(Please fill in password field)" );
						if( !$("#pwd-title").hasClass("err_msg") ) {
							$("#pwd-title").addClass("err_msg")
						}
					}
					if( usr != '' && pwd != '' ) {
						var data = 
						{
							action: 'sign_in',
							username: usr,
							password: pwd
						}
						$(this).attr("disabled","disabled").text("LOGGING IN...");
						$.ajax({
							url: ajax_url,
							type: "POST",
							data: data,
							success: function(response) { console.log(response);
								if(response.empty_username == 1) {
									$("#usr-title").text( init_usr + "(Invalid username)" );
									if( !$("#usr-title").hasClass("err_msg") ) {
										$("#usr-title").addClass("err_msg")
									}
								}
								if(response.wrong_password == 1) {
									$("#pwd-title").text( init_pwd + "(Wrong password)" );
									if( !$("#pwd-title").hasClass("err_msg") ) {
										$("#pwd-title").addClass("err_msg")
									}
								}
								if(Object.keys(response).length > 0) { //ES5+
									$("#login").removeAttr("disabled","disabled").text("LOG IN");
								} else {
									location.reload();
								}
							}
						})
					}
				}
			})
			.on("click", ".share a", function(e){
				e.preventDefault();
				var href = $(this).attr("href");
				ht_open_windows(href);
			})

		/* Useful function */
		function ht_open_windows(url) {
			window.open(url,"", "width=400, height=300, top=100, left=100");
		}
	})

})(jQuery)