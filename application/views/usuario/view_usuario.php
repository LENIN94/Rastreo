<?php $this->load->view('view_head');?>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jsUsuario.js"></script>
<?php $this->load->view('view_menu');?>

    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Vendedores
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <button type="button" id="btnNew" class="btn btn-success" > <span class="glyphicon glyphicon-plus"></span> Agregar Vendedor</button>
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Imagen</th>
                                <th>Estatus</th>
                                <th>Tipo</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($inventario != FALSE) {
                                foreach ($inventario->result() as $row) {
                                    echo "<tr id='info'>";
                                    echo "<td>" . $row->intIdUsuario . "</td>";
                                    echo "<td>" . $row->vchNombre . "</td>";
                                    echo "<td>" . $row->vchUsuario . "</td>";
                                    echo "<td>" . $row->vchCorreo . "</td>";
                                    echo "<td>" . "  <img width='60' src=" . base_url() . "images/" . $row->vchImagen . "></td>";


                                    if ($row->intEstatus == 1) {
                                        $E = "Activo";
                                    } else {
                                        $E = "Inactivo";
                                    }
                                    echo "<td>" . $E . " </td>";


                                     if ($row->intPrivilegio == 1) {
                                        $T = "Administrador";
                                    } else {
                                        $T = "Vendedor";
                                    }
                                      echo "<td>" . $T . " </td></tr>";
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Usuario</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li>
                                <i class="fa fa-close" class="close" data-dismiss="modal" aria-hidden="true"></i>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form class="form-horizontal form-label-left"  name="formulario" id="formulario"  role="form">
                            <input type="hidden" id="tipoOp">
                            <div id="divID" class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ID: </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="txtID" type="text" class="form-control" readonly="readonly"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="txtNombre" type="text" class="form-control" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Usuario:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="txtUsuario" type="text" class="form-control" placeholder="Usuario">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="txtPass" type="password" class="form-control" placeholder="******" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="txtEmail" type="text" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div id="divEstatus" class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Estatus:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select id="cmbEstatus" class="form-control">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select id="cmbTipo" class="form-control">
                                        <option value="1">Administrador</option>
                                        <option value="0">Vendedor</option>
                                    </select>
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="button" id="btnDelete" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">Eliminar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </div>

                        </form>
                        <div id="mensaje" name="mensaje"></div>
                    </div>
                </div>




            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div id="modalConfirm" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: ;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">Eliminar</h4>
                </div>
                <div class="modal-body" align="center" >
                    <p>Realmente desea Eliminar?</p>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
                    <button type="button" id="btnYesDelete" class="btn btn-primary">Si</button>
                </div>
            </div>
        </div>
    </div>



<?php
$this->load->view('view_footer');
?>