<?php
  include "../../conf/koneksi.php";
  include "../../conf/functionglobal.php";
  include "../../lib/inc.session.php";


  $sql = $conn->prepare("SELECT * FROM data_config where code='reservation' and group_data='dokumen' ");
  $sql->execute();
  $data = $sql->fetch();
// _dd($data['value']);
  $id="";
  $value="";

  if(!empty($data['code']) && $data['code']=='reservation'){
    $id = $data['id'];
    $value = $data['value'];
  }
?>

<div class="row">
  <div class="col-lg-12">
    <div class="box">

      <header>
        <div class="icons">
          <i class="fa fa-th-large"></i>
        </div>
            <h5>Configuration Upload dokumen</h5>
            <ul class="nav pull-right">
              <li>
                <div class="btn-group">
                  <a class="accordion-toggle btn btn-default btn-xs minimize-box" data-toggle="collapse" href="#div-1">
                    <i class="fa fa-minus"></i>
                  </a> 
                  <button class="btn btn-danger btn-xs close-box">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </li>
            </ul>
      </header>
      <div id="collapse4" class="body">
                
        <form action="?page=svconfig" method="post">
          <input type="hidden" name="id" value="<?=$id?>">

          <div class="form-group">
            <label for="text1" class="control-label col-lg-2">Batas Upload Dokumen </label>
            <div class="col-lg-10">
              <div class="control-group">
                    <div class="controls">
                     <div class="input-prepend input-group">
                       <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span><input type="text" style="width: 200px" name="reservation" id="reservation" class="form-control" value="<?=$value?>" /> 
                     </div>
                    </div>
                  </div>
                 </fieldset>
            </div>
          </div>
          
          <div class="form-actions">
            <div class="col-lg-8">
              <button type="button" class="btn btn-default" data-dismiss="modal" onclick="self.history.back()">Cancel</button>
              <input type="submit" name="submit" value="Save" class="btn btn-primary">
            </div>
          </div>
        </form>    
      </div>
  
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->