<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>

<script>
	tinymce.init({
		selector: "textarea", // #tinymce
		menubar : false,
		branding: false,
		plugins : 'advlist autolink link code image lists charmap print preview',
		toolbar: "undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist | adddate | tap insttap counter | lives movement flying power | code removeformat",

		setup : function(ed) {

			// Add a custom button
			ed.addButton('adddate', {
				title : 'Вставить текущую дату.',
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
					ed.selection.setContent('<img src="/icons/flying.gif">');
				}
			});
			ed.addButton('power', {
				title : 'Обычный удар',
				image : '/icons/power-16x16.png',
				onclick : function() {
					ed.focus();
					ed.selection.setContent('<img src="/icons/power.gif">');
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
		},

	});
</script>