@extends('layouts.frontend')
@section('content-frontend')
<div class="ps-page--simple">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Account</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
   <section class="ps-section--account ps-checkout">
        <div class="container">
            <div class="ps-section__header">
                <h3>Checkout Information</h3>
            </div>
            <div class="ps-section__content">
                <form class="ps-form--checkout" action="index.html" method="get">
                    <div class="ps-form__content">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">
                                <div class="ps-form__billing-info">   
                                    <h3 class="ps-form__heading">Shipping Address</h3>
                                    <div class="row">
                                        <!--========== Start Division Select All Data  ========-->
                                    	<div class="col-sm-3">
                                    		<div class="form-group">
		                                        <label>Division</label>
				                                <select class="ps-select" name="division_id" id="division_id" class="form-control" style="width: 100% !important;">
				                                	<option value="">Select Division</option>
				                                	@foreach(get_divisions() as $division)
			                                          <option value="{{ $division->id }}">{{ $division->name_en }}</option>
			                                        @endforeach
				                                </select>
		                                    </div>
                                    	</div>
                                        <!--========== End Division Select All Data  ========-->

                                        <!--==== Start Division Select District All Data =====-->
                                    	<div class="col-sm-3" >
                                    		<div class="form-group">
		                                        <label>District</label>
				                                <select class="ps-select" name="district_id" id="district_id" class="form-control" style="width: 100% !important;">
				                                	<option value="">Select District</option>
				                                </select>
		                                    </div>
                                    	</div>
                                        <!--==== End Division Select District All Data =====-->

                                        <!--==== Start District Select Upazilla All Data =====-->
                                    	<div class="col-sm-3">
                                    		<div class="form-group">
		                                        <label>Upazilla</label>
				                                <select class="ps-select" name="upazilla_id" id="upazilla_id" class="form-control" style="width: 100% !important;">
				                                	<option value="">Select Upazilla</option> 
				                                </select>
		                                    </div>
                                    	</div>
                                        <!--==== End District Select Upazilla All Data =====-->

                                        <!--==== Start Upazilla Select Unions All Data =====-->
                                    	<div class="col-sm-3">
                                    		<div class="form-group">
		                                        <label>Unions</label>
				                                <select class="ps-select" name="union_id" id="union_id" class="form-control" style="width: 100% !important;">
				                                	<option value="">Select Unions</option> 
				                                </select>
		                                    </div>
                                    	</div>
                                        <!--==== End Upazilla Select Unions All Data =====-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@push('footer-script')

<!--===============  Start Division To District Show Ajax ===============-->
<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="division_id"]').on('change', function(){
        var division_id = $(this).val();
        if(division_id) {
            $.ajax({
                url: "{{  url('/division-district/ajax') }}/"+division_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                    $('select[name="district_id"]').html('<option value="" selected="" disabled="">Select District</option>');
                        $.each(data, function(key, value){
                        $('select[name="district_id"]').append('<option value="'+ value.id +'">' + capitalizeFirstLetter(value.name_en) + '</option>');
                    });
                    $('select[name="upazilla_id"]').html('<option value="" selected="" disabled="">Select District</option>');
                },
            });
        } else {
           alert('danger');
        }
    });

    function capitalizeFirstLetter(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    }

});
</script>
<!--===============  End Division To District Show Ajax ===============-->

<!--===============  Start  District To Upazilla Show Ajax ===============-->
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{  url('/district-upazilla/ajax') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="upazilla_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="upazilla_id"]').append('<option value="'+ value.id +'">' + value.name_en + '</option>');
                        });
                    },
                });
            }else {
                alert('danger');
            }
        });
    });
</script>
<!--===============  End  District To Upazilla Show Ajax ===============-->

<!--===============  Start  Upazilla To Union Show Ajax ===============-->
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="upazilla_id"]').on('change', function(){
            var upazilla_id = $(this).val();
            if(upazilla_id) {
                $.ajax({
                    url: "{{  url('/upazilla-union/ajax') }}/"+upazilla_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="union_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="union_id"]').append('<option value="'+ value.id +'">' + value.name_en + '</option>');
                        });
                    },
                });
            }else {
                alert('danger');
            }
        });
    });
</script>
<!--===============  End  Upazilla To Union Show Ajax ===============-->

<!--===============  Start  Shipping Charge  ===============-->
<script type="text/javascript">
	$(document).on('change', '#distr', function(e) {
        let shipping_charge = 0;
        
        if ($("select[name='district_id']").val() == 'Dhaka') {
            let charge = "80";
            shipping_charge += parseInt(charge);
        }else {
            let charge = "110";
            shipping_charge += parseInt(charge);
        }

        let subtotal = $('#subtotal').text();
        // let coupon   = $('span#coupon').text();

        let rep_subtotal = subtotal.replace(',', '');
        // let rep_coupon   = coupon.replace(',', '');

        let total = (parseInt(rep_subtotal) + shipping_charge);
        $('#ship_charge').text(number_format(shipping_charge, 2, '.', ','));
        $('#total').text(number_format(total, 2, '.', ','));
        $('#gtotal').val(total);
        console.log(gtotal);
    });

    function number_format(number, decimals, dec_point, thousands_sep) {
        var n = !isFinite(+number) ? 0 : +number, 
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        toFixedFix = function (n, prec) {
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            var k = Math.pow(10, prec);
            return Math.round(n * k) / k;
        },
        s = (prec ? toFixedFix(n, prec) : Math.round(n)).toString().split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }
</script>
<!--===============  End  Shipping Charge  ===============-->
@endpush
@endsection