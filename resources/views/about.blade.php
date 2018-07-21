
@extends('layouts.background')

@section('content')

	<h2><i class="fa fa-plus-square" style="font-size:48px;"></i> &nbsp; Đăng kí tài khoản: </h2>
	<ul>
		<li>Màn hình đăng kí phải bao gồm các trường username, password, password (confirm), email address</li>
		<li>Không được phép đăng kí trùng username hay trùng email address.</li>
	</ul>
	<h2><i class="fa fa-shopping-basket" style="font-size:48px;"></i> &nbsp; Đặt cược:  </h2>
	<ul>
		<li>Trong màn hình xem danh sách trận đấu, có thể tham gia đặt cược cho các trận đấu vẫn còn chưa hết hạn đặt cược.</li>
		<li>Khi đặt cược một số tiền cho một trận đấu nhất định, số tiền đó bị trừ trong tài khoản.</li>
		<li>Không được phép đặt cược với số tiền lớn hơn số tiền hiện có.</li>
	</ul>
	<h2><i class="fa fa-history" style="font-size:48px;"></i> &nbsp; Lịch sử đặt cược:</h2>
	<ul>
		<li>Xem lại lịch sử đặt cược của bản thân.</li>
		<li>Nếu trận đấu đã có kết quả, hiện kèm thông tin số tiền thu về hoặc mất đi.</li>
	</ul>
	<h2><i class="fa fa-id-card" style="font-size:48px;"></i> &nbsp; Tài khoản ban đầu: </h2>
	<ul>
		<li>Số tiền ban đầu người chơi có được khi tạo tài khoản là 5000 APC (AltPlus Coin)</li>
	</ul>
@endsection