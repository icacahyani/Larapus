@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li class="active">Profil</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Profil {{ Auth::user()->name }}</h2>
				</div>
				<div class="panel-body">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active">
							<a href="#Profil" aria-controls="Profil" role="tab" data-toggle="tab">
								<i class="fa fa-user-secret"></i> Profil
							</a>
						</li>
						<li role="presentation">
							<a href="#change-pass" aria-controls="change-pass" role="tab" data-toggle="tab">
								<i class="fa fa-lock"></i> Ubah Password
							</a>
						</li>
					</ul>
					<br>
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="Profil">
							<div class="panel-body">
								<table class="table">
									<tbody>
										<tr>
											<td class="text-muted">Nama</td>
											<td>{{ $user->name }}</td>
										</tr>
										<tr>
											<td class="text-muted">Email</td>
											<td>{{ $user->email }}</td>
										</tr>
										<tr>
											<td class="text-muted">Login terakhir</td>
											<td>{{ $user->last_login }}</td>
										</tr>
										<tr>
											<td class="text-muted">Photo</td>
											<td>
												<img src="/image/{{ $user->photo }}" height="100px" width="100px" class="img-rounded">
											</td>
										</tr>
									</tbody>
								</table>
								<a class="btn btn-primary" href="{{ url('/settings/profile/edit') }}">Ubah</a>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="change-pass">
							<div class="panel-body">
								{!! Form::open(['url' => url('/settings/password'),
								'method' => 'post', 'class'=>'form-horizontal']) !!}
									@include('settings.edit-password')
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>

@endsection