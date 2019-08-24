$(document).ready(function () {
	var selPCatLevel1Id = $('select.pcat1').find('option:selected').val();
	var selPCatLevel2Id = $('select.pcat2').find('option:selected').val();
	var level2POpts = new Array;
	$('select.pcat2 option').each(function () {
		level2POpts.push($(this));
	});

	$('select.pcat2 option').remove().end();

	if (selPCatLevel1Id != "0") {
		pcatLevel2 = $('select.pcat2');
		for (var i in level2POpts) {
			var vals = [];
			vals = level2POpts[i][0].value.split("_");
			if (vals[0] == "0" || vals[0] == selPCatLevel1Id) {
				pcatLevel2.append(level2POpts[i]);
			}
		};

		$('select.pcat2').find('option').each(function () {
			if ($(this).val() == selPCatLevel2Id)
			{ $(this).attr('selected', true); }
		});
	}

	$('select.pcat1').change(function (event) {
		selPCatLevel1Id = $(this).find('option:selected').val();
		pcatLevel2 = $('select.pcat2');
		pcatLevel2.find('option').remove().end();
		for (var i in level2POpts) {
			var vals = [];
			vals = level2POpts[i][0].value.split("_");
			if (vals[0] == "0" || vals[0] == selPCatLevel1Id) {
				pcatLevel2.append(level2POpts[i]);
			}
		};
		pcatLevel2.find('option:first').attr('selected', true);
	});
});
