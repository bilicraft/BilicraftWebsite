$(function(){
	var safeHouseShiled = ui('#safehouse-shiled');


	var tabMain = ui('#tab-main', {
		view : {
			safe : '#view-safe',
			excp : '#view-excp'
		}
	});

	var iptPassword       = ui('#ipt-password');
	var iptPasswordRepeat = ui('#ipt-password-repeat');
	var btnSavePassword   = ui('#btn-save-password', {
		click : function(){
			var p1 = iptPassword.val();
			var p2 = iptPasswordRepeat.val();
			if(!p1 || !p1.length){
				G.error('请输入要设置的密码');
				return false;
			}
			if(p1 != p2){
				G.error('两次输入的密码不一致');
				return false;
			}
			btnSavePassword.loading(true);
			G.method('safehouse.passwd', {
				password : p1
			}, function(c, d){
				btnSavePassword.loading(false);
				ui.notify('修改成功');
			}, function(c, m){
				btnSavePassword.loading(false);
				G.error(m);
			});
		}
	});
	var btnKickMain = ui('#btn-kick-main', {
		click : function(){
			ui.confirm({
				text : '确定要踢下线吗？',
				okCallback : function(){
					btnKick.loading(true);
					G.method('safehouse.kick_main', function(c, d){
						btnKick.loading(false);
						ui.notify('已踢');
					}, function(c, m){
						G.error(m);
						btnKick.loading(false);
					});
				}
			});			
		}
	});
	var btnKickLobby = ui('#btn-kick-lobby', {
		click : function(){
			ui.confirm({
				text : '确定要踢下线吗？',
				okCallback : function(){
					btnKick.loading(true);
					G.method('safehouse.kick_lobby', function(c, d){
						btnKick.loading(false);
						ui.notify('已踢');
					}, function(c, m){
						G.error(m);
						btnKick.loading(false);
					});
				}
			});			
		}
	});
	var btnCleanBag = ui('#btn-clean-bag', {
		click : function(){
			ui.confirm({
				text : '确定要清空数据吗？将丢失身上、背包的所有物品以及经验值、等级',
				okCallback : function(){
					btnCleanBag.loading(true);
					G.method('safehouse.clean_bag', function(c, d){
						btnCleanBag.loading(false);
						ui.notify('已清空');
					}, function(c, m){
						G.error(m);
						btnCleanBag.loading(false);
					});
				}
			});		
		}
	});
});	