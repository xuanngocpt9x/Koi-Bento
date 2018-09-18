@extends('master')
@section('content')

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Contacts</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Contacts</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		<div class="container">
			
			<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.941649493817!2d105.77879631536747!3d20.994975994305662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134534b3ece9ae7%3A0x2c54e8431a783aaf!2zVHJ1bmcgdMOibSBSRUFDSCBIw6AgTuG7mWk!5e0!3m2!1svi!2s!4v1536604230250"></iframe></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<div class="map_title">
						<h2>Thông tin liên hệ</h2>
					</div>

					<div class="space20">&nbsp;</div>
					<div class="hai_p">
						<h3>Vui lòng liên hệ với chúng tôi qua:</h3>
						<p><strong>Email:</strong> Koibento@reach.org.vn</p>
						<p><strong>Sđt: </strong>0924.321.123</p>
						<h4>hoặc mời bạn để lại lời nhắn:</h4>

					</div>
					<div class="space20">&nbsp;</div>
					<form action="#" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Tên (bắt buộc)">
						</div>
						<div class="form-block">
							<input name="your-email" type="email" placeholder="Email (bắt buộc)">
						</div>
						<div class="form-block">
							<input name="your-subject" type="text" placeholder="Tiêu đề">
						</div>
						<div class="form-block">
							<textarea name="your-message" placeholder="Lời nhắn của bạn"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Gửi <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection