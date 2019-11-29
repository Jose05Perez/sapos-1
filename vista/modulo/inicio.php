<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pagina Principal
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- row -->
    <div class="row">
      <!-- col-md-8-->
      <div class="col-md-8">
        <!--===============================================================================================================
        Pre vizualizador de email
        ===============================================================================================================-->   
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Pre visualizador de Correspondencia</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive mailbox-messages">
              <table class="table table-hover table-striped">
                <tbody>
                <thead>
                  <tr>
                    <th><i class="fa fa-check-square"></i></th>
                    <th>Caracter</th>
                    <th>Emisor</th>
                    <th>Correspondencia</th>
                    <th>Adjuntos</th>
                    <th>Fecha de emision</th>
                    <th>Estado</th>
                    <th>Autorizado</th>
                    <th>Privado</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                      $pv = new mesaEntrada();
                      echo $pv->bandejaLoad();

                ?>

                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
        <!-- /.box-body -->
          <div class="box-footer clearfix">
            <a href="#" class="btn btn-block btn-info">todos los mail</a>
          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /col-md-8 -->
      <!-- col-md-4 -->
      <div class="col-md-4">
        <!--===============================================================================================================
        Caja de numeros de mail
        ===============================================================================================================-->
        <!-- Info Boxes Style 2 -->
        <div class="info-box bg-yellow">
          <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Correo Totales</span>
            <span class="info-box-number">5,200</span>
            <!-- <div class="progress">
              <div class="progress-bar" style="width: 50%"></div>
            </div>-->
            <span class="progress-description">
              50% Increase in 30 Days
            </span> 
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box bg-green">
          <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Correo Externo</span>
            <span class="info-box-number">92,050</span>
            <!-- <div class="progress">
              <div class="progress-bar" style="width: 20%"></div>
            </div> -->
            <span class="progress-description">
              20% Increase in 30 Days
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box bg-red">
          <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Correo Interno</span>
            <span class="info-box-number">114,381</span>
            <!-- <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div> -->
            <span class="progress-description">
              70% Increase in 30 Days
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /col-md-4 -->
      <!-- col-md-8 -->
      <div class="col-md-8">
        <!--===============================================================================================================
        Mensaje Rapido
        ===============================================================================================================-->   
        <div class="box box-info">
          <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Correo Rapido</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i>
              </button>
            </div>
            <!-- /. tools -->
          </div>
          <div class="box-body">
            <form action="#" method="post">
              <div class="form-group">
                <input type="email" class="form-control" name="emailto" placeholder="Para:">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Asunto:">
              </div>
              <div>
                <textarea class="textarea" placeholder="Mensaje" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
            </form>
          </div>
          <div class="box-footer">
            <button type="button" class="pull-right btn btn-default" id="sendEmail">Enviar
              <i class="fa fa-arrow-circle-right"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- /col-md-8 -->
      <!-- col-md-4 -->
      <div class="col-md-4">
        <!--===============================================================================================================
        Trackeo de email
        ===============================================================================================================-->   
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tracking de Correo</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <div class="product-info">
                    <a href="#" class="product-title">Correo 1
                      <span class="label label-warning pull-right">Amarillo</span></a>
                    <span class="product-description">
                          100
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <div class="product-info">
                    <a href="#" class="product-title">Correo 2
                      <span class="label label-success pull-right">Verde</span></a>
                    <span class="product-description">
                          200
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <div class="product-info">
                    <a href="#" class="product-title">Correo 3 
                      <span class="label label-danger pull-right">Rojo</span></a>
                    <span class="product-description">
                          300
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <div class="product-info">
                    <a href="#" class="product-title">Correo 4
                      <span class="label label-success pull-right">Verde</span></a>
                    <span class="product-description">
                          400
                        </span>
                  </div>
                </li>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="#" class="uppercase btn btn-block btn-info">Ver todos los tracking</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
      </div>  
      <!-- /col-md-4 -->
    </div>
    <!-- /row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->