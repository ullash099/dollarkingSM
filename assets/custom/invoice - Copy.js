$(document).ready(function(e) {
	var isguest = 0;
	$('#productCode').attr('readonly','readonly');
	

	$('#customerID').on('keyup',function(){
		var cusId = $(this).val();
		var goto = base_url+'Sales/findCustomer/';
		$.ajax({
			type: "POST",
			data: {custoId : cusId},
			url: goto, 
			dataType: "html",
			cache: false,
			success: function (data) {
				if(data != 'Not found'){
					var result = data.split('|')
					$('#cidm').attr('style','color:green');
					$('#cidm').html(result[0]);
					$('#tbno').html(result[1]);
					$('#wtn').html(result[2]);
					$('#CID').val(result[1]);
					$('#productCode').removeAttr('readonly');
					$('#productCode').focus();
				}else{
					$('#cidm').attr('style','color:red');
					$('#cidm').html(data);
					$('#tbno').html('');
					$('#wtn').html('');
					$('#CID').val('00000000000000');
					$('#productCode').attr('readonly','readonly');
				}
			}
		});
	});

	var prcode = 0;
	$('#productCode').on('keyup',function(){
		var productcode = $(this).val();
		var goto = base_url+'Sales/findProduct/';
		$.ajax({
			type: "POST",
			data: {proCode : productcode},
			url: goto, 
			dataType: "html",
			cache: false,
			success: function (data) {
				if(data != 'Not found'){
					prcode = productcode;
					$('#pcm').html('')
					var result = data.split('|')
					$('#productName').val(result[0]);
					$('#unitPrice').val(result[1]);
					$('#orderQuantity').removeAttr('readonly');
					$('#productCode').val('');
					$('#orderQuantity').focus();
				}else{
					prcode = 0;
					$('#productName').val('');
					$('#unitPrice').val('');
					$('#orderQuantity').attr('readonly','readonly');
					$('#pcm').attr('style','color:red');
					$('#pcm').html(data)
					$('#productCode').focus();
				}
			}
		});
	});

	var i = 1;
	$('#orderQuantity').on('keyup',function(e){
		var up = parseInt($('#unitPrice').val());
		var oq = parseInt($(this).val());
		var pname = $('#productName').val();
		if(!isNaN(oq) && !isNaN(up) && oq != '' && up != ''){
			if(e.which == 13){
				var goto = base_url+'Sales/addToCart/';
				$.ajax({
					type: "POST",
					data: {proCode : prcode,pName : pname,uPrice : up,qty : oq},
					url: goto, 
					dataType: "html",
					cache: false,
					success: function (data) {
						$('#dy').html(data);
						$('#productName').val('');
						$('#unitPrice').val('');
						$('#orderQuantity').val('');
						$('#total').val('');
						$(this).val('');
						i+=1;
						$('#productCode').focus();
						calculate();
					}
				});
				//$('#output').append('<tr id="imtr'+i+'"><td><input type="hidden" name="proCode'+i+'" value="'+prcode+'" />'+pname+'<br>('+prcode+')</td><td style="text-align:right">'+up+'<input type="hidden" id="up'+i+'" name="up'+i+'" id="up'+i+'" value="'+up+'"></td><td style="text-align"><input type="number" style="width: 35%;text-align: right;" min="0" max="9999" class="form-control pull-right easy" im="'+i+'" name="quan'+i+'" required="required" value="'+oq+'"></td><td><input type="text" name="ttotal'+i+'" id="ttotal'+i+'" class="form-control pull-right tt" readonly="readonly" style="width: 70%; text-align: right" value="'+$('#total').val()+'"></td></tr>')				
			}else{
				if(!isNaN(oq) && !isNaN(up) && oq != '' && up != ''){
					var total = parseInt(up*oq);
					$('#total').val(total);
				}else{
					$('#total').val('')
				}
			}
		}
	});

	$(document).on('click','.close',function(){
		var im = $(this).attr('im');
		var rowid = $('#rowid'+im).val();
		if(rowid!==""){
			var goto = base_url+'Sales/deleteItem';
			$.ajax({
				type: "POST",
				data: {rowId : rowid},
				url: goto, 
				dataType: "html",
				cache: false,
				success: function (data) {
					$('#dy').html(data);
					calculate();
				}
			});
		}
	});

	$(document).on("keyup", ".easy", function() {
		var im = $(this).attr('im');
		var unitPrice = $('#up'+im).val();
		var quan = $(this).val();
		$('#ttotal'+im).val(unitPrice*quan);
		$('#showttotal'+im).html(number_format(parseInt(unitPrice*quan), 2, '.', ','));
		calculate()
	});

	$('#discount').on('keyup',function(){
		calculate();
	});

	$('#receive').on('keyup',function(){
		var receive = $(this).val();
		if(!isNaN(receive)){
			calculate();
		}
	})

	//formating number 
	function number_format (number, decimals, decPoint, thousandsSep){
		//   example 1: number_format(1234.56)
	  		//   returns 1: '1,235'
	  	//   example 2: number_format(1234.56, 2, '.', ',')
	  		//   returns 2: '1,234.56'
	  	//   example 3: number_format(1234.5678, 2, '.', '')
	  		//   returns 3: '1234.57'
	  	//   example 4: number_format(67, 2, ',', '.')
	  		//   returns 4: '67,00'
	  	//   example 5: number_format(1000)
	  		//   returns 5: '1,000'
	  	//   example 6: number_format(67.311, 2)
			//   returns 6: '67.31'
		//   example 7: number_format(1000.55, 1)
			//   returns 7: '1,000.6'
		//   example 8: number_format(67000, 5, ',', '.')
	  		//   returns 8: '67.000,00000'
	  	//   example 9: number_format(0.9, 0)
	  		//   returns 9: '1'
	  	//  example 10: number_format('1.20', 2)
	  		//  returns 10: '1.20'
	  	//  example 11: number_format('1.20', 4)
	  		//  returns 11: '1.2000'
	  	//  example 12: number_format('1.2000', 3)
	  		//  returns 12: '1.200'
	  	//  example 13: number_format('1 000,50', 2, '.', ' ')
	  		//  returns 13: '100 050.00'
	  	//  example 14: number_format(1e-8, 8, '.', '')
	  		//  returns 14: '0.00000001'
		number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
	  	var n = !isFinite(+number) ? 0 : +number
	  	var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
	  	var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
	  	var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
	  	var s = ''

	  	var toFixedFix = function (n, prec) {
		    var k = Math.pow(10, prec)
		    return '' + (Math.round(n * k) / k)
		      .toFixed(prec)
	  	}

	  	// @todo: for IE parseFloat(0.55).toFixed(0) = 0;
	  	s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
	  	if (s[0].length > 3) {
	    	s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
	  	}
	  	if ((s[1] || '').length < prec) {
		    s[1] = s[1] || ''
		    s[1] += new Array(prec - s[1].length + 1).join('0')
	  	}
	  	return s.join(dec)
	}

	function calculate(){
		var SubTotal = 0;
		var Discount = ($('#discount').val() != "") ? $('#discount').val() : ''; 
		var Received = ($('#receive').val() != "") ? $('#receive').val() : '';

		$(".tt").each(function(){
			SubTotal += parseInt($(this).val());
		})

		var vat= Math.round((parseInt(SubTotal)*15)/100);
			
		$('#atotal').val(number_format(parseInt(SubTotal), 2, '.', ','));
		//$('#atotal').number(true, 2 );
		$('#vat').val(number_format(parseInt(vat), 2, '.', ','));
		$('#tAmount').val(number_format(parseInt(SubTotal+vat), 2, '.', ','));
		$('#discount').val(Discount);

		var disAmo = Math.round(((SubTotal+vat)*Discount)/100);
		var TotalBill = Math.round((SubTotal+vat)-disAmo);

		$('#tBill').val(number_format(parseInt(TotalBill), 2, '.', ','));
		$('#toBill').val(number_format(parseInt(TotalBill), 2, '.', ','));
		$('#receive').val(Received);
		var payback = number_format(Math.round(Received-TotalBill), 2, '.', ',');
		$('#pBack').val(payback);
		if((Received-TotalBill) <0 ){
			$('#cap').attr('style','text-align:center;border: 2px solid black;width: 50%;margin: 0px auto;padding: 2%');
			$('#cap').html('DUE');
			$('#pBack').attr('style','margin:2px 0px 2px 0px; text-align: right; color:red')
		}else{
			$('#cap').attr('style','text-align:center;border: 2px solid black;width: 50%;margin: 0px auto;padding: 2%');
			$('#cap').html('PAID');
			$('#pBack').attr('style','margin:2px 0px 2px 0px; text-align: right; color:black')
		}
	}
});