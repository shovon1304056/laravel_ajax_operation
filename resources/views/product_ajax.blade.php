<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<center>
	<h1>Laravel Dynamic Drop Down with ajax</h1>

	<span>Product Category: </span>
	<select style="width: 200px" class="productcategory" id="prod_cat_id">
		
		<option value="0" disabled="true" selected="true"> Select Product Category</option>
		@foreach($prodcats as $pro_cat)
		<option value="{{$pro_cat->id}}" >{{$pro_cat->prodcat}}</option>
		@endforeach
			
		

	</select>

	<span>Product Name: </span>
	<select style="width: 200px" class="productname" id="product_name">

		<option value="0" disabled="true" selected="true">Product Name</option>
	</select>

	<span>Product Price: </span>
	<input type="text" class="prod_price" id="product_price">



</center>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
			$(document).on('change','#prod_cat_id',function(){
				//alert('Hio');

				var category_id = $(this).val(); //// $this measne the id/class that is called
												 /// val() hocche  select er modde jei value ta select kora hoise seta
				var div = $(this).parent(); /// jetar under a ..means ekhana body tag
				var op = " ";
				

			$.ajax({
				type: 'GET',
				url : '{{route('findProductName')}}',
				data: {'cat_id':category_id},
				success :function(data)
				{
					//console.log(data);

					op+='<option value="0" disabled="true" selected="true"> Choose a Product</option>';
					for(var i=0;i<data.length;i++){
						op+='<option value="'+data[i].id+'">'+data[i].prod_names+
					
					'</option>'; ///// data[i].id----- ei id prodetails table er id
				}
				div.find('#product_name').html(" "); ///oi id er html code gulo empty kora holo
				div.find('#product_name').append(op); ///fakar moddehe dhukay dilm op er values
				},
				error: function()
				{

				}


			});	
			});

			$(document).on('change','.productname',function () {
			var product_id=$(this).val();

			var div=$(this).parent();
			

			$.ajax({
				type: 'GET',
				url : '{{route('findPrice')}}',
				data: {'product_er_id':product_id},
				success :function(data)
				{
					//console.log(data);

				div.find('#product_price').html(" "); ///oi id er html code gulo empty kora holo
				div.find('#product_price').val(data.price); ///fakar moddehe dhukay dilm op er values
				},
				error: function()
				{

				}


			});	
			});
			

	});
	
</script>

</body>
</html>
