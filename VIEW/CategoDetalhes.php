<div class="row" id="top">
    <div class="col-md-12">
        <h2>Informações</h2>
    </div>
</div>

<hr>
<div class="row">
    <div class="table-responsive col-md-5"> 
        <center><img class="img-fluid" src=""></center>
    </div>
    <div class="table-responsive col-md-7">
        <table class="table table-striped table-dados">
            <tbody>
                <tr>
                    <th>ID: <?= $objCate->getCod();?> </th>
                </tr>
                <tr>
                    <th>Descrição: <?= $objCate->getDesc();?></th>
                </tr>
                <tr>
                    <th>Nome: <?= $objCate->getNome();?></th>
                </tr>
                <tr>
                    <td class="action">
                    <a class="btn btn-warning btn-sm" href="edit.html">Editar</a>
                    <a class="btn btn-danger btn-sm"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
