<?php $this->load->view('view_head');?>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jsVisita.js"></script>
<?php $this->load->view('view_menu');?>

    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Visitas a Clientes ASHE
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
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th id="Orden" class="table-sorted-desc" aria-sort="ascending">No</th>
                                <th>Vendedor</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Hora Llegada</th>
                                <th>Hora Salida</th>
                                <th>Ubicacion</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($inventario != FALSE) {
                                foreach ($inventario->result() as $row) {
                                    echo "<tr id='info'>";
                                    echo "<td>" . $row->intIdVisita . "</td>";
                                    echo "<td>" . $row->vchVendedor . "</td>";
                                    echo "<td>" . $row->vchCliente . "</td>";
                                    echo "<td>" . $row->dtFecha . "</td>";
                                    echo "<td>" . $row->tmHoraE . "</td>";
                                    echo "<td>" . $row->tmHoraS . "</td>";
                                    echo "<td>" . $row->vchUbicacion . "</td></tr>";
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
                        <h2>Cliente</small></h2>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">No de Visita: </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="txtID" type="text" class="form-control" readonly="readonly"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Vendedor:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="txtVendedor" type="text" class="form-control" readonly="readonly" placeholder="Vendedor">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="txtCliente" type="text" class="form-control" readonly="readonly" placeholder="Cliente">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Bitácora:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <textarea id="txtComentario" class="form-control" rows="5" readonly="readonly" ></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Dirección:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="txtDir" type="text" class="form-control" readonly="readonly" placeholder="Dirección">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="txtFecha" type="text" class="form-control"readonly="readonly"  placeholder="Fecha">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Hora de llegada:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="txtHoraL" type="text" class="form-control"readonly="readonly"  placeholder="Hora">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Hora de Termino:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="txtHoraT" type="text" class="form-control" readonly="readonly"  placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Latitud:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="txtLatitud" type="text" class="form-control" readonly="readonly"  placeholder="Latitud">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Longitud:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="txtLongitud" type="text" class="form-control" readonly="readonly"  placeholder="Longitud">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ver en Mapa:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <a id="btnMapa" class='btn  btn-info' target='_blank'  ><i class='glyphicon glyphicon-map-marker'></i>Ir</a>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>

                                </div>
                            </div>
                            <div id="mensaje" name="mensaje"></div>
                        </form>
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