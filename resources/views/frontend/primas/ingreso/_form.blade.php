<div class="form-row">
    <div class="form-group col-md-12">
        <div class="form-group">
            <h4 class="text-center">
                <mark class="alert-success">{{ $sede->municipio }}</mark>
            </h4>
        </div>
    </div>
</div>
<br>
<div class="form-row">
    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="t_material">Material</label>
            <select class="form-control" name="t_material" id="t_material">
                <option value="" disabled selected>Seleccione</option>
                @foreach ($tipo_materiales as $tm)
                    <option value="{{ $tm->id }}">{{ $tm->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br>
    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="tipo_id">Tipo</label>
            <select class="form-control" name="tipo_id" id="tipo_id">
                <option value="" disabled selected>Seleccione</option>
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
    <button type="button" id="agregar" class="btn btn-dark float-right">+ Agregar</button>
</div>

<div class="form-group">
    <h4 class="card-title">Detalles de compra</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Material</th>
                    <th>Tipo</th>
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
