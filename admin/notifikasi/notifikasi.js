var groupId = $("#group_id").val();

updateNotifikasi(groupId);

setInterval(function(){ 
	// updateNotifikasi(groupId);
},3600 * 1); // 10 detik


function updateNotifikasi(groupId){

	var request = $.ajax({
	  type    : "POST",
	  url     : "notifikasi/ajax_notif.php",
	  data    : {
	    group_id: groupId
	  }
	});
	request.done(function (msg) {
		var respons = JSON.parse(msg);
		if(!respons.status) return;
		var jumlahNotif = respons.data.length;
		var dataNotif = respons.data;
		$("#header-title-notif").html("Kamu Punya "+jumlahNotif+" Notif");
		$("#header-notif").html(jumlahNotif);

		 $("#notifications-list").html("");

		for (var i = 0; i < dataNotif.length; i++) {
			var status = dataNotif[i].status;
			var orderId = dataNotif[i].id_order;
			var html = " <li>"
                    +"<a href='#'>"
                     +" <i class='fa fa-users text-aqua'></i> No Order :"+orderId+" ("+status+")"
                    +"</a>"
                  +"</li>";

             $("#notifications-list").prepend(html);
		}
	   console.log("LOAD NOTIFIKASI "+groupId);
	});
	
}