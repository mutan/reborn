<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>

<script>
	tinymce.init({
		selector: "textarea", // #tinymce
		menubar : false,
		branding: false,
		plugins : 'advlist autolink link code image lists charmap print preview',
		toolbar: "undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist | adddate | code removeformat",

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
		},

	});
</script>