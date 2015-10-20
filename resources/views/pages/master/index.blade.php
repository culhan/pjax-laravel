@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
<section class="content">
	<div class="row">
  		<div class="col-xs-12">
    		<div class="box">
      			<div class="box-header">
        			<h3 class="box-title">Data Table With Full Features</h3>
      			</div><!-- /.box-header -->
      			<div class="box-body">
        			<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        				<div class="row">
        					<div class="col-sm-6">
        						<form id='change_length' method="get">
        							<div class="dataTables_length" >
        								<label>Show 
        									<select name="length" id='length' aria-controls="example1" class="form-control input-sm" onchange="change_length()">
        										<option value="1" @if($length==1){{'selected'}}@endif>1</option>
        										<option value="2" @if($length==2){{'selected'}}@endif>2</option>
        										<option value="3" @if($length==3){{'selected'}}@endif>3</option>
        										<option value="10" @if($length==10){{'selected'}}@endif>10</option>
        									</select> 
        								</label>
        								<button type="button" class="btn btn btn-default btn-success btn-sm"><i class="fa fa-add"></i> Add Data</button>
        							</div>
        						</form>
        					</div>
        					<div class="col-sm-6">
        						<div id="example1_filter" class="dataTables_filter pull-right">
        							<label>Search:
        								<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
        							</label>
        						</div>
        					</div>
        				</div>
        				<div class="row grid-data">
        					<div class="col-sm-12">
        					<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          						<thead>
            						<tr role="row">
            							@foreach($label as $key => $item)
            								<th>{{{$item}}}</th>
            							@endforeach
            								<th style="text-align:center" class="col-xs-2" >Actions</th>
            						</tr>
          						</thead>
          						<tbody>            
          							@foreach($data as $dataKey => $dataItem)
          							<tr role="row" class="odd">
            						  	@foreach($label as $labelKey => $labelItem)
            								<td>{{{$dataItem[$labelKey]}}}</td>
            							@endforeach
            								<td style="text-align:center">
            									<button type="button" class="btn btn btn-default btn-info btn-sm"><i class="fa fa-edit"></i> Edit</button>
  												<button type="button" class="btn btn btn-default btn-danger btn-sm"><i class="fa fa-remove"></i> Delete</button>
            								</td>
            						</tr>
            						@endforeach
            					</tbody>
        					</table>
        					<div class=" pull-right">
          							{!! $data->render() !!}
          						</div>
      						</div>
  						</div>
         			</div>
        		</div><!-- /.box-body -->
      		</div><!-- /.box -->
    	</div><!-- /.col -->
	</div><!-- /.row -->
</section>
<script type="text/javascript">
	
	function change_length(){
		var form = $('#change_length');
		try {
	    	$.pjax({
	    	    container: ".grid-data", 
		    	    timeout: 1000,
		    	    url: '@if(!empty($url)){{$url}}@else{{'/'}}@endif',
		    	    data: form.serialize()
		    	});
		}
		catch(err) {
		    alert(err);
		}
	};

</script>
@endsection
