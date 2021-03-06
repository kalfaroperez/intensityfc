<style type="text/css">
.nav-tabs-custom > .nav-tabs > li.active {
   border-top-color: #FF2E0C;
}
.form-control{
   font-size:16px !important;
}
.noAccess{
   pointer-events: none;
}
.fontsz{
   font-size:15px;
}
</style>

<div class="row" ng-controller="Wizard" >

   <div class="col-md-12 col-sm-12 col-xs-12">
      <!-- /.col -->
      <?php if(isset($mensaje) && $mensaje != null) { ?>
      <div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <h4><i class="icon fa fa-check"></i> Alert!</h4>
         <?php echo $mensaje; ?>
      </div>
     <?php } ?>
      <div class="nav-tabs-custom">
         <ul class="nav nav-tabs">
            <li class="active">
               <a href="#tab_1" data-toggle="tab" aria-expanded="true">Seleccione un plan <i class="fa fa-chevron-right fontsz"></i> </a>
            </li>
            <li class="">
               <a class="noAccess" href="#tab_2" data-toggle="tab" aria-expanded="false">Seleccione un cliente <i class="fa fa-chevron-right fontsz"></i> </a>
            </li>
            <li class="">
               <a class="noAccess" href="#tab_3" data-toggle="tab" aria-expanded="false">Programe las citas <i class="fa fa-chevron-right fontsz"></i> </a>
            </li>
         </ul>
         <div class="tab-content">
            <div class="tab-pane active" id="tab_1" style="font-size:14px;">

               <div ng-repeat="plan in planes">
                  <input class="" type="radio" id="plan{{$index+1}}" name="plan" value="{{plan.id}}" ng-click="seleccionarPLan($index)">
                  <label for="plan{{$index+1}}" class="text-red">
                     {{plan.name}} - {{plan.price[0].price | currency}} COP <!--{{plan.description.split('\n')[2]}}-->
                  </label>
               </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">

              <div class="input-group margin">
                <input type="text" class="form-control" ng-model="nombrecl" placeholder="Ingrese nombre de cliente">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-info btn-flat" ng-click="buscarCliente(nombrecl)">Buscar</button>
                </span>
              </div>
               <table class="table table-bordered">
                <tbody>
                <tr>
                  <th>
                     <i class="fa fa-check-square-o"></i>
                  </th>
                  <th>Nombre</th>
                  <th>C.C. / NIT</th>
                  <th>Email</th>
                </tr>
                <tr ng-repeat="cliente in clientes | filter:nombrecl">
                  <td>
                     <input class="" type="radio" id="cliente{{$index+1}}" name="cliente" value="{{cliente.id}}" ng-click="seleccionarClie(this)">
                  </td>
                  <td><a>{{cliente.name}}</a></td>
                  <td>{{cliente.nit}}</td>
                  <td>{{cliente.email}}</td>
                </tr>
                </tbody>
               </table>

               <button type="button" class="btn btn-info btn-flat" ng-click="listarCliente(indice, 1)">Más clientes</button>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">

              <div class="callout" ng-show="mensaje.msg" ng-class="mensaje.tipo">
                <p>{{mensaje.msg}}</p>
              </div>
                <!--div class="form-group">
                  <label>Tipo de programación de citas</label>
                  <select class="form-control" ng-model="tipo">
                    <option value="1">Programadas</option>
                    <option value="2">Personalizadas</option>
                  </select>
                </div-->
                <div class="text-red">
                   <span><b>CLIENTE:</b> {{clieSel.name}} </span> <br>
                   <span><b>PLAN:</b> {{planSel.name}} - {{planSel.price[0].price | currency}} COP</span>
                </div>
                <div class="programadas" > <!--ng-show="tipo == 1"-->
                   <!--h2>Programadas</h2-->
                   <form name="form_wizard" ng-submit="enviar_tarea_programada()">
                     <div class="form-group">
                        <label>Fecha del día:</label>
                        <div class="input-group">
                          <input type="date" class="form-control dateepicker" ng-model="fecha" placeholder="yyyy-mm-dd - Ingrese fecha deseada">
                          <div class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                          </div>
                        </div>
                     </div>
                      <div class="form-group">
                         <label>Hora del día:</label>
                         <div class="input-group">
                           <input name ="hora" type="text" class="form-control timepicker" ng-model="hora" placeholder="hh:mm:ss - Ingrese formato 24h" required>
                           <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                           </div>
                         </div>
                      </div>
                      <div class="form-group">
                         <button type="submit" class="btn btn-primary btn-lg btn-block">
                           <i class="fa fa-floppy-o"></i> Guardar
                         </button>
                      </div>
                   </form>
                </div>

                <!--div class="personalizadas" ng-hide="tipo == 1 || tipo == undefinned">
                   <h2>Personalizadas</h2>
                </div-->
            </div>
         </div>
         <!-- /.tab-pane -->
         </div>
      <!-- /.tab-content -->
      </div>
   </div>
    <!-- /.col -->
</div>
