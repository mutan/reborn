<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>

<script>
	tinymce.init({
		selector: "textarea", // #tinymce
		menubar : false,
		branding: false,
		plugins : 'advlist autolink link code image lists charmap print preview',
		toolbar: "undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist | adddate | tap insttap counter | lives movement flying power | air dark earth fire light water | code removeformat",

		setup : function(ed) {

			// Add a custom button
			ed.addButton('adddate', {
				title : 'Текущая дата',
				text : 'Дата',
				onclick : function() {
					ed.focus();
					ed.selection.setContent("[<?php echo date("d.m.y"); ?>] ");
				}
			});
			ed.addButton('tap', {
				title : 'Действие за поворот',
				image : '/icons/tap-16x16.png',
				onclick : function() {
					ed.focus();
					ed.selection.setContent('<img src="/icons/tap-16x16.png">');
				}
			});
			ed.addButton('insttap', {
				title : 'Мгновенное действие за поворот',
				image : '/icons/insttap-16x16.png',
				onclick : function() {
					ed.focus();
					ed.selection.setContent('<img src="/icons/insttap-16x16.png">');
				}
			});
			ed.addButton('lives', {
				title : 'Жизни',
				image : '/icons/lives-16x16.png',
				onclick : function() {
					ed.focus();
					ed.selection.setContent('<img src="/icons/lives-16x16.png">');
				}
			});
			ed.addButton('movement', {
				title : 'Движение',
				image : '/icons/movement-16x16.png',
				onclick : function() {
					ed.focus();
					ed.selection.setContent('<img src="/icons/movement-16x16.png">');
				}
			});
			ed.addButton('flying', {
				title : 'Полет',
				image : '/icons/flying-16x16.png',
				onclick : function() {
					ed.focus();
					ed.selection.setContent('<img src="/icons/flying.png">');
				}
			});
			ed.addButton('power', {
				title : 'Обычный удар',
				image : '/icons/power-16x16.png',
				onclick : function() {
					ed.focus();
					ed.selection.setContent('<img src="/icons/power.png">');
				}
			});
			ed.addButton('counter', {
				title : 'Жетон',
				image : '/icons/counter-16x16.png',
				onclick : function() {
					ed.focus();
					ed.selection.setContent('<img src="/icons/counter-16x16.png">');
				}
			});
			ed.addButton('air', {
				title : 'Воздух',
				image : '/icons/air-16x16.png',
				onclick : function() {
					ed.focus();
					ed.selection.setContent('<img src="/icons/air-16x16.png">');
				}
			});
			ed.addButton('dark', {
				title : 'Тьма',
				image : '/icons/dark-16x16.png',
				onclick : function() {
					ed.focus();
					ed.selection.setContent('<img src="/icons/dark-16x16.png">');
				}
			});
			ed.addButton('earth', {
				title : 'Земля',
				image : '/icons/earth-16x16.png',
				onclick : function() {
					ed.focus();
					ed.selection.setContent('<img src="/icons/earth-16x16.png">');
				}
			});
			ed.addButton('fire', {
				title : 'Огонь',
				image : '/icons/fire-16x16.png',
				onclick : function() {
					ed.focus();
					ed.selection.setContent('<img src="/icons/fire-16x16.png">');
				}
			});
			ed.addButton('light', {
				title : 'Свет',
				image : '/icons/light-16x16.png',
				onclick : function() {
					ed.focus();
					ed.selection.setContent('<img src="/icons/light-16x16.png">');
				}
			});
			ed.addButton('water', {
				title : 'Вода',
				image : '/icons/water-16x16.png',
				onclick : function() {
					ed.focus();
					ed.selection.setContent('<img src="/icons/water-16x16.png">');
				}
			});
		},

	});
</script>