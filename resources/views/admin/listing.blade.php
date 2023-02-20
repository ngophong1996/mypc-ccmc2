@extends('layouts.admin')

@section('content')

<div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>{{ $title }}</h3>
      </div>

      
    </div>

      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
   
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                  </div>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <table class="table table-bordered">
              <thead>
                <tr>
                    <?php foreach ($configs as $config){ ?>
                        <th><?=$config['name']?></th>
                        <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach($records as $record){
                    ?>
                <tr>
                    <?php foreach ($configs as $config){ 
                        ?>
                        <?php switch($config['type']){
                            case "text": ?> <td><?=$record[$config['field']]?></td> <?php
                                break;
                            case "money": ?> <td>￥<?=number_format($record[$config['field']])?></td> <?php
                                break;
                            case "image": ?> <td>  <div class="thuvienanh"> <div class="image"> <img class="myimg" src="/img/<?=$record[$config['field']]?>" width="100" alt="" style="cursor: zoom-in;"> </div> </div> </td><?php
                                break;
                            case "copy": ?> <td> <a href="#"><i class="fa fa-clone" aria-hidden="true"></i>&nbsp;Copy</a> </td> <?php
                                break;
                            case "edit": ?> <td> <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Edit</a></td> <?php
                                break;
                            case "delete": ?> <td> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</a></td> <?php
                                break;
                            case "wifisent": ?> <td>
                              @if ($record[$config['field']]==0)
                              <form action="/wifisent" method="post">
                                @csrf
                                <input type="hidden" id="wifiid" name="wifiid" value="{{ $record['id'] }}">
                                <input type="hidden" id="usermail" name="usermail" value="{{ $record['useremail'] }}">
                                <button type="submit" class="btn btn-success">送信</button>
                              </form>
                              @else
                              <form action="/wifisent" method="post">
                                @csrf
                                <input type="hidden" id="wifiid" name="wifiid" value="{{ $record['id'] }}">
                                <input type="hidden" id="usermail" name="usermail" value="{{ $record['useremail'] }}">
                                <button type="submit" class="btn btn-secondary">再送信</button>
                              </form>
                              @endif
                              
                              </td> <?php
                                break;
                            case "paymentstate": ?> <td>
                              @if ($record[$config['field']]==0)
                                  <button type="submit" class="btn btn-danger" disabled>未確認</button>
                              @elseif ($record[$config['field']]==1)
                                <form action="/checkbill" method="post">
                                  @csrf
                                  <input type="hidden" id="mypcid" name="mypcid" value="{{ $record['id'] }}">
                                  <input type="hidden" id="usermail" name="usermail" value="{{ $record['useremail'] }}">
                                  <button type="submit" class="btn btn-success">確認</button>
                                </form>
                              @else
                                  <button type="submit" class="btn btn-secondary" disabled>確認済み</button>
                              @endif
                             
                              </td> <?php
                                break;
                        } ?>
                        <?php } ?>
                </tr>
                <?php }?>
              </tbody>
            </table>
               <?= $records->links("pagination::bootstrap-4")?>
          </div>
        </div>
      </div>

      

      
                    
                
    </div>
@endsection