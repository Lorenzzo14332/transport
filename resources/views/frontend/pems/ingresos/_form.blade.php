<div class="form-row">
    
    <div class="form-group col-md-6">
        <div class="form-group">

            <label for="t_mineral">Tipo de Mineral</label>
            <select class="form-control" name="t_mineral" id="t_mineral">
                <option value="" disabled selected>Seleccione</option>
                @foreach ($tipo_minerales as $tm)
                    <option value="{{ $tm->id }}">{{ $tm->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <br>

    <div class="form-group col-md-6">
       
        <div class="form-group">

            <label for="mineral_id">Mineral</label>
            <select class="form-control" name="mineral_id" id="mineral_id">
                <option value="" disabled selected>Seleccione</option>
                

            </select>
        </div>
    </div>

    <br>

    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="unidad_medida_id">Medida</label>
            <select class="form-control" name="unidad_medida_id" id="unidad_medida_id">
                <option value="" disabled selected>Seleccione</option>
                @foreach ($umedidas as $um)
                    <option value="{{ $um->id }}">{{ $um->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <br>

    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId">
        </div>
    </div>

</div>

<br>

<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">+ Agregar</button>
</div>

<div class="form-group">
    <h4 class="card-title">Detalles de compra</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Tipo de mineral</th>
                    <th>Mineral</th>
                    <th>Medida</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_"></span><input type="hidden" name="total" id="total"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
