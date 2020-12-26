<!DOCTYPE html>
<html style="height: 100%">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>laravel-vue-大转盘</title>
    <style>
    *{
	margin: 0;	
	padding: 0;
	}
	#app{
		margin: 0 auto;	
		padding: 0;
		max-width:640px;
	}
	</style>
</head>
<body style="height: 100%">
<div id="app">
	<router-view></router-view>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>