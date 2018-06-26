<?php
    /** @var Foil\Template\Template $t */
    $this->layout( 'layouts/ixpv4' );
?>
<?php $this->section( 'title' ) ?>
    Faucet Controller
<?php $this->append() ?>

<?php $this->section( 'page-header-preamble' ) ?>
    <li class="pull-right">
        <div class="btn-group btn-group-xs" role="group">
            <a type="button" class="btn btn-default" href="<?= route ('faucet-controller/add') ?>">
                <span class="glyphicon glyphicon-plus"></span>
            </a>
        </div>
    </li>
<?php $this->append() ?>

<?php $this->section('content') ?>

    <?= $t->alerts() ?>
    <table id='f_controller-list' class="table">
        <thead>
        <tr>
            <th>
                Handle
            </th>
            <th>
                Vlan
            </th>
            <th>
                Faucet Version
            </th>
            <th>
                Faucet Controller IP
            </th>
            <th>
                Faucet Controller Port
            </th>
            <th>
                Last Updated
            </th>
        </tr>
        <thead>
        <tbody>
            <?php foreach( $t->faucet_controller as $f_controller ):
                /** @var Entities\FaucetController $f_controller */ ?>
                <tr>
                    <td>
                        <?= $t->ee( $f_controller->getHandle() ) ?>
                    </td>
                    <td>
                        <a href="<?= url( '/vlan/view/id/' ).'/'.$f_controller->getVlan()->getId()?> ">
                            <?= $t->ee( $f_controller->getVlan()->getName() )?>
                        </a>
                    </td>
                    <td>
                        <?= $f_controller->getFaucetVersion() ?>
                    </td>
                    <td>
                        <?= $f_controller->getControllerIp() ?>
                    </td>
                    <td>
                        <?= $f_controller->getControllerPort() ?>
                    </td>
                    <td>
                        <?= $f_controller->getLastUpdated() ? $f_controller->getLastUpdated()->format('Y-m-d H:i:s') : '(unknown)' ?>
                        <?php if( $f_controller->getLastUpdated() && $f_controller->lastUpdatedGreaterThanSeconds( 86400 ) ): ?>
                            <span class="label label-danger"><i class="glyphicon glyphicon-exclamation-sign" title="Last updated more than 1 day ago"></i></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <a class="btn btn btn-default" href="<?= action('SDNController@view' , [ 'id' => $f_controller->getId() ] ) ?>" title="Preview">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                            <a class="btn btn btn-default" href="<?= route('faucet-controller/edit' , [ 'id' => $f_controller->getId() ] )?>" title="Edit">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                            <a class="btn btn btn-default" id="delete-f_controller-<?=$f_controller->getId() ?>" href="" title="Delete">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach;?>
        <tbody>
    </table>

<?php $this->append() ?>

<?php $this->section( 'scripts' ) ?>
    <script>
        $('#f_controller-list').DataTable({
            "autoWidth": false
        });
        $( "a[id|='delete-f_controller']" ).on( 'click', function( e ) {
            e.preventDefault();
            var fctid = ( this.id ).substring( 20 );
            bootbox.confirm({
                message: "Do you want to delete this faucet controller ?",
                buttons: {
                    confirm: {
                        label: 'Confirm',
                        className: 'btn-primary',
                    },
                    cancel: {
                        label: 'Cancel',
                        className: 'btn-default',
                    }
                },
                callback: function ( result ) {
                    if( result ){
                        location.href = "<?= url('faucet-controller/delete' )?>/" + fctid;
                    } else {
                        $( '.bootbox.modal' ).modal( 'hide' );
                    }
                }
            });
        });
    </script>
<?php $this->append() ?>

