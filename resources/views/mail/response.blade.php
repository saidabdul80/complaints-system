@component('mail::message')
	@if($required== '')		
		Hello **{{session('ufname')}}**,  
		<h1>Your Issue Has Been Resolved of the complaints ID {{$complaints_ID}}</h1>
		Thank you for getting in touch with us!  
		click the below link to get more about us.    		
		<br>      
		<center>  			
		<a href="{{$url}}" style="text-decoration: none; color: white;padding: 10px 20px;text-align: center;background: #333;border-radius: 5px; margin: 15px auto;">
			Reply Us			
		</a>
		</center>  
		<br>      	
		Sincerely,
		IBBUL team.

	@else
		Hello **{{session('ufname')}}**,  
		<h1>Please Use Your complaints ID {{$complaints_ID}}</h1>
		{{$required}}  
		<br>      
		<center>  			
		<a href="{{$url}}" style="text-decoration: none; color: white;padding: 10px 20px;text-align: center;background: #333;border-radius: 5px;">
			Reply Us			
		</a>
		</center>  
		<br>      
		Sincerely,
		IBBUL team.
	@endif
@endcomponent
